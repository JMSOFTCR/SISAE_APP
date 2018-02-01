<?php 
include "C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php";
$query = $con->query("CALL PaAsigmateriaTb19_Asignar(\"$_GET[idm]\",\"$_GET[idp]\")");
if(!$query){print 'Fallo!!';}
else{print 'Se asigno con excito!!';}

 ?>