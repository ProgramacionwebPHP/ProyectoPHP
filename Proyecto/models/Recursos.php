<?php

class Services {
    private $db;

    public function __construct() {
        include_once('../config/config.php') ;
        $this->db = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    }

    public function getRecursosId($id) {     
        $sql = "SELECT m.* FROM Recursos AS m INNER JOIN PacienteRecursos AS p ON m.ID = p.IDRecurso INNER JOIN Paciente AS pa  ON p.IDPaciente = pa.ID WHERE pa.ID = $id";
        return mysqli_query($this->db,$sql);
    }

    public function getRecursos() {     
        $sql = "SELECT * FROM Recursos ORDER BY  NumeroUnidadesDisponibles  ASC";
        return mysqli_query($this->db,$sql);
    }

    public function getRecursosDisponibles() {     
        $sql = "SELECT * FROM Recursos WHERE NumeroUnidadesDisponibles > 0";
        return mysqli_query($this->db,$sql);
    }

    public function getRecursoById($id) {     
        $sql = "SELECT * FROM Recursos WHERE ID = $id";
        return mysqli_fetch_array(mysqli_query($this->db,$sql));
    }

    public function addUnidadesRecurso($cantidad, $disponible, $id) {    
        $sql = "UPDATE Recursos SET NumeroUnidades = $cantidad, NumeroUnidadesDisponibles = $disponible   WHERE ID = $id ";
        if(mysqli_query($this->db,$sql)){
            return "Recurso actualizado";
        } else{
            return "Hubo un error actualizando el Recurso";
        }
    }

    public function addRecurso($nombre,$cantidad) {     
        $sql = "INSERT INTO Recursos (Nombre,NumeroUnidades,NumeroUnidadesDisponibles) VALUES ('$nombre',$cantidad,$cantidad)";
        if(mysqli_query($this->db,$sql)){
            return "Recurso creado";
        } else{
            return "Hubo un error creando el Recurso";
        }
    }

    public function asignarRecursos($IdRecurso,$cantidad) {   
        $sql = "SELECT * FROM Recursos WHERE ID = $IdRecurso";  
        $recurso = mysqli_fetch_array(mysqli_query($this->db,$sql));
        $c = $recurso['NumeroUnidadesDisponibles'] - $cantidad;
        if($c < 0 ){
            return 0;
        }
        $sql = "UPDATE Recursos SET NumeroUnidadesDisponibles = $c WHERE ID = $IdRecurso AND NumeroUnidadesDisponibles >= $cantidad";
        if(mysqli_query($this->db,$sql)){
            return 1;
        } else{
            return 0;
        }
    }
}

?>