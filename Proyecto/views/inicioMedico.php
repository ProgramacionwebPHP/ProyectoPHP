<?php
    $usuario = $_REQUEST['user'];
    require_once("homeMedico.php");
    $nuevo = new ControllerPacientes ();
    $medico = $nuevo-> getMedico($usuario);
?>
<header class="text-center">
    <h1>Bienvenido <?php echo $medico['Nombre']; ?></h1>
    <hr/>
</header>