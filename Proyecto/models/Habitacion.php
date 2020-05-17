<?php

class Service {
    
    private $db;

    public function __construct() {
        include_once('../config/config.php') ;
        $this->db = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    }

    public function getHabitaciones() {
        $sql = "SELECT * FROM Habitacion";
        return mysqli_query($this->db,$sql);
    }

    public function crearHabitacion() {
        $sql = "INSERT INTO Habitacion (Disponible) VALUES (1)";
        if(mysqli_query($this->db,$sql)){
            return "Habitacion creada con exito";
        }
        else{
            return "Error creando la habitacion";
        }
    }

    public function crearCama($id) {
        $sql = "INSERT INTO Cama (Disponible,IDHabitacion) VALUES (1,$id)";
        if(mysqli_query($this->db,$sql)){
            if($this->updateHabitacion(1,$id)){
                return "Cama creada con exito";
            }else{
                return "Error creando la cama";
            } 
        }
        else{
            return "Error creando la cama";
        }
    }

    public function updateHabitacion($estado, $id){
        $sql = "UPDATE Habitacion SET Disponible = $estado WHERE ID = $id";
        return mysqli_query($this->db,$sql);
    }

}
?>