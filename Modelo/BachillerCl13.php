<?php
include 'Conexion.php';

class BachillerCl13
{
	private $PStCl13_IdBachiller;
    private $PStCl13_NombreBachiller;
	
	public function BachillerCl13($IdB, $NomB)
	{
		$this->PStCl13_IdBachiller = $IdB;
		$this->PStCl13_NombreBachiller = $NomB;
	}
	
	public function BachillerCl13()
	{	
	}
	
	public function setPStCl13_IdBachiller($IdB)
	{
		$this->PStCl13_IdBachiller = $IdB;
	}
	public function getPStCl13_IdBachiller()
	{
		return $this->PStCl13_IdBachiller;
	}
	
	public function setPStCl13_NombreBachiller($NomB)
	{
		$this->PStCl13_NombreBachiller = $NomB;
	}
	public function getPStCl13_NombreBachiller()
	{
		return $this->PStCl13_NombreBachiller;
	}
}
?>