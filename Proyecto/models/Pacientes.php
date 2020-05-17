<?php

class Service {
    private $db;

    public function __construct() {
        include_once('../config/config.php') ;
        $this->db = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    }

    public function getPacientes() {
        $sql = "SELECT * FROM Paciente";
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
}

?>