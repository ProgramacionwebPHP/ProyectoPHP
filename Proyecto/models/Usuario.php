<?php

class Usuario {
    private $db;

    public function __construct() {
        include_once('../config/config.php') ;
        $this->db = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    }
    
    public function ValidarUsuario($nombre) {
        $sql = "SELECT * FROM Medico WHERE Nombre = '$nombre'";
        return mysqli_fetch_array(mysqli_query($this->db,$sql));
    }

    public function CrearUsuario($nombre, $email, $contraseña){
        $sql = "INSERT INTO Medico (Nombre,Email,Contraseña,Rol) VALUES ('$nombre','$email','$contraseña',0)";
        if(mysqli_query($this->db,$sql)){
            return "Creado";
        }else{
            return "Error";
        }
    }
}

?>