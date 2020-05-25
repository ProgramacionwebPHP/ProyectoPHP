<?php
    $usuario = $_REQUEST['user'];
    require_once("homeAdmin.php");
    include "../controllers/MensajesControlador.php";
    $nuevo = new ControllerMensajes ();
    $datos = $nuevo-> getMensajes();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ProyectoPHP</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <header class="text-center">
                <h1>Mensajes</h1>
                <hr/>
            </header>
            <div class="row">
                <div class="col-md-12 ">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?user=".$usuario);?>"> 
                        <h3>Listado de mensajes</h3>
                        <table class="table">
                        <tr>
                        <th>Fecha</th>
                        <th>Medico</th>
                        <th>Paciente</th>
                        </tr>
                        <?php
                        $str_datos = "";
                        while($fila = mysqli_fetch_array($datos)) {
                            $medico = $nuevo-> getMedico($fila ['IDMedico']);
                            $paciente = $nuevo-> getPaciente($fila ['IDPaciente']);
                            $str_datos .= "<tr>";
                            $str_datos .= "<td>". $fila ['Fecha'] . "</td><td>" . $medico['Nombre']. "</td><td>" . $paciente['Nombre']. "</td><td> <a href=\"solicitud.php?user=". $usuario."&solicitud=".$fila ['ID']."\"><i class=\"far fa-eye\"></i> Ver solicitud</a></td>";
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