<?php

class ControArchivos{
    public function CrearDirectorio($ruta){
        if(!file_exists($ruta)){
            mkdir(($ruta));
        }
    }
}
?>