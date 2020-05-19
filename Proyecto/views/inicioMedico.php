<?php
    $usuario = $_REQUEST['user'];
    require_once("homeMedico.php");
?>
<header class="text-center">
    <h1>Bienvenido <?php echo $usuario; ?></h1>
    <hr/>
</header>