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

    public function getEquiposDisponibles() {     
        $sql = "SELECT * FROM Equipos WHERE IDPaciente IS NULL";
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

    public function getCandidatos($id, $paciente) {
        $prioridad = $paciente['Prioridad'];
        $sql = "SELECT m.* FROM Paciente AS m WHERE m.Prioridad > $prioridad AND m.Prioridad > (SELECT COUNT(*) FROM Equipos WHERE IDPaciente = m.ID)";
        return mysqli_query($this->db,$sql);
    }

    public function updateEquipo($idEquipo,$idNuevo) {
        $sql = "UPDATE Equipos SET IDPaciente = $idNuevo WHERE ID = $idEquipo ";
        if(mysqli_query($this->db,$sql)){
            return "Equipo actualizado";
        } else{
            return "Hubo un error actualizando el equipo";
        }
    }
    public function updateEquipoToNull($idEquipo) {
        $sql = "UPDATE Equipos SET IDPaciente = NULL WHERE ID = $idEquipo ";
        if(mysqli_query($this->db,$sql)){
            return "Equipo actualizado";
        } else{
            return "Hubo un error actualizando el equipo";
        }
    }
}

?>