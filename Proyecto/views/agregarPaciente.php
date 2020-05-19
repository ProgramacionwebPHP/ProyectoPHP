<?php
    $usuario = $_REQUEST['user'];
    require_once("homeMedico.php");
    include "../controllers/CamasControlador.php";
    $nuevo = new ControllerCamas ();
    $datos = $nuevo->getHabitaciones();
?>
<?php
    $Opcion = "";
    $OpcionErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["Opcion"])) {
          $OpcionErr = "Seleccione una cama";
        } else {
            $Opcion = $_POST["Opcion"];
            $prueba = $nuevo->getHabitacionByIdCama($Opcion);
            Header("Location: crearPaciente.php?user=".$usuario."&cama=".$Opcion."&habitacion=".$prueba['IDHabitacion']);
        }
      }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ProyectoPHP</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <header class="text-center">
                <h1>Agregar paciente</h1>
                <hr/>
            </header>
            <div class="row">
                <div class="col-md-8 ">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?user=".$usuario);?>"> 
                        <h3>Seleccione una cama</h3>
                        <?php
                        $str_datos = "";
                        
                        while($fila = mysqli_fetch_array($datos)) {
                            $disponible = $fila ['Disponible'];
                            $aux = $fila ['ID'];
                            if($disponible == 1){
                                $aux2 = "Disponible";
                            } else {
                                $aux2 = "No disponible";
                            }
                            $str_datos .= "<table class=\"table\"><tr><th>Habitacion numero $aux</th><th>Estado de la habitacion $aux2</th></tr>";
                            if($disponible == 1){
                                $camas =  $nuevo->getCamas($aux);
                                while($fila2 = mysqli_fetch_array($camas)) {
                                    $disponibleCama =  $fila2['Disponible'];
                                    if($disponibleCama == 1 ){
                                        $idCama = $fila2 ['ID'];
                                        $str_datos .= "<tr>";
                                        $str_datos .= "<td>". "<input type=\"radio\" name=\"Opcion\" value=\"$idCama\"> Cama numero : $idCama ". "</td><td>Cama disponble</td>" ;
                                        $str_datos .= "</tr>";
                                    }
                                }
                            }
                            $str_datos .= "</table>";
                            echo $str_datos; 
                            $str_datos = "";
                        }
                        ?>              
                        <span class="error">* <?php echo $OpcionErr;?></span>
                        <br/>
                        <input type="submit" value="Agregar" class="btn btn-success"/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>