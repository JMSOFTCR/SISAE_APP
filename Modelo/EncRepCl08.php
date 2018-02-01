<?php
include 'Conexion.php';

class EncRepCl08
{
	private $PStCl08_IdEncargado;
	private $PStCl08_IdReporte;
	
	public function EncRepCl08($IdEnc, $IdRep)
	{
		$this->PStCl08_IdEncargado = $IdEnc;
		$this->PStCl08_IdReporte =  $IdRep;
	}
	
	public function EncRepCl08()
	{
	}
	
	public function setPStCl08_IdEncargado($IdEnc)
	{
		$this->PStCl08_IdEncargado = $IdEnc;
	}
	public function getPStCl08_IdEncargado()
	{
		return $this->PStCl08_IdEncargado;
	}
	
	public function setPStCl08_IdReporte($IdRep)
	{
		$this->PStCl08_IdReporte = $IdRep;
	}
	public function getPStCl08_IdReporte()
	{
		return $this->PStCl08_IdReporte;
	}
}
?>