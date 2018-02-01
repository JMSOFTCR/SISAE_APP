<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/ProfCl03.php';
if(!empty($_POST)){
	if(isset($_POST["nombre"]) && isset($_POST["Apellido1"]) && isset($_POST["Apellido2"]) && isset($_POST["direccion"]) && isset($_POST["telefono"]) && isset($_POST['email']) && isset($_POST['clave'])) 
	{
		if($_POST['nombre']!="" && $_POST['Apellido1']!="" && $_POST['Apellido2']!="" && $_POST['direccion']!="" && $_POST['telefono']!="" && $_POST['email']!="" && $_POST['clave']!="") 
		{			
			$ced = $_POST['cedula'];
 			$nom = $_POST['nombre'];
 			$ap1 = $_POST['Apellido1'];
 			$ap2 = $_POST['Apellido2'];
 			$dir = $_POST['direccion'];
 			$tel = $_POST['telefono'];
 			$ema = $_POST['email'];
 			$fec = $_POST['fecha_nac'];
 			$cla = $_POST['clave'];

			$prof =new ProfCl03();
			$reg = $prof->EditProf($ced,$fec,$cla,$nom,$ap1,$ap2,$dir,$tel,$ema);
			if ($reg) 
			{
				print $reg;
			}
		}
	}
}
?>