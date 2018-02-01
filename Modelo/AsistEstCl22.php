<?php
include 'Conexion.php';

class AsistEstCl22
{
	private $PStCl22_IdAsistClase;
    private $PStCl22_IdEstudiante;
	
	public function AsistEstCl22($IdA, $IdE)
	{
		$this->PStCl22_IdAsistClase = $IdA;
		$this->PStCl22_IdEstudiante = $IdE;
	}
	public function AsistEstCl22()
	{
	}
	
	public function setPStCl22_IdAsistClase($IdA)
	{
		$this->PStCl22_IdAsistClase = $IdA;
	}
	public function getPStCl22_IdAsistClase()
	{
		return $this->PStCl22_IdAsistClase;
	}
	
	public function setPStCl22_IdEstudiante($IdE)
	{
		$this->PStCl22_IdEstudiante = $IdE;
	}
	public function getPStCl22_IdEstudiante()
	{
		return $this->PStCl22_IdEstudiante;
	}
}
?>