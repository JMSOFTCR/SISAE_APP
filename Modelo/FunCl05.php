<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php';
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/UsuCl01.php';

class FunCl05
{
	private $PStCl05_IdFuncionario;
	private $PStCl05__Clave;
	private $PDtCl05__FechaNac;
    private $PStCl05__Estado;
	
	public function __construct()
	{
		$con = new conexion();
	}
	
	
	public function setPStCl05_IdFuncionario($IdFunc)
	{
		$this->PStCl05_IdFuncionario = $IdFunc;
	}
	public function getPStCl05_IdFuncionario()
	{
		return $this->PStCl05_IdFuncionario;
	}
	
	public function setPStCl05__Clave($Cla)
	{
		$this->PStCl05__Clave = $Cla;
	}
	public function getPStCl05__Clave()
	{
		return $this->PStCl05__Clave;
	}
	
	public function setPDtCl05__FechaNac($FecN)
	{
		$this->PDtCl05__FechaNac = $FecN;
	}
	public function getPDtCl05__FechaNac()
	{
		return $this->PDtCl05__FechaNac;
	}
	
	public function setPStCl05__Estado($Est)
	{
		$this->PStCl05__Estado = $Est;
	}
	public function getPStCl05__Estado()
	{
		return $this->PStCl05__Estado;
	}

	public function ListaFun($inicio,$por_pagina)
	{
		$con = new conexion();
		$sql = "CALL PaFunTb06_Listar($inicio,$por_pagina);";
		$result = $con->query($sql);
		return $result;
	}

	public function Cantidad()
	{
		$con = new conexion();
 	$consulta = $con -> query("select count(*) as cantidad from FunTb06");
	$cant = $consulta -> fetch_array();
	return $cant["cantidad"];
 	}

 	public function BorraFun($PStCl05_IdFuncionario)
	{
		$con = new conexion();
		$sql = "CALL PaFunTb06_Borrar_Func('".$PStCl05_IdFuncionario."');";
		$r = $con->query($sql);
		if($r)
		{
		 return $r;
		}
	}

		public function BuscaFun($PStCl05_IdFuncionario)
	{
		$con = new conexion();
		$sql = "CALL PaFunTb06_Buscar_FuncD('".$PStCl05_IdFuncionario."');";
		$result = $con->query($sql);
		$r = 	$result->	fetch_all(MYSQLI_ASSOC);
		if ($r) 
		{
		 return $r;
		}
	}

	public function EditFun($PStCl05_IdFuncionario,$PStCl05_Clave,$PStCl01_Nombre,$PStCl01_Apellido1,
		$PStCl01_Apellido2,$PStCl01_Direccion,$PStCl01_Telefono,
		$PStCl01_Email)
	{
		$con = new conexion();
		$sql = "CALL PaFunTb06_ActualizarFunc('".$PStCl05_IdFuncionario."','".$PStCl05_Clave."','".$PStCl01_Nombre."','".$PStCl01_Apellido1."',
		'".$PStCl01_Apellido2."','".$PStCl01_Direccion."','".$PStCl01_Telefono."',
		'".$PStCl01_Email."');";
		$edit = $con->query($sql);
		if($edit)
		{
			return $edit;
		}
	}

	public function AddFun($PStCl05_IdFuncionario,$PStCl01_Nombre,$PStCl01_Apellido1,
		$PStCl01_Apellido2,$PStCl01_Direccion,$PCrCl01_Sexo,$PStCl01_Telefono,
		$PStCl01_Email,$PStCl05_Clave,$PStCl05_FechaNac)
	{
		$con = new conexion();
		$sql = "CALL PaFunTb06_GuardarFunc('".$PStCl05_IdFuncionario."','".$PStCl01_Nombre."','".$PStCl01_Apellido1."',
		'".$PStCl01_Apellido2."','".$PStCl01_Direccion."','".$PCrCl01_Sexo."','".$PStCl01_Telefono."',
		'".$PStCl01_Email."','".$PStCl05_Clave."','".$PStCl05_FechaNac."');";
		$add = $con->query($sql);
		if($add){
		return $add;
	    }
	}
}
?>