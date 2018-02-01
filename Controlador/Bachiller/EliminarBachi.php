<?php
if (!empty($_GET)) {
	include "../conexion.php";

	$sql = "CALL PaBachillerTb14_EliminarBachiller(\"$_GET[id]\")";
	$query = $con -> query($sql);
	if (!$con) {print "Fallo";
	}
}
?>