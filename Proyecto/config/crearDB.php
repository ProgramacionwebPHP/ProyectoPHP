<?php
 /*
  * Cadena de conexion
  */
  include_once dirname(__FILE__) . '/config.php';
  $conect=mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS);
  /**
  * Creacion de la DB
  * 
  */
  $sql="CREATE DATABASE DBProyecto";
  if (mysqli_query($conect,$sql)) {
	  echo "Base de datos DBProyecto creada<br>";
  }else {
	  echo "Error en la creacion " . mysqli_error($conect) . "<br>";
  }
  /**
  *Conexion para crear las tablas
  */
  $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
  /**
  *Creacion de la tabla habitacion 
  * 
  */
  $sql = "CREATE TABLE Habitacion 
  (
    ID INT NOT NULL AUTO_INCREMENT, 
    PRIMARY KEY(ID),
    Disponible BIT (1)
  )";
  if (mysqli_query($con, $sql)) {
      echo "Tabla Habitacion creada correctamente<br>";
  } else {
      echo "Error en la creacion " . mysqli_error($con) . "<br>";
  }
  /**
  *Creacion de la tabla cama 
  * 
  */
  $sql = "CREATE TABLE Cama 
  (
    ID INT NOT NULL AUTO_INCREMENT, 
    PRIMARY KEY(ID),
    Disponible BIT (1),
    IDHabitacion INTEGER,
    FOREIGN KEY(IDHabitacion) REFERENCES Habitacion(ID)
  )";
  if (mysqli_query($con, $sql)) {
      echo "Tabla Cama creada correctamente<br>";
  } else {
      echo "Error en la creacion " . mysqli_error($con) . "<br>";
  }
  /**
  *Creacion de la tabla medico
  * 
  */
  $sql = "CREATE TABLE Medico 
  (
    ID INT NOT NULL AUTO_INCREMENT, 
    PRIMARY KEY(ID),
    Nombre CHAR(15),
    Email CHAR(15),
    Contraseña CHAR(15),
    Rol BIT (1)
  )";
  if (mysqli_query($con, $sql)) {
      echo "Tabla Medico creada correctamente<br>";
  } else {
      echo "Error en la creacion " . mysqli_error($con) . "<br>";
  }
  /**
  *Creacion de la tabla paciente
  * 
  */
  $sql = "CREATE TABLE Paciente 
  (
    ID INT NOT NULL AUTO_INCREMENT, 
    PRIMARY KEY(ID),
    Nombre CHAR(15),
    Diagnostico CHAR(15),
    Prioridad INT,
    TiempoDeDuracion INT,
    FechaDeIngreso DATE,
    IDHabitacion INTEGER,
    FOREIGN KEY(IDHabitacion) REFERENCES Habitacion(ID),
    IDCama INTEGER,
    FOREIGN KEY(IDCama) REFERENCES Cama(ID),
    IDMedico INTEGER,
    FOREIGN KEY(IDMedico) REFERENCES Medico(ID)
  )";
  if (mysqli_query($con, $sql)) {
      echo "Tabla Paciente creada correctamente<br>";
  } else {
      echo "Error en la creacion " . mysqli_error($con) . "<br>";
  }
  /**
  *Creacion de la tabla recursos
  * 
  */
  $sql = "CREATE TABLE Recursos 
  (
    ID INT NOT NULL AUTO_INCREMENT, 
    PRIMARY KEY(ID),
    Nombre CHAR(15),
    NumeroUnidades INTEGER,
    NumeroUnidadesDisponibles INTEGER
  )";
  if (mysqli_query($con, $sql)) {
      echo "Tabla Recursos creada correctamente<br>";
  } else {
      echo "Error en la creacion " . mysqli_error($con) . "<br>";
  }
  /**
  *Creacion de la tabla pacienterecursos
  * 
  */
  $sql = "CREATE TABLE PacienteRecursos 
  (
    IDRecurso INTEGER,
    FOREIGN KEY(IDRecurso) REFERENCES Recursos(ID),
    IDPaciente INTEGER,
    FOREIGN KEY(IDPaciente) REFERENCES Paciente(ID)
  )";
  if (mysqli_query($con, $sql)) {
      echo "Tabla PacienteRecursos creada correctamente<br>";
  } else {
      echo "Error en la creacion " . mysqli_error($con) . "<br>";
  }
  /**
  *Creacion de la tabla equipos
  * 
  */
  $sql = "CREATE TABLE Equipos
  (
    ID INT NOT NULL AUTO_INCREMENT, 
    PRIMARY KEY(ID),
    Nombre CHAR(15),
    IDPaciente INTEGER,
    FOREIGN KEY(IDPaciente) REFERENCES Paciente(ID)
  )";
  if (mysqli_query($con, $sql)) {
      echo "Tabla Equipos creada correctamente<br>";
  } else {
      echo "Error en la creacion " . mysqli_error($con) . "<br>";
  }
?>