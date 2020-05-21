<?php

class Mensaje {
    private $db;

    public function __construct() {
        include_once('../config/config.php') ;
        $this->db = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    }

    public function crearMensaje($idMedico,$idpaciente, $fecha) {     
        $sql = "INSERT INTO Mensajes (IDPaciente,IDMedico) VALUES ($idMedico,$idpaciente)";
        if(mysqli_query($this->db,$sql)){
            $sql = "SELECT LAST_INSERT_ID()";
            return mysqli_fetch_array(mysqli_query($this->db,$sql));
        } else{
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
}

?>