<?php
    include_once dirname(__FILE__) . '/config.php';
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    /**
    *Creacion de Habitaciones
    * 
    */
    $sql = "INSERT INTO Habitacion (Disponible) VALUES (0)";
    if(mysqli_query($con,$sql)){
        echo "Habitacion creada <br>";
    }
    else{
        echo "Error creando la habitacion <br>";
    }
    $sql = "INSERT INTO Habitacion (Disponible) VALUES (1)";
    if(mysqli_query($con,$sql)){
        echo "Habitacion creada <br>";
    }
    else{
        echo "Error creando la habitacion <br>";
    }
    /**
    *Creacion de Camas
    * 
    */
    $sql = "INSERT INTO Cama (Disponible,IDHabitacion) VALUES (0,1)";
    if(mysqli_query($con,$sql)){
        echo "Cama creada <br>";
    }
    else{
        echo "Error creando la cama <br>";
    }
    $sql = "INSERT INTO Cama (Disponible,IDHabitacion) VALUES (0,1)";
    if(mysqli_query($con,$sql)){
        echo "Cama creada <br>";
    }
    else{
        echo "Error creando la cama <br>";
    }
    $sql = "INSERT INTO Cama (Disponible,IDHabitacion) VALUES (1,2)";
    if(mysqli_query($con,$sql)){
        echo "Cama creada <br>";
    }
    else{
        echo "Error creando la cama <br>";
    }
    /**
    *Creacion de medicos
    * 
    */
    $sql = "INSERT INTO Medico (Nombre,Email,Contraseña) VALUES ('Johan','johan@gmail.com','123')";
    if(mysqli_query($con,$sql)){
        echo "Medico creado <br>";
    }
    else{
        echo "Error creando el medico <br>";
    }
    $sql = "INSERT INTO Medico (Nombre,Email,Contraseña) VALUES ('Juan','juan@gmail.com','123')";
    if(mysqli_query($con,$sql)){
        echo "Medico creado <br>";
    }
    else{
        echo "Error creando el medico <br>";
    }
    /**
    *Creacion de pacientes
    * 
    */
    $sql = "INSERT INTO Paciente (Nombre,Diagnostico,Prioridad,TiempoDeDuracion,FechaDeIngreso, IDHabitacion, IDCama, IDMedico) VALUES ('Camilo','Diarrea','1','2','2011-03-12',1,1,1)";
    if(mysqli_query($con,$sql)){
        echo "Paciente creado <br>";
    }
    else{
        echo "Error creando al paciente <br>";
    }
    $sql = "INSERT INTO Paciente (Nombre,Diagnostico,Prioridad,TiempoDeDuracion,FechaDeIngreso, IDHabitacion, IDCama, IDMedico) VALUES ('Carlos','Vomito','3','5','2020-03-12',1,2,2)";
    if(mysqli_query($con,$sql)){
        echo "Paciente creado <br>";
    }
    else{
        echo "Error creando al paciente <br>";
    }
    /**
    *Creacion de recursos
    * 
    */
    $sql = "INSERT INTO Recursos (Nombre,NumeroUnidades,NumeroUnidadesDisponibles) VALUES ('anestesia',2,0)";
    if(mysqli_query($con,$sql)){
        echo "recurso creado <br>";
    }
    else{
        echo "Error creando el recurso <br>";
    }
    $sql = "INSERT INTO Recursos (Nombre,NumeroUnidades,NumeroUnidadesDisponibles) VALUES ('desinflamatorio',2,1)";
    if(mysqli_query($con,$sql)){
        echo "recurso creado <br>";
    }
    else{
        echo "Error creando el recurso <br>";
    }
    $sql = "INSERT INTO Recursos (Nombre,NumeroUnidades,NumeroUnidadesDisponibles) VALUES ('unidadesDeMascaras',3,1)";
    if(mysqli_query($con,$sql)){
        echo "recurso creado <br>";
    }
    else{
        echo "Error creando el recurso <br>";
    }
    $sql = "INSERT INTO Recursos (Nombre,NumeroUnidades,NumeroUnidadesDisponibles) VALUES ('Aspirina',10,9)";
    if(mysqli_query($con,$sql)){
        echo "recurso creado <br>";
    }
    else{
        echo "Error creando el recurso <br>";
    }
    /**
    *Creacion de equipos
    * 
    */
    $sql = "INSERT INTO Equipos (Nombre,IDPaciente) VALUES ('ventilador',1)";
    if(mysqli_query($con,$sql)){
        echo "equipo creado <br>";
    }
    else{
        echo "Error creando el equipo <br>";
    }
    $sql = "INSERT INTO Equipos (Nombre,IDPaciente) VALUES ('ventilador',2)";
    if(mysqli_query($con,$sql)){
        echo "equipo creado <br>";
    }
    else{
        echo "Error creando el equipo <br>";
    }
    $sql = "INSERT INTO Equipos (Nombre,IDPaciente) VALUES ('televisor',2)";
    if(mysqli_query($con,$sql)){
        echo "equipo creado <br>";
    }
    else{
        echo "Error creando el equipo <br>";
    }
    $sql = "INSERT INTO Equipos (Nombre) VALUES ('televisor')";
    if(mysqli_query($con,$sql)){
        echo "equipo creado <br>";
    }
    else{
        echo "Error creando el equipo <br>";
    }
    $sql = "INSERT INTO Equipos (Nombre) VALUES ('xbox')";
    if(mysqli_query($con,$sql)){
        echo "equipo creado <br>";
    }
    else{
        echo "Error creando el equipo <br>";
    }
    $sql = "INSERT INTO Equipos (Nombre) VALUES ('play')";
    if(mysqli_query($con,$sql)){
        echo "equipo creado <br>";
    }
    else{
        echo "Error creando el equipo <br>";
    }
    $sql = "INSERT INTO Equipos (Nombre) VALUES ('play')";
    if(mysqli_query($con,$sql)){
        echo "equipo creado <br>";
    }
    else{
        echo "Error creando el equipo <br>";
    }
    /**
    *Creacion de PacienteRecursos
    * 
    */
    $sql = "INSERT INTO PacienteRecursos (IDRecurso,IDPaciente) VALUES (1,1)";
    if(mysqli_query($con,$sql)){
        echo "PacienteRecursos creado <br>";
    } else{
        echo "Error creando el PacienteRecursos <br>";
    }
    $sql = "INSERT INTO PacienteRecursos (IDRecurso,IDPaciente) VALUES (1,2)";
    if(mysqli_query($con,$sql)){
        echo "PacienteRecursos creado <br>";
    } else{
        echo "Error creando el PacienteRecursos <br>";
    }
    $sql = "INSERT INTO PacienteRecursos (IDRecurso,IDPaciente) VALUES (3,1)";
    if(mysqli_query($con,$sql)){
        echo "PacienteRecursos creado <br>";
    } else{
        echo "Error creando el PacienteRecursos <br>";
    }
    $sql = "INSERT INTO PacienteRecursos (IDRecurso,IDPaciente) VALUES (3,2)";
    if(mysqli_query($con,$sql)){
        echo "PacienteRecursos creado <br>";
    } else{
        echo "Error creando el PacienteRecursos <br>";
    }
    $sql = "INSERT INTO PacienteRecursos (IDRecurso,IDPaciente) VALUES (2,1)";
    if(mysqli_query($con,$sql)){
        echo "PacienteRecursos creado <br>";
    } else{
        echo "Error creando el PacienteRecursos <br>";
    }
    $sql = "INSERT INTO PacienteRecursos (IDRecurso,IDPaciente) VALUES (4,2)";
    if(mysqli_query($con,$sql)){
        echo "PacienteRecursos creado <br>";
    } else{
        echo "Error creando el PacienteRecursos <br>";
    }
?>