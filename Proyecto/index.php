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
        <title>ProyectoPHP</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        Nombre:  
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email" type="text" class="form-control" name="nombre" placeholder="Nombre">
                        </div>   
                        <br> 
                        Contraseña:
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="contraseña" placeholder="Contraseña">
                        </div>   
                        <span class="help-block"><?php echo $mensaje?></span>  
                        <br/>
                        <input type="submit" value="Ingresar" class="btn btn-success"/>
                    </form>
                </div>
                <div class="col-lg-6 ">
                    <hr/>
                    <h3>Usuarios Nuevos</h3>
                    <a href="controllers/registrarControlador.php"><i class="fa fa-arrow-circle-right"></i> registrase!</a>
                    <hr/>
                </div> 
            </div>
            <footer class="col-lg-12 text-center">
                Colombia - <?php echo date("Y"); ?>
            </footer>
        </div>
    </body>
</html>