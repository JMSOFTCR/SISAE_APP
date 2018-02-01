<?php 
require 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php';
$result = $con->query("CALL PaAsistClaseTb18_Listar()");
?>