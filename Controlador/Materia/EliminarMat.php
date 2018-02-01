<?php
if (!empty($_GET)) {
	include "C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php";

	$sql = "CALL PaMateriaTb17_EliminarMateria(\"$_GET[idm]\")";
	$query = $con -> query($sql);
	print $query;
}
?>