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
            <a class="navbar-brand" href="#">Medico</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="inicioMedico.php?user=<?php echo $usuario; ?>">Inicio</a></li>
                <li><a href="agregarPaciente.php?user=<?php echo $usuario; ?>">Agregar paciente</a></li>
                <li><a href="verPacientes.php?user=<?php echo $usuario; ?>">Ver pacientes</a></li>
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