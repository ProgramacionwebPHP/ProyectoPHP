<?php
    $usuario = $_REQUEST['user'];
    $idpaciente = $_REQUEST['paciente'];
    require_once("homeMedico.php");
    $nuevo = new ControllerPacientes ();
    $datos = $nuevo-> getEquipos($idpaciente);
    $paciente = $nuevo-> getPaciente($idpaciente);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ProyectoPHP</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <header class="text-center">
                <h1>Datos del paciente: <?php echo $paciente ['Nombre']?></h1>
                <hr/>
            </header>
            <div class="row">
                <div class="col-md-12 ">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?user=".$usuario);?>"> 
                        <h3>Listado de equipos asignados</h3>
                        <table class="table">
                        <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                        </tr>
                        <?php
                        $str_datos = "";
                        while($fila = mysqli_fetch_array($datos)) {
                            $str_datos .= "<tr>";
                            $str_datos .= "<td>". $fila ['Nombre'] . "</td>";
                            $str_datos .= "<td> <a href=\"confirmacionEquipo.php?user=". $usuario."&paciente=".$idpaciente."&equipo=".$fila ['ID']."\"><i class=\"fa fa-minus-square-o\"></i> Quitar equipo</a></td>";
                            $str_datos .= "</tr>";
                        }
                        $str_datos .= "</table>";
                        echo $str_datos;
                        ?>              
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>