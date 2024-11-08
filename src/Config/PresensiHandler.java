package Config;

import java.sql.*;
import java.time.LocalTime;
import java.time.LocalDate;
import javax.swing.JOptionPane;

public class PresensiHandler {
    // Method untuk cek matkul yang sedang berlangsung dan menyimpan presensi
    public void cekMatkulDanSimpanPresensi(String nim) {
        try (Connection conn = KoneksiDB.getConnection()) {
            LocalTime currentTime = LocalTime.now();
            LocalDate currentDate = LocalDate.now();

            // Query untuk mendapatkan matkul yang sedang berlangsung
            String query = "SELECT matkul_id FROM matkul WHERE ? BETWEEN jam_mulai AND jam_selesai";
            try (PreparedStatement ps = conn.prepareStatement(query)) {
                ps.setTime(1, java.sql.Time.valueOf(currentTime));
                ResultSet rs = ps.executeQuery();

                if (rs.next()) {
                    String kodeMatkul = rs.getString("matkul_id");

                    // Masukkan data presensi
                    String insertQuery = "INSERT INTO presensi (nim, matkul_id, tgl_presensi, jam_presensi) VALUES (?, ?, ?, ?)";
                    try (PreparedStatement insertPs = conn.prepareStatement(insertQuery)) {
                        insertPs.setString(1, nim);
                        insertPs.setString(2, kodeMatkul);
                        insertPs.setDate(3, java.sql.Date.valueOf(currentDate));
                        insertPs.setTime(4, java.sql.Time.valueOf(currentTime));
                        insertPs.executeUpdate();
                        JOptionPane.showMessageDialog(null, "Presensi berhasil disimpan!");
                    }
                } else {
                    JOptionPane.showMessageDialog(null, "Tidak ada matkul yang sedang berlangsung saat ini.");
                }
                // JOptionPane.showMessageDialog(this, "Presensi berhasil disimpan!");
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

}
