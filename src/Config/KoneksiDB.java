/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Config;

import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Anas
 */
public class KoneksiDB {

    private static Connection con;

    public static Connection getConnection() {

        if (con == null) {
            try {
                Class.forName("com.mysql.cj.jdbc.Driver");
                con = DriverManager.getConnection("jdbc:mysql://localhost:3306/db_presensi", "root", "");
            } catch (ClassNotFoundException | SQLException e) {
                Logger.getLogger(KoneksiDB.class.getName()).log(Level.SEVERE, null, e);
            }

        }
        return con;
    }
}
