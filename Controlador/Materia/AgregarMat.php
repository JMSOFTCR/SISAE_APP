<?php
require 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php';

if (!empty($_POST)) {
	if (isset($_POST["id"]) && isset($_POST["nombre"])) 
	{
		if ($_POST['id'] != "" && $_POST['nombre'] != "") 
		{
			$cons = $con -> query("CALL PaMateriaTb17_GuardarMateria(\"$_POST[id]\",\"$_POST[nombre]\")");
			print $cons;
		}
	}
}
?>