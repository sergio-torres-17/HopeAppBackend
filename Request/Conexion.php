<?php
class Conexion{
    public function GetConnection(){
        $con = null;
        try{
            $con = new PDO('mysql:host=localhost;dbname=hopeapp', 'root', '');
            //$con = new PDO('mysql:host=212.1.208.54;dbname=u306142809_HopeAppDB_Prue', 'u306142809_AdminPrueb_Db', 'vA/e[4k^sn4');
            //mysql:host=localhost;dbname=u306142809_HopeAppDB_Prue', 'u306142809_AdminPrueb_Db', 'vA/e[4k^sn4
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $con;
    }
}
?>