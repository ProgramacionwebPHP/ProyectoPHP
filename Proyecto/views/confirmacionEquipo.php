<?php
    $usuario = $_REQUEST['user'];
    $idpaciente = $_REQUEST['paciente'];
    $idequipo = $_REQUEST['equipo'];
    require_once("homeMedico.php");
    include "../controllers/PacienteControlador.php";
    $nuevo = new ControllerPacientes ();
    $datos = $nuevo-> getEquipos($idpaciente);
    $paciente = $nuevo-> getPaciente($idpaciente);
?>
<?php
    $Opcion = "";
    $OpcionErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["Opcion"])) {
          $OpcionErr = "Seleccione alguna opcion";
        } else {
          $Opcion = $_POST["Opcion"];
          if($Opcion == "No" ){
            Header("Location: inicioMedico.php?user=".$usuario);
          }else{
            include_once("../controllers/EquiposControlador.php") ;
            $nuevo = new ControllerEquipos();
            $nuevo->updateEquipo($idequipo,NULL);
            Header("Location: verPacientes.php?user=".$usuario);
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
                <h1>Quitar equipos</h1>
                <hr/>
            </header>
            <div class="row">
                <div class="col-md-8 ">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?user=".$usuario."&paciente=".$idpaciente."&equipo=".$idequipo);?>"> 
                        <h3>Desea quitarle al paciente <?php echo $paciente ['Nombre']?> este equipo?</h3>                
                        <input type="radio" name="Opcion" value="Si">Si 
                        <br/>
                        <input type="radio" name="Opcion" value="No">No  
                        <br/>
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