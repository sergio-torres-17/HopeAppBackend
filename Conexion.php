<?php
class Conexion{
    public function GetConnection(){
        $con = null;
        try{
            $con = new PDO('mysql:host=localhost;dbname=hopeapp', 'root', '');
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $con;
    }
}
?>