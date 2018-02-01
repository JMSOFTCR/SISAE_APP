<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/EncCl04.php';

  if (!empty($_POST)) 
  {
 if (isset($_POST["Cedula"]) && isset($_POST["Nombre"]) && isset($_POST["Apellido1"]) && isset($_POST["Apellido2"]) && isset($_POST["Direccion"]) && isset($_POST["Genero"]) && isset($_POST["Telefono"]) && isset($_POST["Email"]) && isset($_POST["Clave"])) 
 	{
 if ($_POST['Cedula'] != "" && $_POST['Nombre'] != "" && $_POST['Apellido1'] != "" && $_POST['Apellido2'] != "" && $_POST['Direccion'] != "" && $_POST['Genero'] != "" && $_POST['Telefono'] != "" && $_POST['Email'] != "" && $_POST['Clave'] != "")
 		{

			$ced = $_POST['Cedula'];
 			$nom = $_POST['Nombre'];
 			$ap1 = $_POST['Apellido1'];
 			$ap2 = $_POST['Apellido2'];
 			$dir = $_POST['Direccion'];
 			$sex = $_POST['Genero'];
 			$tel = $_POST['Telefono'];
 			$ema = $_POST['Email'];
 			$cla = $_POST['Clave'];

			$enc =new EncCl04();
			$reg = $enc->AddEnc($ced,$nom,$ap1,$ap2,$dir,$sex,$tel,$ema,$cla);
			if ($reg) 
			{
				print $reg;
			}
 		}
 	}
}
?>