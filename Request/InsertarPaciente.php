<?php
require ('MultiTool.php');
require ('Archivos.php');
require ('Consultas.php');

$multiToolAux = new MultiTool();
$archivos = new ControArchivos();
$cmd = new Consultas();
$nombre= $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$tipo_cancer = $_POST['tipocancer'];
$etapa = $_POST['etapa'];
$fotoPerfilBin = $_POST['fotoPerfil'];
$fotoExpedienteBin = $_POST['fotoExpediente'];
$rutaBaseArchivos = getcwd() . '/Archivos/';
$nombreCarpetaArchivos = $rutaBaseArchivos .  $multiToolAux->GenerarNombreCarpetaUsuario($nombre, $apellidos). '/';
$archivos->CrearDirectorio($nombreCarpetaArchivos);
$archivos->CrearDirectorio($nombreCarpetaArchivos.'Fotos/');
$nombreFotoPerfil = $multiToolAux->GenerarNombreArchivoFotoPerfil($nombre,$apellidos) . '.png';
$nombreExpediente = $multiToolAux->generarNombreExpediente($nombre,$apellidos). '.png';
$rutaFotoPerfil = $nombreCarpetaArchivos.'Fotos/' . $nombreFotoPerfil;
$rutaExpediente = $nombreCarpetaArchivos.'Fotos/' . $nombreExpediente;
//Guardado de imagenes
file_put_contents($rutaFotoPerfil, base64_decode($fotoPerfilBin));//Guardado de imagen de perfil
file_put_contents($rutaExpediente, base64_decode($fotoExpedienteBin));//Guardado de imagen de perfil
echo $cmd->insertarPaciente($nombre,$apellidos,$edad,$email,$pass,$tipo_cancer,$etapa, $rutaExpediente,$rutaFotoPerfil);
?>