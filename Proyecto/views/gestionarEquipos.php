<?php
    $usuario = $_REQUEST['user'];
    require_once("homeAdmin.php");
    include "../controllers/EquiposControlador.php";
    $nuevo = new ControllerEquipos ();
    $datos = $nuevo-> getEquipos();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ProyectoPHP</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <header class="text-center">
                <h1>Equipos en el sistema</h1>
                <hr/>
            </header>
            <div class="row">
                <div class="col-md-12 ">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?user=".$usuario);?>"> 
                        <h3>Listado de equipos </h3>
                        <table class="table">
                        <tr>
                        <th>Nombre</th>
                        <th>Paciente</th>
                        <th>Asignaciones</th>
                        </tr>
                        <?php
                        $str_datos = "";
                        while($fila = mysqli_fetch_array($datos)) {
                            if( $fila ['IDPaciente'] != null){
                                $paciente = $nuevo-> getPaciente($fila ['IDPaciente']);
                                $str_datos .= "<tr>";
                                $str_datos .= "<td>". $fila ['Nombre'] . "</td><td>". $paciente ['Nombre'] . "</td><td> <a href=\"cambiarAsignacionEquipo.php?user=". $usuario."&equipo=".$fila ['ID']."&paciente=".$paciente ['ID']."\"><i class=\"fa fa-plus-square-o\"></i> Cambiar asignacion del equipo</a></>" ;
                                $str_datos .= "</tr>";
                            }
                            else{
                                $str_datos .= "<tr>";
                                $str_datos .= "<td>". $fila ['Nombre'] . "</td><td>". $fila ['IDPaciente'] . "</td><td></td>" ;
                                $str_datos .= "</tr>";
                            }
                        }
                        $str_datos .= "</table>";
                        echo $str_datos;
                        ?>              
                    </form>
                    <a href="crearEquipo.php?user=<?php echo $usuario; ?>"> <i class="fa fa-plus-square-o"></i> Agregar Equipos</a>
                </div>
            </div>
        </div>
    </body>
</html>