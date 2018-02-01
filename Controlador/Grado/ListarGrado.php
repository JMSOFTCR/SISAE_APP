<?php
function listar($inicio,$por_pagina){
	include "C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php";
	$result = $con -> query("CALL PaGradoTb13_Listar($inicio,$por_pagina)");
	return $result;
}
function cantidad()
{
	include "C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php";
	$consulta = $con -> query("select count(*) as cantidad from GradoTb13");
	$cant = $consulta -> fetch_array();
	return $cant["cantidad"];
}
?>