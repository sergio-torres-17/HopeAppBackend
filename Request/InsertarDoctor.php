<?php
include ('MultiTool.php');
include ('Archivos.php');
include ('Consultas.php');
//Constantes
$rutaBaseArchivos = $_SERVER['DOCUMENT_ROOT'] .'/HopeAppBackend/Request/archivos/';
$multiToolAux = new MultiTool();
$archivos = new ControArchivos();
$consultas= new Consultas();
//Variables de peticion 
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$cedula = $_POST['cedula'];
$especialidad = $_POST['especialidad'];
$estudios = $_POST['estudios'];
$historial = $_POST['historial'];
$certificado = $_POST['certificado'];
$imgPerfil = $_POST['imgPerfil'];
$nombreCarpetaArchivos = $rutaBaseArchivos .  $multiToolAux->GenerarNombreCarpetaUsuario($nombre, $apellidos). '/';
$archivos->CrearDirectorio($nombreCarpetaArchivos);
$archivos->CrearDirectorio($nombreCarpetaArchivos.'Fotos/');
$nombreFotoPerfil = $nombreCarpetaArchivos.'Fotos/' . $multiToolAux->GenerarNombreArchivoFotoPerfil($nombre,$apellidos) . '.png';
$certificado = $nombreCarpetaArchivos.'Fotos/' . $certificado;
$historial = $nombreCarpetaArchivos.'Fotos/' . $historial;
//Guardado de imagenes
file_put_contents($nombreFotoPerfil, base64_decode($imgPerfil));

echo $consultas->insertarDoctor($nombre,$apellidos,$edad,$email,$pass,$cedula,$especialidad,$estudios,$historial,$certificado,$nombreFotoPerfil);
?>
