/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Config;

import java.sql.*;

import javax.swing.JOptionPane;

/**
 *
 * @author Anas
 */
public class SuccessHandler {
    public void handleSuccess(String nim) {
        try (Connection conn = KoneksiDB.getConnection()) {
            String query = "SELECT nama FROM mahasiswa where nim = ?";
            try (PreparedStatement ps = conn.prepareStatement(query)) {
                ps.setString(1, nim);
                ResultSet rs = ps.executeQuery();
                if (rs.next()) {
                    String nama = rs.getString("nama");
                    JOptionPane.showMessageDialog(null, "Selamat " + nama + " Berhasil Presensi!");
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
