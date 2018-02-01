<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/FunCl05.php';
if(isset($_GET)){
	 $eli = $_GET['ced'];
	 $fun = new FunCl05();
	 $reg = $fun->BorraFun($eli);	 
	 if ($reg) 
			{
				print $reg;
			}
}
?>