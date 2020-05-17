<?php
    $usuario = $_REQUEST['user'];
    require_once("homeAdmin.php");
    include "../controllers/CamasControlador.php";
    $nuevo = new ControllerCamas ();
    $datos = $nuevo->getHabitaciones();
?>
<?php
    $Opcion = "";
    $OpcionErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["Opcion"])) {
          $OpcionErr = "Seleccione una habitacion";
        } else {
            $Opcion = $_POST["Opcion"];
            include_once("../controllers/CamasControlador.php") ;
            $nuevo = new ControllerCamas ();
            $OpcionErr = $nuevo->crearCama($Opcion);
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
                <h1>Agregar habitacion</h1>
                <hr/>
            </header>
            <div class="row">
                <div class="col-md-8 ">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?user=".$usuario);?>"> 
                        <h3>Desea agregar una cama?</h3>
                        <table class="table">
                        <tr>
                        <th>Numero</th>
                        <th>Estado</th>
                        </tr>
                        <?php
                        $str_datos = "";
                        while($fila = mysqli_fetch_array($datos)) {
                            $disponible = $fila ['Disponible'];
                            $aux2;
                            if($disponible == 1){
                                $aux2 = "Disponible";
                            } else {
                                $aux2 = "No disponible";
                            }
                            $aux = $fila ['ID'];
                            $str_datos .= "<tr>";
                            $str_datos .= "<td>". "<input type=\"radio\" name=\"Opcion\" value=\"$aux\"> Habitacion numero : $aux ". "</td><td>" . $aux2. "</td>" ;
                            $str_datos .= "</tr>";
                        }
                        $str_datos .= "</table>";
                        echo $str_datos;
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