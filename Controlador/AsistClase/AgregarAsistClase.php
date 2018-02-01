<?php
require '../conexion.php';

if (!empty($_POST)) {
	if (isset($_POST["IdAC"]) && isset($_POST["Fecha"]) && isset($_POST["Hora"]) && isset($_POST["Estado"]) && isset($_POST["IdMateria"])) 
	{
		if ($_POST['IdAC'] != "" && $_POST['Fecha'] != "" && $_POST['Hora'] != "" && $_POST['Estado'] != "" && $_POST['IdMateria'] != "")
		{
			$cons = $con -> query("CALL PaAsistClaseTb18_GuardarAsistClase(\"$_POST[IdAC]\",\"$_POST[Fecha]\",\"$_POST[Hora]\",\"$_POST[Estado]\",\"$_POST[IdMateria]\")");
			if (!$cons)
			{
				print "Fallo";
			}
		}
	}
}
?>