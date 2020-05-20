<?php

class Mensaje {
    private $db;

    public function __construct() {
        include_once('../config/config.php') ;
        $this->db = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    }

    public function crearMensaje($idMedico,$idpaciente, $fecha) {     
        $sql = "INSERT INTO Mensajes (IDPaciente,IDMedico,Fecha) VALUES ($idMedico,$idpaciente, $fecha)";
        if(mysqli_query($this->db,$sql)){
            $sql = "SELECT SCOPE_IDENTITY()";
            return mysqli_query($this->db,$sql);
        } else{
            return "Hubo un error creando el mensaje";
        }
    }

    public function crearRelacion($idMensaje, $idEquipo) {     
        $sql = "INSERT INTO MensajesEquipos (IDMensaje, IDPaciente) VALUES ($idMensaje, $idEquipo)";
        if(mysqli_query($this->db,$sql)){
            return "MensajeEquipo creado";
        } else{
            return "Hubo un error creando el MensajeEquipo";
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