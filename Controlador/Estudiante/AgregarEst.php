<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/EstCl02.php';


if (!empty($_POST)) {
	if (isset($_POST["cedula"]) && isset($_POST["fecha_nac"]) && isset($_POST["nombre"]) && isset($_POST["Apellido1"]) && isset($_POST["Apellido2"]) && isset($_POST["direccion"]) && isset($_POST["genero"]) && isset($_POST["telefono"]) && isset($_POST["email"])) 
	{
		if ($_POST['cedula'] != "" && $_POST['fecha_nac'] != "" && $_POST['nombre'] != "" && $_POST['Apellido1'] != "" && $_POST['Apellido2'] != "" && $_POST['direccion'] != "" && $_POST['genero'] != "" && $_POST['telefono'] != "" && $_POST['email'] != "") 
		{
			$ced = $_POST['cedula'];
			$fech = $_POST['fecha_nac'];
			$nom = $_POST['nombre'];
			$ape1 = $_POST['Apellido1'];
			$ape2 = $_POST['Apellido2'];
			$dir = $_POST['direccion'];
			$gen = $_POST['genero'];
			$tel = $_POST['telefono'];
			$ema = $_POST['email'];
			$ade = $_POST['Adecuacion'];
			$esp = $_POST['Id_Especialidad'];

			$estudiante = new EstCl02();
			$result = $estudiante->addEstu($ced,$fech,$nom,$ape1,$ape2,$dir,$gen,$tel,$ema,$ade,$esp); 
			print $result;
		}
	}
}
?>