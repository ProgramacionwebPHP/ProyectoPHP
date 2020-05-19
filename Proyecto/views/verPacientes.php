<?php
    $usuario = $_REQUEST['user'];
    require_once("homeMedico.php");
    include "../controllers/PacienteControlador.php";
    $nuevo = new ControllerPacientes ();
    $datos = $nuevo-> getPacientesById(1);
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
                <h1>Pacientes</h1>
                <hr/>
            </header>
            <div class="row">
                <div class="col-lg-14 ">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?user=".$usuario);?>"> 
                        <h3>Listado de pacientes</h3>
                        <table class="table">
                        <tr>
                        <th>Nombre</th>
                        <th>Diagnostico</th>
                        <th>Prioridad</th>
                        <th>Tiempo de duracion</th>
                        <th>Fecha de ingreso</th>
                        <th>Habitacion</th>
                        <th>Cama</th>
                        <th>Medico</th>
                        <th>Equipos asignados</th>
                        <th>Equipos</th>
                        <th>Recursos</th>
                        </tr>
                        <?php
                        $str_datos = "";
                        while($fila = mysqli_fetch_array($datos)) {
                            $disponible = $fila ['Prioridad'];
                            $aux2;
                            if($disponible == 1){
                                $aux2 = "Baja";
                            } else if($disponible == 2) {
                                $aux2 = "Media";
                            } else {
                                $aux2 = "Alta";
                            }
                            $medico = $nuevo-> getMedico($fila ['IDMedico']);
                            $str_datos .= "<tr>";
                            $str_datos .= "<td>". $fila ['Nombre'] . "</td><td>" . $fila ['Diagnostico']. "</td><td>" . $aux2. "</td><td>" . $fila ['TiempoDeDuracion']. " dias</td><td>" . $fila ['FechaDeIngreso']. "</td><td>Nº.". $fila ['IDHabitacion']. "</td><td>Nº." . $fila ['IDCama']. "</td><td>" . $medico ['Nombre']. "</td><td> <a href=\"VerEquipos.php?user=". $usuario."&paciente=".$fila ['ID']."\"><i class=\"far fa-eye\"></i> Ver equipos</a></td>";
                            $str_datos .= "<td> <a href=\"VerEquipos.php?user=". $usuario."&paciente=".$fila ['ID']."\"><i class=\"far fa-eye\"></i> Agregar Equipos</a></td>";
                            $str_datos .= "<td> <a href=\"VerEquipos.php?user=". $usuario."&paciente=".$fila ['ID']."\"><i class=\"far fa-eye\"></i> Agregar Recursos</a></td>";
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