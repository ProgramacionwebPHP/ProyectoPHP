<?php

class Mensaje {
    private $db;

    public function __construct() {
        include_once('../config/config.php') ;
        $this->db = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    }

    public function crearMensaje($idMedico,$idpaciente, $fecha) {   
        $sql = "INSERT INTO Mensajes (IDPaciente,IDMedico, Fecha) VALUES ($idpaciente,$idMedico, '$fecha')";
        if(mysqli_query($this->db,$sql)){
            $sql = "SELECT LAST_INSERT_ID()";
            return mysqli_fetch_array(mysqli_query($this->db,$sql));
        } else{
            echo "Error en la creacion " . mysqli_error($this->db) . "<br>";
            return "Hubo un error creando el mensaje";
        }
    }

    public function crearRelacion($idMensaje, $idEquipo) {    
        $sql = "INSERT INTO MensajesEquipos (IDMensaje, IDEquipo) VALUES ($idMensaje, $idEquipo)";
        if(mysqli_query($this->db,$sql)){
            return "MensajeEquipo creado";
        } else{
            return "Hubo un error creando el MensajeEquipo";
        }
    }

    public function getMensajesId($id) {     
        $sql = "SELECT * FROM Mensajes WHERE ID = $id";
        return mysqli_query($this->db,$sql);
    }

    public function getMensajes() {     
        $sql = "SELECT mensajes.*, paciente.Prioridad
                FROM mensajes
                INNER JOIN paciente ON mensajes.IDPaciente=paciente.ID
                ORDER BY paciente.Prioridad DESC, mensajes.Fecha ASC";
        return mysqli_query($this->db,$sql);
    }

    public function getSolicitud($id) {     
        $sql = "SELECT * FROM Mensajesequipos WHERE IDMensaje = $id";
        return mysqli_query($this->db,$sql);
    }

    public function getMedico($id) {
        $sql = "SELECT * FROM Medico WHERE ID = $id";
        return mysqli_query($this->db,$sql);
    }

    public function getPaciente($id) {
        $sql = "SELECT * FROM Paciente WHERE ID = $id";
        return mysqli_query($this->db,$sql);
    }

    public function getEquipo($id) {     
        $sql = "SELECT * FROM Equipos WHERE ID = $id";
        return mysqli_query($this->db,$sql);
    }

    public function deleteSolicitud($id) {
        $sql = "DELETE FROM Mensajesequipos WHERE IDMensaje = $id;";
        mysqli_query($this->db,$sql);
        $sql = "DELETE FROM Mensajes WHERE ID = $id;";
        mysqli_query($this->db,$sql);
    }

    public function updateEquipo($ide, $idp) {     
        $sql = "UPDATE Equipos SET IDPaciente = $idp WHERE ID = $ide";
        return mysqli_query($this->db,$sql);
    }
}

?>