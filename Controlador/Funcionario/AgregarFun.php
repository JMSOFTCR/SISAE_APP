<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/FunCl05.php';
if (!empty($_POST)) {
	if (isset($_POST["cedula"]) && isset($_POST["nombre"])) {
		if ($_POST["cedula"] != "" && $_POST["nombre"] != "" && $_POST['Apellido1'] != "" && $_POST['Apellido2'] != "" && $_POST['clave'] != "") 
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

			$fun = new FunCl05();
			$reg = $fun->AddFun($ced,$nom,$ap1,$ap2,$dir,$sex,$tel,$ema,$cla,$fenac);
			print $reg;
		}
	}
}
?>
