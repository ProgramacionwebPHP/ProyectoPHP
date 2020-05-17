<?php

class Services {
    private $db;

    public function __construct() {
        include_once('../config/config.php') ;
        $this->db = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    }

    public function getEquiposId($id) {     
        $sql = "SELECT* FROM Equipos WHERE IDPaciente = $id";
        return mysqli_query($this->db,$sql);
    }

    public function getEquipos() {     
        $sql = "SELECT * FROM Equipos ";
        return mysqli_query($this->db,$sql);
    }

    public function getEquipoById($id) {     
        $sql = "SELECT * FROM Equipos WHERE ID = $id";
        return mysqli_fetch_array(mysqli_query($this->db,$sql));
    }


    public function addEquipo($nombre) {     
        $sql = "INSERT INTO Equipos (Nombre) VALUES ('$nombre')";
        if(mysqli_query($this->db,$sql)){
            return "Equipo creado";
        } else{
            return "Hubo un error creando el equipo";
        }
    }

    public function getPaciente($id) {
        $sql = "SELECT * FROM Paciente WHERE ID = $id";
        return mysqli_query($this->db,$sql);
    }
}

?>