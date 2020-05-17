<?php

class ControllerCamas {
    
    public function getHabitaciones() {
        require_once("../models/Habitacion.php");
        $services = new Service();
        return $services->getHabitaciones();
    }

    public function crearHabitacion() {
        require_once("../models/Habitacion.php");
        $services = new Service();
        return $services->crearHabitacion();
    }

    public function crearCama($id) {
        require_once("../models/Habitacion.php");
        $services = new Service();
        return $services->crearCama($id);
    }
}
?>