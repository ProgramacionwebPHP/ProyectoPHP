<?php

class ControllerRecursos {

    public function getRecursos() {
        require_once("../models/Recursos.php");
        $services = new Services();
        return $services->getRecursos(); 
    }

    public function getRecursosDisponibles(){
        require_once("../models/Recursos.php");
        $services = new Services();
        return $services->getRecursosDisponibles(); 
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

    public function asignarRecursos($nombres,$cantidades,$idpaciente,$idMedico){
        require_once("../models/Recursos.php");
        $services = new Services();
        $longitud = count($nombres);
        $result = 0;
        for($i=0; $i<$longitud; $i++){
            $solve = $services->asignarRecursos($nombres[$i], $cantidades[$i]); 
            if($solve == 1){
                $result = $result + 1;
            }
        }
        if($result == $longitud){
            Header("Location:../views/verPacientes.php?user=".$idMedico);
        }else{
            return "No se pudieron asignar todos los recursos seleccionados";
        }
    }
}
?>