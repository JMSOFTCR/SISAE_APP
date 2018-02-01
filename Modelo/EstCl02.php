<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php';
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/UsuCl01.php';

class EstCl02 extends UsuCl01
{
	private $PStCl03_IdEst;
	private $PDtCl03_FechaNac;
	private $PStCl03_Adecuacion;
	private $PStCl03_Estado;
	private $PStCl03_IdGrado;
	private $PStCl03_IdEspecialidad;
	
		public function __construct()
	{
		$con = new conexion();
	}
	
	public function setPStCl03_IdEst($IdEst)
	{
		$this->PStCl03_IdEst = $IdEst;
	}
	public function getPStCl03_IdEst()
	{
		return $this->PStCl03_IdEst;
	}
	
	public function setPDtCl03_FechaNac($FeN)
	{
		$this->PDtCl03_FechaNac = $FeN;
	}
	public function getPDtCl03_FechaNac()
	{
		return $this->PDtCl03_FechaNac;
	}
	
	public function setPStCl03_Adecuacion($Ad)
	{
		$this->PStCl03_Adecuacion = $Ad;
	}
	public function getPStCl03_Adecuacion()
	{
		return $this->PStCl03_Adecuacion;
	}
	
	public function setPStCl03_Estado($Est)
	{
		$this->PStCl03_Estado = $Est;
	}
	public function getPStCl03_Estado()
	{
		return $this->PStCl03_Estado;
	}
	
	public function setPStCl03_IdGrado($IdG)
	{
		$this->PStCl03_IdGrado = $IdG;
	}
	public function getPStCl03_IdGrado()
	{
		return $this->PStCl03_IdGrado;
	}
	
	public function setPStCl03_IdEspecialidad($IdEs)
	{
		$this->PStCl03_IdEspecialidad = $IdEs;
	}
	public function getPStCl03_IdEspecialidad()
	{
		return $this->PStCl03_IdEspecialidad;
	}

	public function ListaEst($inicio,$por_pagina)
	{
		$con = new conexion();
		$sql = "CALL PaEstTb03_Listar($inicio,$por_pagina);";
		$result = $con->query($sql);
		return $result;
	}

	public function Cantidad()
	{
		$con = new conexion();
 	$consulta = $con -> query("select count(*) as cantidad from EstTb03");
	$cant = $consulta -> fetch_array();
	return $cant["cantidad"];
 	}

 	public function AddEstu($PStCl03_IdEst,$PDtCl03_FechaNac,$PStCl03_Nombre,$PStCl03_Apellido1,$PStCl03_Apellido2,$PStCl03_Direccion,$PStCl03_Genero,$PStCl03_Telefono,$PStCl03_Email,$PStCl03_Adecuacion,$PStCl03_IdEspecialidad)
	{
		$con = new conexion();
		$sql = "CALL PaEstTb03_GuardarEst('".$PStCl03_IdEst."','".$PDtCl03_FechaNac."','".$PStCl03_Nombre."','".$PStCl03_Apellido1."',
		'".$PStCl03_Apellido2."','".$PStCl03_Direccion."','".$PStCl03_Genero."','".$PStCl03_Telefono."',
		'".$PStCl03_Email."','".$PStCl03_Adecuacion."','".$PStCl03_IdEspecialidad."');";
		$add = $con->query($sql);
		if($add){
		return $add;
	    }
	}
}
?>