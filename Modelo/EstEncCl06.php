<?php
include 'Conexion.php';

class EstEncCl06
{
	private $PStCl06_IdEncargado;
	private $PStCl06_IdEstudiante;
	
	public function EstEncCl06($IdEnc, $IdEst)
	{
		$this->PStCl06_IdEncargado = $IdEnc;
		$this->PStCl06_IdEstudiante = $IdEst;
	}
	
	public function EstEncCl06()
	{
	}
	
	public function setPStCl06_IdEncargado($IdEnc)
	{
		$this->PStCl06_IdEncargado = $IdEnc;
	}
	public function getPStCl06_IdEncargado()
	{
		return $this->PStCl06_IdEncargado;
	}
	
	public function setPStCl06_IdEstudiante($IdEst)
	{
		$this->PStCl06_IdEstudiante = $IdEst;
	}
	public function getPStCl06_IdEstudiante()
	{
		return $this->PStCl06_IdEstudiante;
	}
}
?>