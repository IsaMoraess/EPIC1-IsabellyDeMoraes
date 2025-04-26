<?php
session_start();
session_destroy();
header("Location: /projeto-veiculos/index.php");
exit();
?>

