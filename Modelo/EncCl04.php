<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php';
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/UsuCl01.php'; 

class EncCl04 extends UsuCl01
{
	private $PStEncCl04_IdEncargado;
	private $PStEncCl04_Clave;

	public function __construct()
	{
		$con = new conexion();
	}	

	public function setPStCPStEncCl04_IdEncargado($id)
	{
		$this->PStEncCl04_IdEncargado = ucfirst(strtolower($id));//Pone en minuscula
	}

	public function getPStEncCl04_IdEncargado()
	{
		return $this->PStEncCl04_IdEncargado;
	}

	public function setPStEncCl04_Clave($PStEncCl04_Clave)
	{
			$this->PStEncCl04_Clave = ucfirst(strtolower($PStEncCl04_Clave));
	}

	public function getPStEncCl04_Clave()
	{
		return $this->PStEncCl04_Clave;
	}
	
	public function AddEnc($PStEncCl04_IdEncargado,$PStCl01_Nombre,$PStCl01_Apellido1,
		$PStCl01_Apellido2,$PStCl01_Direccion,$PCrCl01_Sexo,$PStCl01_Telefono,
		$PStCl01_Email,$PStEncCl04_Clave)
	{
		$con = new conexion();
		$sql = "CALL PaEncTb05_GuardarEnc('".$PStEncCl04_IdEncargado."','".$PStCl01_Nombre."','".$PStCl01_Apellido1."',
		'".$PStCl01_Apellido2."','".$PStCl01_Direccion."','".$PCrCl01_Sexo."','".$PStCl01_Telefono."',
		'".$PStCl01_Email."','".$PStEncCl04_Clave."');";
		$add = $con->query($sql);
		$r= $add->execute();
		return $r;
	}
	
	public function EditEnc($PStEncCl04_IdEncargado,$PStCl01_Nombre,$PStCl01_Apellido1,
		$PStCl01_Apellido2,$PStCl01_Direccion,$PStCl01_Telefono,
		$PStCl01_Email)
	{
		$con = new conexion();
		$sql = "CALL PaEncTb05_ActualizarEnc('".$PStEncCl04_IdEncargado."','".$PStCl01_Nombre."','".$PStCl01_Apellido1."',
		'".$PStCl01_Apellido2."','".$PStCl01_Direccion."','".$PStCl01_Telefono."',
		'".$PStCl01_Email."');";
		$edit = $con->query($sql);
		if($edit){
		return $edit;
		}
	}
	
	public function BorraEnc($PStEncCl04_IdEncargado)
	{
		$con = new conexion();
		$sql = "CALL PaEncTb05_EliminarEnc('".$PStEncCl04_IdEncargado."');";
		$r = $con->query($sql);
		if($r)
		{
		 return $r;
		}
	}
	
	public function BuscaEnc($PStEncCl04_IdEncargado)
	{
		$con = new conexion();
		$sql = "CALL PaEncTb05_BuscarEncD('".$PStEncCl04_IdEncargado."');";
		$result = $con->query($sql);
		$r = 	$result->	fetch_all(MYSQLI_ASSOC);
		if ($r) 
		{
		 return $r;
		}
	}
	
	public function ListaEnc($inicio,$por_pagina)
	{
		$con = new conexion();
		$sql = "CALL PaEncTb05_Listar($inicio,$por_pagina);";
		$result = $con->query($sql);
		return $result;
	}
	
	public function Cantidad()
	{
	$con = new conexion();
 	$consulta = $con -> query("select count(*) as cantidad from EncTb05");
	$cant = $consulta -> fetch_array();
	return $cant["cantidad"];
 	}

	/*public function convertToEncCl04($result)
	{
		$EncCl04 = new EncCl04();
		while ($row = mysqli_fetch_array($result)) 
		{
			$EncCl04->setPStCPStEncCl04_IdEncargado('PStEncCl04_IdEncargado',$row['Cedula']);
			$EncCl04->setPStCl01_Nombre('PStCl01_Nombre',$row['Nombre']);
			$EncCl04->setPStCl01_Apellido1('PStCl01_Apellido1',$row['Apellido1']);
			$EncCl04->setPStCl01_Apellido2('PStCl01_Apellido2',$row['Apellido2']);
			$EncCl04->setPStCl01_Direccion('PStCl01_Direccion',$row['Direccion']);
			$EncCl04->setPStCl01_Telefono('PCrCl01_Sexo',$row['Genero']);
			$EncCl04->setPStCl01_Telefono('PStCl01_Telefono',$row['Telefono']);
			$EncCl04->setPStCl01_Email('PStCl01_Email',$row['Email']);
			$EncCl04->setPStEncCl04_Clave('PStEncCl04_Clave',$row['Clave']);
		}
		return $EncCl04;
	}*/
} 
?>