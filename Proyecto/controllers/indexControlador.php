<?php

class ControllerIndex {
    
    public function login($usuario,$contraseña) {
        require_once("models/modelo.php");
        $services = new Service();
        $datos = $services->login($usuario,$contraseña);
        if($datos == null){
            return "Credenciales incorrectas";
        }
        else{
            require_once("models/modelo.php");
            $services = new Service();
            $datos = $services->getServicios();
            Header("Location: views/inicioAdmin.php?user=".$usuario);
            
        }
    }
}
?>