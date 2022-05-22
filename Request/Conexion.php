<?php
class Conexion{


    public function GetConnection(){
        $con = null;
        try{
            $con = new PDO('mysql:host=localhost;dbname=hopeapp;charset=utf8', 'root', '', array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
              ));
              
           /* $con = new PDO('mysql:host=212.1.208.54;dbname=u306142809_HopeAppDB_Prue', 'u306142809_AdminPrueb_Db', 'vA/e[4k^sn4',array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));*/


            //mysql:host=localhost;dbname=u306142809_HopeAppDB_Prue', 'u306142809_AdminPrueb_Db', 'vA/e[4k^sn4
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $con;
    }

    
}
?>