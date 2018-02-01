<?php
$host = "localhost";
$usuario = "root";
$clave = "root";
$db = "sisae";
$con = new mysqli($host, $usuario, $clave, $db);
if ($con->connect_errno)
{
	echo "No hay conexion con la BD: (" . $con->connect_errno . ") " . $con->connect_error;
} 
?>