<?php
    $usuario = $_REQUEST['user'];
    $idEquipo = $_REQUEST['equipo'];
    $idpaciente =  $_REQUEST['paciente'];
    require_once("homeAdmin.php");
    include "../controllers/EquiposControlador.php";
    $nuevo = new ControllerEquipos ();
    $equipo = $nuevo->getEquipoById($idEquipo);
    $paciente = $nuevo-> getPaciente($idpaciente);
    $datos = $nuevo-> getCandidatos($idpaciente,$paciente);
    $OpcionErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["name"])) {
            $idNuevo = $_POST["name"];
            $OpcionErr = $nuevo-> updateEquipo($idEquipo,$idNuevo);
            if($OpcionErr == "Equipo actualizado"){
                Header("Location: gestionarEquipos.php?user=".$usuario);
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
                <h1>Cambiar asignacion del equipo: <?php echo $equipo ['Nombre']?></h1>
                <hr/>
            </header>
            <div class="row">
                <div class="col-md-4 ">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?user=".$usuario ."&equipo=".$idEquipo."&paciente=".$idpaciente);?>"> 
                        <h3>Seleccione un usuario: </h3>  
                        <select name="name"  class="form-control">
                        <option value="<?php echo $paciente['ID']?>"><?php echo $paciente['Nombre']?></option>
                        <?php
                        $str_datos = "";
                        while($fila = mysqli_fetch_array($datos)) {
                            $aux = $fila['Nombre'];
                            $id = $fila['ID'];
                            $str_datos .= " <option value= $id >$aux</option>";
                        }
                        echo $str_datos;
                        ?>  
                        </select><br>
                        <span class="error">* <?php echo $OpcionErr;?></span>
                        <br/>
                        <br/> 
                        <input type="submit" value="Enviar" class="btn btn-success"/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>