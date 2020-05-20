<?php
    $usuario = $_REQUEST['user'];
    require_once("homeAdmin.php");
    $nuevos = new ControllerPacientes ();
    $medico = $nuevos-> getMedico($usuario);
?>
<header class="text-center">
    <h1>Bienvenido <?php echo $medico['Nombre']; ?></h1>
    <hr/>
</header>