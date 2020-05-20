<!DOCTYPE html>
<?php
    $mensaje = "";
    if ((isset($_REQUEST['nombre'])) && ($_REQUEST['nombre'] != '') && (isset($_REQUEST['emails'])) && ($_REQUEST['emails'] != '') && (isset($_REQUEST['c-emails'])) && ($_REQUEST['c-emails'] != '') && (isset($_REQUEST['contraseña'])) && ($_REQUEST['contraseña'] != '')) {
        if($_REQUEST['emails'] == $_REQUEST['c-emails'] ){
            include "../controllers/indexControlador.php";
            $nuevo = new ControllerIndex ();
            $validacion = $nuevo->ValidarUsuario($_REQUEST['nombre']);
            if($validacion == 1 ){
                $mensaje = "*Ya existe un usuario con este nombre";
            }else{
                $mensaje = $nuevo->CrearUsuario($_REQUEST['nombre'],$_REQUEST['emails'],$_REQUEST['contraseña']);
            }
        }else{
            $mensaje = "*Los correos deben de ser iguales";
        }
    }else{
        $mensaje = "*Debe llenar todos los campos";
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
                <div class="col-md-4 ">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                        <h3>Formulario</h3>                
                        Nombre: <input type="text" name="nombre" class="form-control"/>    
                        email: <input type="email" name="emails" class="form-control"/>    
                        Confirmar email: <input type="email" name="c-emails" class="form-control"/>    
                        Contraseña: <input type="password" name="contraseña" class="form-control"/>    
                        <br/>
                        <span class="help-block"><?php echo $mensaje?></span>  
                        <br>
                        <input type="submit" value="Crear" class="btn btn-success"/>
                    </form>
                </div>
            </div>
           <br>
            <br>  
            <a href="../index.php"> <i class="fa fa-arrow-circle-left"></i> Volver a la página principal</a>
            <footer class="col-lg-12 text-center">
                Colombia - <?php echo date("Y"); ?>
            </footer>
        </div>
    </body>
</html>