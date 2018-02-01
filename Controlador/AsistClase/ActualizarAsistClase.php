<?php
include "../conexion.php";

if(!empty($_POST)){
	if(isset($_POST["IdAC"]) && isset($_POST["Fecha"]) && isset($_POST["Hora"]) && isset($_POST["Estado"]) && isset($_POST["IdMateria"])) 
	{
		if($_POST['IdAC']!="" && $_POST['Fecha']!="" && $_POST['Hora']!="" && $_POST['Estado']!="" && $_POST['IdMateria']!="") 
		{			
			$sql = "CALL PaAsistClaseTb18_ActualizarAsistClase(\"$_POST[IdAC]\",\"$_POST[Fecha]\",\"$_POST[Hora]\",\"$_POST[Estado]\",\"$_POST[IdMateria]\")";
			$query = $con->query($sql);
			if(!$query)
			{
				print 'No se pudo actualizar!!';
			}
		}
	}
}
?>