<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/ProfCl03.php';
if(isset($_GET)){
	 $eli = $_GET['ced'];
	 $prof =new ProfCl03();
	 $reg = $prof->BorraProf($eli);	 
	 if ($reg) 
			{
				print $reg;
			}
}
?>