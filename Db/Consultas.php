<?php
include 'Conexion.php';
class Consultas{
    private $conexion;
    public function __construct()
    {
        $this->conexion= new Conexion();
    }
    public function LoginDoctores($correoCedula, $pass){
        $cmd= $this->conexion->GetConnection()->prepare("CALL sp_Login_Doctores(:usr,:pwd)");
        $cmd->bindParam(':usr', $correoCedula,PDO::PARAM_STR);
        $cmd->bindParam(':pwd', $pass,PDO::PARAM_STR);
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $dev = json_encode($lector);
            return $dev;
        }
        return "0";
    }
    public function logOutDoctores($emailCedula){
        $cmd = $this->conexion->GetConnection()->prepare("CALL sp_Log_Out_Doctores(:emailOCedula)");
        $cmd->bindParam(':emailOCedula', $emailCedula,PDO::PARAM_STR);
        $cmd->execute();
        if($lector=$cmd->fetchAll()){
            $dev = json_encode($lector);
            return $dev;
        }
        return "0";
    }
    public function validacionExistneciaDeUsuario($nombre,$apellidos, $email){
        $cmd = $this->conexion->GetConnection()->prepare("select fn_verificar_si_existe_usuario(:nombre, :apellidos, :correo) 'Existe'");
        $cmd->bindParam(':nombre',$nombre);
        $cmd->bindParam(':apellidos',$apellidos);
        $cmd->bindParam(':correo',$email);
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $dev = json_encode($lector);
            return $dev;
        }
        return "0";
    }
}
?>