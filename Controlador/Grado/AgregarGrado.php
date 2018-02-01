<?php
require '../conexion.php';

if (!empty($_POST)) {
	if (isset($_POST["idgrado"]) && isset($_POST["nombre"]) && isset($_POST["idbachi"])) 
	{
		if ($_POST['idgrado'] != "" && $_POST['nombre'] != "" && $_POST['idbachi'] != "") 
		{
			$cons = $con -> query("CALL PaProfTb04_GuardarProf(\"$_POST[idgrado]\",\"$_POST[nombre]\",\"$_POST[idbachi]\")");
			if (!$cons) 
			{
				print "Fallo";
			}
		}
	}
}
?>