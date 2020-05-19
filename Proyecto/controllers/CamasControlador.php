<?php

class ControllerCamas {
    
    public function getHabitaciones() {
        require_once("../models/Habitacion.php");
        $services = new Habitacion();
        return $services->getHabitaciones();
    }

    public function getCamas($id) {
        require_once("../models/Habitacion.php");
        $services = new Habitacion();
        return $services->getCamas($id);
    }

    public function crearHabitacion() {
        require_once("../models/Habitacion.php");
        $services = new Habitacion();
        return $services->crearHabitacion();
    }

    public function crearCama($id) {
        require_once("../models/Habitacion.php");
        $services = new Habitacion();
        return $services->crearCama($id);
    }

    public function getHabitacionByIdCama($id) {
        require_once("../models/Habitacion.php");
        $services = new Habitacion();
        return mysqli_fetch_array($services->getHabitacionByIdCama($id));
    }

    public function updateHabitacion($cama,$habitacion){
        require_once("../models/Habitacion.php");
        $services = new Habitacion();
        $services->updateCama($cama);
        $services->updateHabitacionPaciente($habitacion);
        
    }
}
?>