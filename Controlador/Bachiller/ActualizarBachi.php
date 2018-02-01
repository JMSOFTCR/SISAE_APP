<?php
include "../conexion.php";

if(!empty($_POST)){
	if(isset($_POST["IdB"])  && isset($_POST['NomB'])) 
	{
		if($_POST['IdB']!=""  && $_POST['NomB']!="") 
		{			
			$sql = "CALL PaBachillerTb14_ActualizarBachiller(\"$_POST[IdB]\",\"$_POST[NomB]\")";
			$query = $con->query($sql);
			if(!$query){print 'No se pudo actualizar!!';}
		}
	}
}
?>