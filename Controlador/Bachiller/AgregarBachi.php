<?php
require '../conexion.php';

if (!empty($_POST)) {
	if (isset($_POST["IdB"]) && isset($_POST["NomB"])) 
	{
		if ($_POST['IdB'] != ""  && $_POST['NomB'] != "") 
		{
			$cons = $con -> query("CALL PaBachillerTb14_GuardarBachiller(\"$_POST[IdB]\",\"$_POST[NomB]\")");
			if (!$cons) 
			{
				print "Fallo";
			}
		}
	}
}
?>