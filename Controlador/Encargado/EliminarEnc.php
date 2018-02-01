<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/EncCl04.php';
if(isset($_GET)){
	 $eli = $_GET['ced'];
	 $enc =new EncCl04();
	 $reg = $enc->BorraEnc($eli);	 
	 if ($reg) 
			{
				print $reg;
			}
}
?>