<?php
header('Content-Type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');
// Esto le dice a PHP que generaremos cadenas UTF-8
mb_http_output('UTF-8');




require 'Conexion.php';


class Consultas{
    private $conexion;


    public function __construct()
    {
        $this->conexion= new Conexion();
    }

    private function cerrarConexion(){
        
    }
    
    public function LoginDoctores($correoCedula, $pass){
        $passEcr = sha1($pass);
        $cmd = $this->conexion->GetConnection()->prepare("CALL sp_Login_Doctores(:usr,:pwd)");
        $cmd->bindParam(':usr', $correoCedula,PDO::PARAM_STR);
        $cmd->bindParam(':pwd', $passEcr,PDO::PARAM_STR);
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $dev = json_encode($lector);
            return $dev;
        }
        return "0";
    }

    public function modificarEstatusConexionDoctor($idDoctor,$estatus,$idUsuario){
        $cmd = $this->conexion->GetConnection()->prepare("call sp_Modificar_Status_Doctor_Api(:idDoctor,:estatus,:idUsuario)");
        $cmd->bindParam(":idDoctor",$idDoctor);
        $cmd->bindParam(":estatus",$estatus);
        $cmd->bindParam(":idUsuario",$idUsuario);
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $result = json_encode($lector);
            return $result;
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
        $cmd = $this->conexion->GetConnection()->prepare("select fn_verificar_si_existe_usuario(:nombre, :apellidos, :correo) as 'respuesta' ");
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
    public function traerInfoPosLoginMedico($emailCedula){
        $cmd = $this->conexion->GetConnection()->prepare("CALL sp_Traer_Info_PosLogin_medico(:email)");
        $cmd->bindParam(":email", $emailCedula);
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            
            $result = json_encode($lector);
            return $result;
        }
        return "0";
    }
    public function traerEstatusDeConexion()
    {
        $cmd = $this->conexion->GetConnection()->prepare("select nombre_estatus 'estatus' from estatus_conexion");
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $result =  json_encode($lector);
            return $result;
        } 
        return "0";
    }
    public function verPacientesSinTutela(){
        require 'MultiTool.php';
        $connection = $this->conexion->GetConnection();
        $cmd = $connection->prepare("SELECT Nombre,apellidos,edad,etapa,tipo,foto_perfil FROM vw_vista_pacientes_movil_sin_tutela;");
        $cmd->execute();
        $lector = $cmd->fetchAll();
        $multiTool = new MultiTool();
        if($lector){

            for ($i=0; $i < sizeof($lector); $i++) { 
                $arrInicial = $lector[$i];
                $arrImagen = $multiTool->formarArraysImagenesBin($arrInicial['foto_perfil'],'fotoBin');
                $lector[$i] = array_merge($arrInicial, $arrImagen);
            }
            $result = json_encode($lector);
            return $result;
        }
        $connection = null;
        return "0";
    }
    public function InsertarTutelaSobrePaciente($nombreDoctor,$nombrePaciente,$fechaHora){
        $cmd = $this->conexion->GetConnection()->prepare('CALL sp_Insertar_Tutela(:nombre_doctor, :nombre_paciente , :fechaHora,fn_Buscar_Id_Usuario_Por_Nombre(:nombre_doctor))');
        $cmd->bindParam(':nombre_doctor',$nombreDoctor);
        $cmd->bindParam(':nombre_paciente',$nombrePaciente);
        $cmd->bindParam(':fechaHora',$fechaHora);
        $cmd->execute();
        $lector = $cmd->fetchAll();
        if($lector){
            $result = json_encode($lector);
            return $result;
        }
        return "0";
    }

    /*Consultas pacientes*/
    public function insertarPaciente($nombre, $apellidos, $edad,$email,$pass,$tipoCancer,$etapa, $rutaExpediente,$rutaFoto){
        $ejecutante = 1;
        $pwdEncrypted = sha1($pass);
        $cmd = $this->conexion->GetConnection()->prepare("CALL sp_Insertar_Paciente(:nombre, :apellidos , :edad , :email , :pass , :tipo_cancer , :etapa ,:rutaExp , :ruta, :idEjecutante)");
        $cmd->bindParam(":nombre",$nombre);
        $cmd->bindParam(":apellidos",$apellidos);
        $cmd->bindParam(":edad",$edad);
        $cmd->bindParam(":email",$email);
        $cmd->bindParam(":pass",$pwdEncrypted);
        $cmd->bindParam(":tipo_cancer",$tipoCancer);
        $cmd->bindParam(":etapa",$etapa);
        $cmd->bindParam(":ruta",$rutaFoto);
        $cmd->bindParam(":rutaExp",$rutaExpediente);
        $cmd->bindParam(":idEjecutante",$ejecutante);
        $cmd->execute();
        $lector = $cmd->fetchAll();
        if($lector){
            $result = json_encode($lector);
            return $result;
        }
        return "0";
    }
    public function LoginPacientes($usr, $pass)
    {
        $passEcrypted = sha1($pass);
        $cmd = $this->conexion->GetConnection()->prepare("CALL sp_Login_Pacientes(:usr, :pwd)");
        $cmd->bindParam(":usr",$usr);
        $cmd->bindParam(":pwd",$passEcrypted);
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $resultado = json_encode($lector);
            return $resultado;
        }
        return "0";
    }
    public function insertarSintoma($sintoma, $fecha,$hora,$idPaciente,$intensidad, $detalles){
        $cmd = $this->conexion->GetConnection()->prepare("CALL sp_insertar_sintoma_usuario(:descripcion  , :fecha , :hora , :id_paciente , :descripcion_intensidad , :detalles_adicionales );");
        $cmd->bindParam(":descripcion",$sintoma);
        $cmd->bindParam(":fecha",$fecha);
        $cmd->bindParam(":hora",$hora);
        $cmd->bindParam(":id_paciente",$idPaciente);
        $cmd->bindParam(":descripcion_intensidad",$intensidad);
        $cmd->bindParam(":detalles_adicionales",$detalles);
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $resultado = json_encode($lector);
            return $resultado;
        }
        return "0";
        
    }
    public function verSintomasPacientes($id_paciente,$nombre_paciente){
        $cmd = $this->conexion->GetConnection()->prepare("CALL sp_Ver_Sintomas_Pacientes(:id_paciente, :nombre_paciente);");
        $cmd->bindParam(":id_paciente", $id_paciente);
        $cmd->bindParam(":nombre_paciente", $nombre_paciente);
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $result = json_encode($lector);
            $result = utf8_decode($result);
            return $result;
        }
        return "0";
    }
    public function verSintomasPacientesPorRangoFecha($id_paciente,$nombre_paciente,$fechaInicio,$fechaFin){
        $cmd = $this->conexion->GetConnection()->prepare("CALL sp_Ver_Sintomas_Pacientes(:id_paciente, :nombre_paciente, :fi,:ff);");
        $cmd->bindParam(":id_paciente", $id_paciente);
        $cmd->bindParam(":nombre_paciente", $nombre_paciente);
        $cmd->bindParam(":fi", $fechaInicio);
        $cmd->bindParam(":ff", $fechaFin);
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $result = json_encode($lector);
            return $result;
        }
        return "0";
    }
    public function traerInfoPosLoginPaciente($email){
        $cmd = $this->conexion->GetConnection()->prepare("CALL sp_Traer_Info_PosLogin_Pacientes(:email)");
        $cmd->bindParam(":email", $email);
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $result = json_encode($lector);
            return $result;
        }
        return "0";
    }
    public function traerTiposCancer()
    {
        $cmd = $this->conexion->GetConnection()->prepare("select nombre_tipo 'tipo' from tipos_cancer");
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $result =  json_encode($lector);
            return $result;
        }
        return "0";
    }
    
    public function traerEtapasCancer()
    {
        $cmd = $this->conexion->GetConnection()->prepare("select nombre_etapa 'etapa' from etapas_cancer");
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $result =  json_encode($lector);
            return $result;
        }
        return "0";
    }
    public function traerSintomasRegistrados(){
        $cmd = $this->conexion->GetConnection()->prepare("select descripcion from sintomas");
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $result = json_encode($lector);
            return $result;
        }
        return "0";
    }
    public function traerIntensidadSintomas(){
        $cmd = $this->conexion->GetConnection()->prepare("select descripcion from intensidad_sintomas");
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $result = json_encode($lector);
            return $result;
        }
        return "0";
    }
    public function traerInfoPacienteDetallada($id_usuario){
        $cmd = $this->conexion->GetConnection()->prepare("call sp_Info_Usuario_detalla_por_Id(:id_usuario)");
        $cmd->bindParam(":id_usuario", $id_usuario);
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $result = json_encode($lector);
            return $result;
        }
        return "0";
    }

    /*************************Genericos************************* */
    public function buscarTipoUsuarios($correo){
        $cmd = $this->conexion->GetConnection()->prepare("select if(fn_BuscarTipo_Usuario_Por_Correo(:email) is null, 'No existe',fn_BuscarTipo_Usuario_Por_Correo(:email)) 'Rsl';");
        $cmd->bindParam(":email", $correo);
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $result = json_encode($lector);
            return $result;
        }
        return "0";
    }
    public function verTipoUsuario($usuario){
        $cmd = $this->conexion->GetConnection()->prepare("select `fn_buscar_Tipo_Usuario`(:usr) 'tipo_usuario'");
        $cmd->bindParam(":usr", $usuario);
        $cmd->execute();
        if($lector=$cmd->fetchAll()){
            $dev = json_encode($lector);
            return $dev;
        }
        return "0";
    }
    public function modificarInfo($nombre,$apellidos,$edad,$foto){
        $cmd = $this->conexion->GetConnection()->prepare("CALL sp_ModificarInfo(:nombre,:apellidos,:edad,:foto)");
        $cmd->bindParam(":nombre",$nombre);
        $cmd->bindParam(":apellidos",$apellidos);
        $cmd->bindParam(":edad",$edad);
        $cmd->bindParam(":foto",$foto);
        $cmd->execute();
        if($lector = $cmd->fetchAll()){
            $dev = json_encode($lector);
            return $dev;
        }
        return "0";
    }
    public function buscarIDDoctorACargo($idPaciente){
        $cmd = $this->conexion->GetConnection()->prepare('select fn_Obtener_Nombre_Doctor_A_Cargo(:idPaciente) \'nombre_doctor\'');
        $cmd->bindParam(':idPaciente',$idPaciente);
        $cmd->execute();
        $lector = $cmd->fetchAll();
        if($lector){
            $dev = json_encode($lector);
            return $dev;
        }
        return "0";
    }
    public function traerInfoPacienteDetalladaPorNombre($nombrePaciente){
        $cmd = $this->conexion->GetConnection()->prepare('call sp_Traer_Detalles_Info_Usuario(:nombrePaciente)');
        $cmd->bindParam(':nombrePaciente',$nombrePaciente);
        $cmd->execute();
        $lector = $cmd->fetchAll();
        if($lector){
            $dev = json_encode($lector);
            return $dev;
        }
        return "0";
    }
}
?>