<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/ProfCl03.php';

if (!empty($_POST)) {
	if (isset($_POST["cedula"]) && isset($_POST["fecha_nac"]) && isset($_POST["clave"]) && isset($_POST["nombre"]) && isset($_POST["Apellido1"]) && isset($_POST["Apellido2"]) && isset($_POST["direccion"]) && isset($_POST["genero"]) && isset($_POST["telefono"]) && isset($_POST["email"])) 
	{
		if ($_POST['cedula'] != "" && $_POST['fecha_nac'] != "" && $_POST['clave'] != "" && $_POST['nombre'] != "" && $_POST['Apellido1'] != "" && $_POST['Apellido2'] != "" && $_POST['direccion'] != "" && $_POST['genero'] != "" && $_POST['telefono'] != "" && $_POST['email'] != "") 
		{
			$ced = $_POST['cedula'];
 			$nom = $_POST['nombre'];
 			$ap1 = $_POST['Apellido1'];
 			$ap2 = $_POST['Apellido2'];
 			$dir = $_POST['direccion'];
 			$sex = $_POST['genero'];
 			$tel = $_POST['telefono'];
 			$ema = $_POST['email'];
 			$cla = $_POST['clave'];
 			$fenac = $_POST['fecha_nac'];

			$prof = new ProfCl03();
			$reg = $prof->AddProf($ced,$nom,$ap1,$ap2,$dir,$sex,$tel,$ema,$cla,$fenac);
			print $reg;
		}
	}
}
?>