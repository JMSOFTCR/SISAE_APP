<?php
include 'Conexion.php';

class EstRepCl21
{
	private $PStCl21_IdEstudiante;
    private $PStCl21_IdReporte;
	
	public function EstRepCl21($IdE, $IdR)
	{
		$this->PStCl21_IdEstudiante = $IdE;
		$this->PStCl21_IdReporte = $IdR;
	}
	public function EstRepCl21()
	{
	}
	
	public function setPStCl21_IdEstudiante($IdE)
	{
		$this->PStCl21_IdEstudiante = $IdE;
	}
	public function getPStCl21_IdEstudiante()
	{
		return $this->PStCl21_IdEstudiante;
	}
	
	public function setPStCl21_IdReporte($IdR)
	{
		$this->PStCl21_IdReporte = $IdR;
	}
	public function getPStCl21_IdReporte()
	{
		return $this->PStCl21_IdReporte;
	}
}
?>