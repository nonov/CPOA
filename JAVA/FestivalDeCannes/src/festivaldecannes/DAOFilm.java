/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package cpoa;

import java.sql.*;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author merlin
 */
public class DAOFilm extends DAO{
    MyConnection connection=new MyConnection();
    
    String nom;
    public DAOFilm(){
        super();
        
    }

    @Override
    public void charger() {
        
        try {
            Connection conn=connection.getConnection();
            Statement state= conn.createStatement();
            ResultSet rs = state.executeQuery("SELECT * FROM film");
            while(rs.next()){
                System.out.println(rs.getString("nom"));
            }
        } 
        catch (SQLException ex) {
            Logger.getLogger(DAOFilm.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @Override
    public void supprimer(int id) {
        
        try {
            Connection conn=connection.getConnection();
            Statement state= conn.createStatement();
            state.executeUpdate("DELETE FROM film WHERE id='"+id+"'");
        }
        catch (SQLException ex) {
            Logger.getLogger(DAOFilm.class.getName()).log(Level.SEVERE, null, ex);
        }
        
    }

    @Override
    public void ajouter(String film) {
        int id = 0;
           
        try {
            Connection conn=connection.getConnection();
            Statement state= conn.createStatement();
            ResultSet rs = state.executeQuery("SELECT MAX(id) FROM film");
            while(rs.next()){
                id=rs.getInt("MAX(id)")+1;
            }
            
            
            state.executeUpdate("INSERT INTO film VALUES('"+film+"','"+id+"')");
            
        }
        catch (SQLException ex) {
            Logger.getLogger(DAOFilm.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

   
}
