<?php

class ControllerPacientes {
    
    public function getPacientes() {
        require_once("../models/Pacientes.php");
        $services = new Service();
        return $services->getPacientes();
    }

    public function getMedico($id) {
        require_once("../models/Pacientes.php");
        $services = new Service();
        return mysqli_fetch_array($services->getMedico($id)); 
    }

    public function getEquipos($id) {
        require_once("../models/Equipos.php");
        $services = new Services();
        return $services->getEquiposId($id); 
    }
}
?>