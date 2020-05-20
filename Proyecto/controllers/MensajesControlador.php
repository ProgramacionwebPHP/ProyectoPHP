<?php

class ControllerMensajes {

    public function crearMensaje($idMedico,$idpaciente,$fecha,$listEquipos) {
        require_once("../models/Mensajes.php");
        $services = new Mensaje();
        $idMensaje = $services->crearMensaje($idMedico,$idpaciente,$fecha);
        foreach ($listEquipos as &$valor) {
            $services->crearRelacion($idMensaje, $valor); 
        }
        Header("Location:../views/verPacientes.php?user=".$idMedico);
    }

}
?>