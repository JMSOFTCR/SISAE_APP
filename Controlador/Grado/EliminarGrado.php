<?php
if (!empty($_GET)) {
	include "../conexion.php";

	$sql = "CALL PaGradoTb13_BorrarGrado(\"$_GET[id]\")";
	$query = $con -> query($sql);
	if (!$con) {print "Fallo";
	}
}
?>