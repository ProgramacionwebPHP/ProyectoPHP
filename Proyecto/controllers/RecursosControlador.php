<?php

class ControllerRecursos {

    public function getRecursos() {
        require_once("../models/Recursos.php");
        $services = new Services();
        return $services->getRecursos(); 
    }

    public function addRecurso($nombre,$cantidad) {
        require_once("../models/Recursos.php");
        $services = new Services();
        return $services->addRecurso($nombre,$cantidad); 
    }

    public function getRecursoById($id) {
        require_once("../models/Recursos.php");
        $services = new Services();
        return $services->getRecursoById($id); 
    }

    public function addUnidadesRecurso($cantidad, $disponible, $id) {
        require_once("../models/Recursos.php");
        $services = new Services();
        return $services->addUnidadesRecurso($cantidad, $disponible, $id); 
    }
}
?>