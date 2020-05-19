<?php

class ControllerPacientes {
    
    public function getPacientes() {
        require_once("../models/Pacientes.php");
        $services = new Service();
        return $services->getPacientes();
    }

    public function getPacientesById($id) {
        require_once("../models/Pacientes.php");
        $services = new Service();
        return $services->getPacientesById($id);
    }

    public function getMedico($id) {
        require_once("../models/Pacientes.php");
        $services = new Service();
        return mysqli_fetch_array($services->getMedico($id)); 
    }

    public function getPaciente($id) {
        require_once("../models/Pacientes.php");
        $services = new Service();
        return mysqli_fetch_array($services->getPaciente($id)); 
    }

    public function getEquipos($id) {
        require_once("../models/Equipos.php");
        $services = new Services();
        return $services->getEquiposId($id); 
    }
    public function agregarPaciente($nombre,$identificacion,$diagnostico,$prioridad,$fecha,$dias,$habitacion,$cama,$medico){
        require_once("../models/Pacientes.php");
        $services = new Service();
        return $services->agregarPaciente($nombre,$identificacion,$diagnostico,$prioridad,$fecha,$dias,$habitacion,$cama,$medico); 
    }
}
?>