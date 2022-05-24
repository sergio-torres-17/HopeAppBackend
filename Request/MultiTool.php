<?php
class MultiTool{
    public function GenerarNombreCarpetaUsuario($nombre,$apellidos){
        $resultado = "CA_";
        $arrAux =explode( ' ', $nombre);
        $resultado = $resultado . $arrAux[0];
        $arrAux = explode( ' ', $apellidos);
        $resultado = $resultado . $arrAux[0];
        return $resultado;
    }
    public function GenerarNombreArchivoFotoPerfil($nombre,$apellidos){
        $resultado = "FP_";
        $arrAux =explode( ' ', $nombre);
        $resultado = $resultado . $arrAux[0];
        $arrAux = explode( ' ', $apellidos);
        $resultado = $resultado . $arrAux[0];
        return $resultado;
    }
    public function generarNombreExpediente($nombre, $apellidos){
        $resultado = 'EX_';
        $arrAux =explode( ' ', $nombre);
        $resultado = $resultado . $arrAux[0];
        $arrAux = explode( ' ', $apellidos);
        $resultado = $resultado . $arrAux[0];
        return $resultado;
    }
    public function formarArraysImagenesBin($rutaFoto, $nombreEtiqueta){
        $arrayDev = array(
            $nombreEtiqueta=>base64_encode(file_get_contents($rutaFoto))
        );
        return $arrayDev;
    }
}
?>