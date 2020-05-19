<?php
    $usuario = $_REQUEST['user'];
    $cama = $_REQUEST['cama'];
    $habitacion = $_REQUEST['habitacion'];
    require_once("homeMedico.php");
    include "../controllers/PacienteControlador.php";
    $nuevo = new ControllerPacientes();
    $cantidad = "";
    $OpcionErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nombre"]) || empty($_POST["identificacion"]) || empty($_POST["diagnostico"]) || empty($_POST["prioridad"]) || empty($_POST["fecha"]) || empty($_POST["dias"]) ) {
            $OpcionErr = "Ingrese todos los campos";
        }
        else {
            $nombre = $_POST["nombre"];
            $identificacion = $_POST["identificacion"];
            $diagnostico = $_POST["diagnostico"];
            $prioridad = $_POST["prioridad"];
            $fecha = $_POST["fecha"];
            $dias = $_POST["dias"];
            $OpcionErr = $nuevo-> agregarPaciente($nombre,$identificacion,$diagnostico,$prioridad,$fecha,$dias,$habitacion,$cama,1);
            if($OpcionErr == "Paciente creado con exito"){
                include "../controllers/CamasControlador.php";
                $nuevos = new ControllerCamas ();
                $nuevos->updateHabitacion($cama,$habitacion);
                Header("Location: verPacientes.php?user=".$usuario);
            }
        }
      }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ProyectoPHP</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <header class="text-center">
                <h1>Crear paciente</h1>
                <hr/>
            </header>
            <div class="row">
                <div class="col-md-4 ">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?user=".$usuario ."&cama=".$cama."&habitacion=".$habitacion);?>">
                        <h3>Complete los campos: </h3>   
                        Nombre: <input type="text" name="nombre" class="form-control"/><br> 
                        Identificacion: <input type="text" name="identificacion" class="form-control"/><br>   
                        Diagnostico: <input type="text" name="diagnostico" class="form-control"/> <br>    
                        Prioridad: <select name="prioridad"  class="form-control"><br>
                        <option value= "1" >baja</option>
                        <option value= "2" >media</option>
                        <option value= "3" >alta</option>
                        </select><br>
                        Fecha de ingreso: <input type="date" name="fecha" class="form-control"> <br>
                        Numero de dias que utilizara la cama: <input type="text" name="dias" class="form-control"/><br> 
                        <span class="error">* <?php echo $OpcionErr;?></span>
                        <br/>
                        <br/> 
                        <input type="submit" value="Guardar" class="btn btn-success"/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>