<?php
include ('MultiTool.php');
include ('Archivos.php');
include ('Consultas.php');
//Constantes
$rutaBaseArchivos = $_SERVER['DOCUMENT_ROOT'] .'/hopeappbackend/archivos/';
$multiToolAux = new MultiTool();
$archivos = new ControArchivos();
$consultas= new Consultas();
//Variables de peticion 
$nombre = $_GET['nombre'];
$apellidos = $_GET['apellidos'];
$edad = $_GET['edad'];
$email = $_GET['email'];
$pass = $_GET['pass'];
$cedula = $_GET['cedula'];
$especialidad = $_GET['especialidad'];
$estudios = $_GET['estudios'];
$historial = $_GET['historial'];
$certificado = $_GET['certificado'];
$nombreCarpetaArchivos = $rutaBaseArchivos .  $multiToolAux->GenerarNombreCarpetaUsuario($nombre, $apellidos). '/';
$archivos->CrearDirectorio($nombreCarpetaArchivos);
$archivos->CrearDirectorio($nombreCarpetaArchivos.'Fotos/');
$nombreFotoPerfil = $multiToolAux->GenerarNombreArchivoFotoPerfil($nombre,$apellidos);
$certificado = $nombreCarpetaArchivos.'Fotos/' . $certificado;
$historial = $nombreCarpetaArchivos.'Fotos/' . $historial;
echo $consultas->insertarDoctor($nombre,$apellidos,$edad,$email,$pass,$cedula,$especialidad,$estudios,$historial,$certificado,$nombreFotoPerfil);
?>
