<?php
// logout.php
// Cierra la sesión del panel y regresa al login.

session_start();
session_destroy();
header("Location: login.php");
exit;
?>