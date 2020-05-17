<!DOCTYPE html>
<?php
$usuario = $_REQUEST['user'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ProyectoPHP</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#">Administrador</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="inicioAdmin.php?user=<?php echo $usuario; ?>">Inicio</a></li>
                <li><a href="habitaciones.php?user=<?php echo $usuario; ?>">Agregar habitacion</a></li>
                <li><a href="camas.php?user=<?php echo $usuario; ?>">Agregar camas</a></li>
                <li><a href="pacientes.php?user=<?php echo $usuario; ?>">Consultar pacientes</a></li>
                <li><a href="gestionarEquipos.php?user=<?php echo $usuario; ?>">Gestionar equipos</a></li>
                <li><a href="gestionarRecursos.php?user=<?php echo $usuario; ?>">Gestionar recursos</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $usuario; ?></a></li>
                <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
            </div>
        </div>
    </nav>
    </body>
</html>