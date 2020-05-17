<?php

class ControllerEquipos {

    public function getEquipos() {
        require_once("../models/Equipos.php");
        $services = new Services();
        return $services->getEquipos(); 
    }

    public function addEquipo($nombre) {
        require_once("../models/Equipos.php");
        $services = new Services();
        return $services->addEquipo($nombre); 
    }

    public function getEquipoById($id) {
        require_once("../models/Equipos.php");
        $services = new Services();
        return $services->getEquipoById($id); 
    }

    public function getPaciente($id) {
        require_once("../models/Equipos.php");
        $services = new Services();
        return mysqli_fetch_array($services->getPaciente($id)); 
    }

    public function getCandidatos($id, $paciente) {
        require_once("../models/Equipos.php");
        $services = new Services();
        return $services->getCandidatos($id, $paciente); 
    }

    public function updateEquipo($idEquipo,$idNuevo) {
        require_once("../models/Equipos.php");
        $services = new Services();
        return $services->updateEquipo($idEquipo,$idNuevo); 
    }
}
?>