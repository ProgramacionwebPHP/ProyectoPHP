<?php
    $usuario = $_REQUEST['user'];
    $idmensaje = $_REQUEST['solicitud'];
    require_once("homeAdmin.php");
    include "../controllers/MensajesControlador.php";
    $nuevo = new ControllerMensajes ();
    $mensaje = $nuevo-> getMensajesId($idmensaje);
    $solicitud = $nuevo-> getSolicitud($idmensaje);

    $texto = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num = 0;
        $paciente = $nuevo->getPaciente($mensaje['IDPaciente']);
        $medico = $nuevo->getMedico($mensaje['IDMedico']);
        while(isset($_POST["solicitud$num"])) {
            $rec = mysqli_fetch_array($solicitud);
            $rec =  $nuevo->getEquipo($rec['IDEquipo']);
            if ($_POST["solicitud$num"] == "no"){
                $texto.= "No se le asigno el equipo ". $rec['Nombre'] . " a ". $paciente['Nombre'] ."\n";
            }else{
                $nuevo->updateEquipo($rec['ID'],$paciente['ID']);
                $texto.= "Se le asigno el equipo ". $rec['Nombre'] . " a ". $paciente['Nombre'] ."\n";
            } 
            $num = $num+1;
        }
        $nuevo -> deleteSolicitud($idmensaje);
        $de =  "Juan";//$_POST["de"]; // remitente
        $asunto ="Asiganacion de equipos para ".$paciente['Nombre'];//$_POST["asunto"];
        $texto = wordwrap($texto, 70);
        mail($medico['Email'],$asunto,$texto,"From: $de\n");
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
                <h1>Solicitud #<?php echo $mensaje ['ID']?></h1>
                <hr/>
            </header>
            <div class="row">
                <div class="col-md-12 ">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?user=".$usuario."&solicitud=".$idmensaje);?>"> 
                        <h3>Equipos solicitados</h3>
                        <table class="table">
                        <tr>
                        <th>Equipo</th>
                        </tr>
                        <?php
                        $str_datos = "";
                        $n = 0;
                        while($fila = mysqli_fetch_array($solicitud)) {
                            $equipo = $nuevo-> getEquipo($fila ['IDEquipo']);
                            $str_datos .= "<tr>";
                            $str_datos .= "<td>". $equipo ['Nombre'] . "</td><td>";
                            $aux = $fila ['IDEquipo'];
                            if($equipo['IDPaciente'] == NULL){
                                $str_datos .= "<input type=\"radio\" name=\"solicitud$n\" value=\"$aux\"> Si ";
                            }
                            $str_datos .= "<input type=\"radio\" name=\"solicitud$n\" value=\"no\" checked> No ". "</td>";
                            $str_datos .= "</tr>";
                            $n = $n + 1;
                        }
                        $str_datos .= "</table>";
                        echo $str_datos;
                        ?>      
                        <br/> 
                        <input type="submit" value="Enviar" class="btn btn-success"/>        
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>