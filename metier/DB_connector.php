<?php
class DB_Connector {
    private static ?PDO $connect = null;

    public function openConnexion(): PDO {
		
        if(!isset($connect)){
            
            try{
                $connect = new PDO('mysql:host=localhost;dbname=scierie;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_LOCAL_INFILE => true));
                
            } catch (PDOException $ex) {
                die('connexion echouée : '.$ex->getMessage());
            }
        }
    
        return $connect;
    }   

    public function closeConnexion(): void {
        
        if(isset($connect)){
            $connect = null;
        }        
    }
}
