<?php
include "../conexion.php";

if(!empty($_POST)){
	if(isset($_POST["idgrado"]) && isset($_POST['nombre']) && isset($_POST['idbachi'])) 
	{
		if($_POST['idgrado']!=""  && $_POST['nombre']!="" && $_POST['idbachi']!="") 
		{			
			$sql = "CALL PaGradoTb13_ActualizarGrado(\"$_POST[idgrado]\",\"$_POST[nombre]\",\"$_POST[idbachi]\")";
			$query = $con->query($sql);
			if(!$query){print 'No se pudo actualizar!!';}
		}
	}
}
?>