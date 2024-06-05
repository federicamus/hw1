<?php
//Avviare sessione
session_start();
session_destroy();
header("Location: index.php");
?>