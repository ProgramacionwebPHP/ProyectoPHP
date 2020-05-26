<!DOCTYPE html>
<?php
    $usuario = $_REQUEST['user'];
    $idpaciente = $_REQUEST['paciente'];
    require_once("homeMedico.php");
    $nuevo = new ControllerPacientes ();
    $paciente = $nuevo-> getPaciente($idpaciente);
    $medico = $nuevo-> getMedico($usuario);	
    date_default_timezone_set("America/Bogota");
    $fecha = date('Y-m-d H:i:s');
    $nuevo = new ControllerRecursos ();
    $datos = $nuevo-> getRecursosDisponibles();
    $str_datos = "";
    while($fila = mysqli_fetch_array($datos)) {
        $aux = $fila['Nombre'];
        $id = $fila['ID'];
        $str_datos .= " <option value= $id  >$aux</option>";
    }                                   
?>
<?php
    $OpcionErr = "";
    $nombres = [];
    $cantidades = [];
    if (isset($_POST["nombres"])) {
        $nombres = $_POST["nombres"];
        $cantidades = $_POST["cantidades"];
    }
    if (isset($_POST["guardar"])) {
        if ($cantidades[0]== null) {
            $OpcionErr = "Seleccione un recurso y su cantidad";
            array_pop($nombres);
            array_pop($cantidades);
        } else {
            $OpcionErr = $nuevo-> asignarRecursos($nombres,$cantidades,$idpaciente, $usuario);
            array_pop($nombres);
            array_pop($cantidades);
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
                <h1>Solicitar Recursos</h1>
                <hr/>
            </header>
            <div class="row">
                <div class="col-md-5 ">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?user=".$usuario."&paciente=".$idpaciente);?>"> 
                        <h3>Formulario</h3>                
                        Nombre del medico: <input type="text" name="nombr" class="form-control" value=" <?php echo $medico ['Nombre']?>" readonly/><br>   
                        Nombre del paciente: <input type="text" name="emails" class="form-control" value="<?php echo $paciente ['Nombre']?>" readonly/> <br>   
                        Hora de la solicitud: <input type="text" name="c-emails" class="form-control" value="<?php echo $fecha?>" readonly/>   <br>   
                        <h3>Seleccione los recursos y sus unidades</h3> 
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?user=".$usuario."&paciente=".$idpaciente);?>"> 
                            <div class="col-md-20 ">
                                
                                <?php foreach ($nombres as $nombre) { ?>
                                    <div class="col-md-6 ">
                                    Recurso: <select name="nombres[]"  class="form-control">
                                    <?php echo $str_datos;?>
                                    </select>
                                    </div>
                                    <div class="col-md-6 ">
                                    Unidades: <input name="cantidades[]" type="number"  class="form-control" min="0">
                                    </div>
                                    <br><br><br><br>
                                    
                                <?php } ?>
                                <div class="col-md-6 ">
                                Recurso: 
                                    <select name="nombres[]"  class="form-control">
                                    <?php echo $str_datos;?> 
                                    </select><br>
                                </div>
                                <div class="col-md-6 ">
                                Unidades: <input name="cantidades[]" type="number"  class="form-control" min="0">
                                </div>
                                <br>
                                <br>
                            </div>
                            <div class="col-md-8 "> 
                            <input name="agregar" type="submit" value="+" class="btn btn-success"/>
                        </form><br>
                        <br><span class="error">* <?php echo $OpcionErr;?></span>
                        <br/><br>
                        <input type="submit" name="guardar" value="Solicitar recursos" class="btn btn-success"/>
                       </div> 
                    </form>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-5"></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-5 ">
                    <h3>Listado de recursos disponibles </h3>
                        <table class="table">
                        <tr>
                        <th>Nombre del recurso</th>
                        <th>Numero de unidades disponibles</th>
                        </tr>
                        <?php
                        $nuevo = new ControllerRecursos ();
                        $datos = $nuevo-> getRecursosDisponibles();
                        $str_datos = "";
                        while($fila = mysqli_fetch_array($datos)) {
                            $str_datos .= "<tr>";
                            $str_datos .= "<td>". $fila ['Nombre'] . "</td><td>". $fila ['NumeroUnidadesDisponibles'] . "</td>" ;
                            $str_datos .= "</tr>";
                        }
                        $str_datos .= "</table>";
                        echo $str_datos;
                        ?>           
                </div> 
            </div>
           <br>
            <br>  
        </div>
    </body>
</html>