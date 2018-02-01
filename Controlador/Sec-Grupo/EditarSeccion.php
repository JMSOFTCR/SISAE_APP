<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/SeccionCl19.php';
if(!empty($_POST)){
	if(isset($_POST["id_grupo"]) &&isset($_POST["cupo"]) &&isset($_POST["num_grupo"])) {
		if($_POST["id_grupo"]!=""&& $_POST["cupo"]!="" && $_POST['num_grupo']!='') {
			$idg = $_POST["id_grupo"];
			$cup = $_POST["cupo"];
			$num = $_POST["num_grupo"];
			$sec = new SeccionCl19();
			$r = $sec->EditSec($idg,$cup,$num);
			print $r;
		}
	}
}



?>