<?php
    $usuario = $_REQUEST['user'];
    require_once("homeAdmin.php");
?>
<!DOCTYPE html>
<?php
    $nombre = "";
    $OpcionErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nombre"])) {
          $OpcionErr = "Ingrese el nombre";
        }
        else {
            $nombre = $_POST["nombre"];
            include "../controllers/EquiposControlador.php";
            $nuevo = new ControllerEquipos ();
            $OpcionErr = $nuevo-> addEquipo($nombre);
            if($OpcionErr == "Equipo creado"){
                Header("Location: gestionarEquipos.php?user=".$usuario);
            }
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
                <h1>Agregar equipo</h1>
                <hr/>
            </header>
            <div class="row">
                <div class="col-md-4 ">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?user=".$usuario);?>"> 
                        <h3>Ingrese los campos </h3> 
                        Nombre: <input type="text" name="nombre" class="form-control"/>    
                        <br/>
                        <span class="error">* <?php echo $OpcionErr;?></span>
                        <br/>
                        <input type="submit" value="Enviar" class="btn btn-success"/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>