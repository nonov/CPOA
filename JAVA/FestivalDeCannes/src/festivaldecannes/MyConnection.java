package cpoa;

import java.sql.*;

public class MyConnection {
    private Connection conn;
    String url;
    String user;
    String pwd;
    public  Connection getConnection() throws SQLException{
        if (conn==null){
            try{
                Class.forName("com.mysql.jdbc.Driver");
                
                url="jdbc:mysql://localhost/cpoa";
                user="root";
                pwd="";
                
                conn=DriverManager.getConnection(url,user,pwd);
                System.out.println("connection effectuee !");
            }
            catch(ClassNotFoundException e){
                System.out.println("La connexion a la BD a echoue");
                e.printStackTrace();
            }
        }
       return conn;
    }
}
