<?php
include 'Conexion.php';

class InscMatCl10
{
	private $PStCl10_IdEstudiante;
	private $PStCl10_IdMateria;
	
	public function InscMat($IdEst, $IdMat)
	{
		$this->PStCl10_IdEstudiante = $IdEst;
		$this->PStCl10_IdMateria = $IdMat;
	}
	
	public function InscMat()
	{
	}
	
	public function setPStCl10_IdEstudiante($IdEst)
	{
		$this->PStCl10_IdEstudiante = $IdEst;
	}
	public function getPStCl10_IdEstudiante()
	{
		return $this->PStCl10_IdEstudiante;
	}
	
	public function setPStCl10_IdMateria($IdMat)
	{
		$this->PStCl10_IdMateria = $IdMat;
	}
	public function getPStCl10_IdMateria()
	{
		return $this->PStCl10_IdMateria;
	}
}
?>