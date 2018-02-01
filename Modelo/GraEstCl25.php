<?php
include 'Conexion.php';

class GraEstCl25
{
	private $PStCl25_IdEstudiante;
    private $PStCl25_IdGrado;
	
	public function GraEstCl25($IdE, $IdG)
	{
		$this->PStCl25_IdEstudiante = $IdE;
		$this->PStCl25_IdGrado = $IdG;
	}
	public function GraEstCl25()
	{
	}
	
	public function setPStCl25_IdEstudiante($IdE)
	{
		$this->PStCl25_IdEstudiante = $IdE;
	}
	public function getPStCl25_IdEstudiante()
	{
		return $this->PStCl25_IdEstudiante;
	}
	
	public function setPStCl25_IdGrado($IdG)
	{
		$this->PStCl25_IdGrado = $IdG;
	}
	public function getPStCl25_IdGrado()
	{
		return $this->PStCl25_IdGrado;
	}
}
?>