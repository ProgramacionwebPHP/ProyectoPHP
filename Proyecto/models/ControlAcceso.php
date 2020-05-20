<?php

class Control{
    private $db;

    public function __construct() {
        include_once('config/config.php') ;
        $this->db = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    }

    public function login($nombre, $contraseña) {
        $sql = "SELECT * FROM Medico WHERE Nombre = '$nombre' AND Contraseña = '$contraseña'";
        $result = mysqli_query($this->db,$sql);
        if($result != null){
            return $result;
        }else{
            return null;
        }
    }
}

?>