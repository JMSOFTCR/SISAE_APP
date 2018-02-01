<?php
include 'Conexion.php';

class ProfRepCl23
{
	private $PStCl23_IdProfesor;
	private $PStCl23_IdReporte;
	
	public function ProfRepCl23($IdP, $IdR)
	{
		$this->PStCl23_IdProfesor = $IdP;
		$this->PStCl23_IdReporte = $IdR;
	}
	public function ProfRepCl23()
	{
	}
	
	public function setPStCl23_IdProfesor($IdP)
	{
		$this->PStCl23_IdProfesor = $IdP;
	}
	public function getPStCl23_IdProfesor()
	{
		return $this->PStCl23_IdProfesor;
	}
	
	public function setPStCl23_IdReporte($IdR)
	{
		$this->PStCl23_IdReporte = $IdR;
	}
	public function getPStCl23_IdReporte()
	{
		return $this->PStCl23_IdReporte;
	}
}
?>