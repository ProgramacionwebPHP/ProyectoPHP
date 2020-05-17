<!DOCTYPE html>
<?php
$mensaje = "";
if ((isset($_POST['nombre'])) && ($_POST['nombre'] != '') && (isset($_POST['contraseña'])) && ($_POST['contraseña'] != '')) {
    include "controllers/indexControlador.php";
    $nuevo = new ControllerIndex ();
    $mensaje = $nuevo->login($_POST['nombre'], $_POST['contraseña']);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejemplo MVC con PHP</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <header class="text-center">
                <h1>Bienvenidos</h1>
                <hr/>
                <p class="lead">Aplicacion para asignacion de <br/>
                     habitaciones, camas, equipos y recursos<br/>
                    para pacientes</p>
            </header>
            <div class="row">
                <div class="col-md-8 ">

                    <form action="#" method="post" class="col-lg-5">
                        <h3>Iniciar Sesion</h3>                
                        Usuario <input type="text" name="nombre" class="form-control"/>    
                        Contraseña: <input type="text" name="contraseña" class="form-control"/>   
                        <span class="help-block"><?php echo $mensaje?></span>  
                        <br/>
                        <input type="submit" value="Ingresar" class="btn btn-success"/>
                    </form>
                </div>
                <div class="col-lg-6 ">
                    <hr/>
                    <h3>Usuarios Nuevos</h3>
                    <a href="controllers/registrarControlador.php"><i class="fa fa-align-justify"></i> registrase!</a>
                    <hr/>
                </div> 
            </div>
            <footer class="col-lg-12 text-center">
                Colombia - <?php echo date("Y"); ?>
            </footer>
        </div>
    </body>
</html>