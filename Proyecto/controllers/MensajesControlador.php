<?php

class ControllerMensajes {

    public function crearMensaje($idMedico,$idpaciente,$fecha,$listEquipos) {
        require_once("../models/Mensajes.php");
        $services = new Mensaje();
        $idMensaje = $services->crearMensaje($idMedico,$idpaciente,$fecha);
        foreach ($listEquipos as &$valor) {
            $services->crearRelacion($idMensaje[0], $valor); 
        }
        Header("Location:../views/verPacientes.php?user=".$idMedico);
    }

    public function getMensajes() {
        require_once("../models/Mensajes.php");
        $services = new  Mensaje();
        return $services->getMensajes(); 
    }

    public function getMensajesId($id) {
        require_once("../models/Mensajes.php");
        $services = new Mensaje();
        return mysqli_fetch_array($services->getMensajesId($id)); 
    }

    public function getSolicitud($id) {
        require_once("../models/Mensajes.php");
        $services = new Mensaje();
        return $services->getSolicitud($id); 
    }

    public function getPaciente($id) {
        require_once("../models/Mensajes.php");
        $services = new Mensaje();
        return mysqli_fetch_array($services->getPaciente($id)); 
    }

    public function getMedico($id) {
        require_once("../models/Mensajes.php");
        $services = new Mensaje();
        return mysqli_fetch_array($services->getMedico($id)); 
    }

    public function getEquipo($id) {
        require_once("../models/Mensajes.php");
        $services = new Mensaje();
        return mysqli_fetch_array($services->getEquipo($id)); 
    }

    public function deleteSolicitud($id){
        require_once("../models/Mensajes.php");
        $services = new Mensaje();
        $services->deleteSolicitud($id);
    }

    public function updateEquipo($ide, $idp) {
        require_once("../models/Mensajes.php");
        $services = new Mensaje();
        $services->updateEquipo($ide, $idp); 
    }
}
?>