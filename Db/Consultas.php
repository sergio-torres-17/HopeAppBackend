<?php
include 'Conexion.php';
class Consultas{
    private $conexion;
    public function __construct()
    {
        $this->conexion= new Conexion();
    }
    public function LoginDoctores($correoCedula, $pass){
        $passEcr = sha1($pass);
        $cmd= $this->conexion->GetConnection()->prepare("CALL sp_Login_Doctores(:usr,:pwd)");
        $cmd->bindParam(':usr', $correoCedula,PDO::PARAM_STR);
        $cmd->bindParam(':pwd', $passEcr,PDO::PARAM_STR);
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
    public function insertarDoctor($nombre,$apellidos,$edad,$email,$pass,$cedula,$especialidad,$estudios,$rutaHistorial,$rutaCertificado,$rutaFotoPerfil){
        $usrEstandar = 1;
        $pwdEncrypted = sha1($pass);
        $cmd = $this->conexion->GetConnection()->prepare("CALL sp_Insertar_Medico
        (:nombre, :apellidos, :edad , :email, :pass, :cedula, :especialidad, :estudios, :rutaHistorial, :rutaCertificado,:rutaFoto ,:idEjecutante)");
        $cmd->bindParam(':nombre', $nombre);
        $cmd->bindParam(':apellidos', $apellidos);
        $cmd->bindParam(':edad', $edad);
        $cmd->bindParam(':email', $email);
        $cmd->bindParam(':pass', $pwdEncrypted);
        $cmd->bindParam(':cedula', $cedula);
        $cmd->bindParam(':especialidad', $especialidad);
        $cmd->bindParam(':estudios', $estudios);
        $cmd->bindParam(':rutaHistorial', $rutaHistorial);
        $cmd->bindParam(':rutaCertificado', $rutaCertificado);
        $cmd->bindParam(':rutaFoto', $rutaFotoPerfil);
        $cmd->bindParam(':idEjecutante', $usrEstandar);
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $result = json_encode($lector);
            return $result;
        }
        return "0";
    }
}
?>