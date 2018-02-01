<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php';

class SeccionCl19
{
	private $PStCl19_IdSeccion;
    private $PInCl17_Cupo;
	
	public function __construct()
	{
		$con = new conexion();
	}
	
	public function setPStCl19_IdSeccion($IdS)
	{
		$this->PStCl19_IdSeccion = $IdS;
	}
	public function getPStCl19_IdSeccion()
	{
		return $this->PStCl19_IdSeccion;
	}
	
	public function setPInCl17_Cupo($Cupo)
	{
		$this->PInCl17_Cupo = $Cupo;
	}
	public function getPInCl17_Cupo()
	{
		return $this->PInCl17_Cupo;
	}

	public function ListaSec($inicio,$por_pagina)
	{
		$con = new conexion();
		$sql = "CALL PaSeccionTb20_Listar($inicio,$por_pagina);";
		$result = $con->query($sql);
		return $result;
	}
	public function Cantidad()
	{
		$con = new conexion();
 	$consulta = $con -> query("select count(*) as cantidad from SeccionTb20");
	$cant = $consulta -> fetch_array();
	return $cant["cantidad"];
 	}

 	public function BorraSec($PStCl19_IdSeccion)
	{
		$con = new conexion();
		$sql = "CALL PaSeccionTb20_Borrar_Seccion('".$PStCl19_IdSeccion."');";
		$r = $con->query($sql);
		if($r)
		{
		 return $r;
		}
	}

	public function BuscaSec($PStCl19_IdSeccion)
	{
		$con = new conexion();
		$sql = "CALL PaSeccionTb20_BuscarSec('".$PStCl19_IdSeccion."');";
		$result = $con->query($sql);
		$r = 	$result->	fetch_all(MYSQLI_ASSOC);
		if ($r) 
		{
		 return $r;
		}
	}

	public function EditSec($PStCl19_IdSeccion,$PInCl17_Cupo,$PInCl19_Num_grupo)
	{
		$con = new conexion();
		$sql = "CALL PaSeccionTb20_ActualizarSeccion('".$PStCl19_IdSeccion."','".$PInCl17_Cupo."','".$PInCl19_Num_grupo."');";
		$edit = $con->query($sql);
		if($edit)
		{
		return $edit;
	    }
	}
}
?>