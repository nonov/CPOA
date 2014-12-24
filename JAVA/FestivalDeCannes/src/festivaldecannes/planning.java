/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package cpoa;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author merlin
 */
public class planning {
    public void generer() throws SQLException{
        try{
            MyConnection connection=new MyConnection();
            Connection conn=connection.getConnection();
            Statement state= conn.createStatement();
            ResultSet rs1 = state.executeQuery("SELECT * FROM film");
            while(rs1.next()){
                ResultSet rs2 = state.executeQuery("SELECT * FROM film");
                while(rs2.next()){
                    
                }
            }
            
        }
        catch(SQLException ex) {
            Logger.getLogger(DAOFilm.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
