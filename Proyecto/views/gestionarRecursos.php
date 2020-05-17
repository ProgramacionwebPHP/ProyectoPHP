<?php
    $usuario = $_REQUEST['user'];
    require_once("homeAdmin.php");
    include "../controllers/RecursosControlador.php";
    $nuevo = new ControllerRecursos ();
    $datos = $nuevo-> getRecursos();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ProyectoPHP</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <header class="text-center">
                <h1>Recursos en el sistema</h1>
                <hr/>
            </header>
            <div class="row">
                <div class="col-md-12 ">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?user=".$usuario);?>"> 
                        <h3>Listado de recursos </h3>
                        <table class="table">
                        <tr>
                        <th>Nombre</th>
                        <th>Numero de unidades existentes</th>
                        <th>Numero de unidades disponibles</th>
                        <th>Acciones</th>
                        </tr>
                        <?php
                        $str_datos = "";
                        while($fila = mysqli_fetch_array($datos)) {
                            $str_datos .= "<tr>";
                            $str_datos .= "<td>". $fila ['Nombre'] . "</td><td>". $fila ['NumeroUnidades'] . "</td><td>". $fila ['NumeroUnidadesDisponibles'] . "</td><td> <a href=\"agregarUnidadesRecursos.php?user=". $usuario."&recurso=".$fila ['ID']."\"><i class=\"fa fa-plus-square-o\"></i> Agregar unidades</a></td>" ;
                            $str_datos .= "</tr>";
                        }
                        $str_datos .= "</table>";
                        echo $str_datos;
                        ?>              
                    </form>
                    <a href="crearRecurso.php?user=<?php echo $usuario; ?>"> <i class="fa fa-plus-square-o"></i> Agregar Recursos</a>
                </div>
            </div>
        </div>
    </body>
</html>