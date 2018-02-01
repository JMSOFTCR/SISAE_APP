<?php
include "C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php";
if(!empty($_POST)){
	if(isset($_POST["Grado"]) &&isset($_POST["cupo"]) &&isset($_POST["num_grupo"])) {
		if($_POST["Grado"]!=""&&$_POST["cupo"]!="" && $_POST['num_grupo']!='') {
			
			$sql = "CALL PaSeccionTb20_Guardar_Seccion(\"$_POST[cupo]\",\"$_POST[num_grupo]\",\"$_POST[Grado]\")";
			$query = $con->query($sql);
			print $query;
		}
	}
}



?>