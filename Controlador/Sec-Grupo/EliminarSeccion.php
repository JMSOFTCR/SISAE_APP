<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/SeccionCl19.php';
if(!empty($_GET)){
			$eli = $_GET['Id_sec'];
			$sec = new SeccionCl19();
			$query = $sec->BorraSec($eli);
			 if ($query) 
			{
				print $query;
			}
}

?>