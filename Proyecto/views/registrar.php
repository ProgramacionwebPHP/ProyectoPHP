<!DOCTYPE html>
<?php
if ((isset($_POST['nombre'])) && ($_POST['nombre'] != '') && (isset($_POST['emails'])) && ($_POST['emails'] != '') && (isset($_POST['c-emails'])) && ($_POST['c-emails'] != '') && (isset($_POST['contraseña'])) && ($_POST['contraseña'] != '')) {

    include "models/modelo.php";
    $nuevo = new Service();
    $asd = $nuevo->setServicio($_POST['nombre'], $_POST['emails']);
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
                <h1>Bienvenidos</h1>
                <hr/>
                <p class="lead">REGISTRATE</p>
            </header>
            <div class="row">
                <div class="col-md-8 ">
                    <form action="#" method="post" class="col-lg-5">
                        <h3>Formulario</h3>                
                        Nombre: <input type="text" name="nombre" class="form-control"/>    
                        email: <input type="text" name="emails" class="form-control"/>    
                        Confirmar email: <input type="password" name="c-emails" class="form-control"/>    
                        Contraseña: <input type="password" name="contraseña" class="form-control"/>    
                        <br/>
                        <input type="submit" value="Crear" class="btn btn-success"/>
                    </form>
                </div>
                <div class="col-lg-6 ">
                    <hr/>
                    <a href="../index.php"> <i class="fa fa-arrow-circle-left"></i> Volver a la página principal</a>
                    <hr/>
                </div> 
            </div>
            <footer class="col-lg-12 text-center">
                Colombia - <?php echo date("Y"); ?>
            </footer>
        </div>
    </body>
</html>