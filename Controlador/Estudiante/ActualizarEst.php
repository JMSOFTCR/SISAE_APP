<?php
include "C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php";

if(!empty($_POST)){
	if(isset($_POST["nombre"]) && isset($_POST["Apellido1"]) && isset($_POST["Apellido2"]) && isset($_POST["direccion"]) && isset($_POST["telefono"]) && isset($_POST['email'])) 
	{
		if($_POST['nombre']!="" && $_POST['Apellido1']!="" && $_POST['Apellido2']!="" && $_POST['direccion']!="" && $_POST['telefono']!="" && $_POST['email']!="") 
		{			
			$sql = "CALL PaEstTb03_ActualizarEst(\"$_POST[cedula]\",\"$_POST[fecha_nac]\",\"$_POST[nombre]\",\"$_POST[Apellido1]\",\"$_POST[Apellido2]\",\"$_POST[direccion]\",\"$_POST[telefono]\",\"$_POST[email]\")";
			$query = $con->query($sql);
			print $query;
		}
	}
}
?>