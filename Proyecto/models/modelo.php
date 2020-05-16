<?php

class Service {
    
    private $servicio;
    private $db;

    public function __construct() {
        $this->servicio = array();
        include_once('../config/config.php') ;
        $this->db = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    }

    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function getServicios() {

        self::setNames();
        $sql = "SELECT * FROM Personas";
        foreach ($this->db->query($sql) as $res) {
            $this->servicio[] = $res;
        }
        return $this->servicio;
        $this->db = null;
    }

    public function setServicio($nombre, $precio) {
        echo $nombre;
        return true;
    }
}
?>