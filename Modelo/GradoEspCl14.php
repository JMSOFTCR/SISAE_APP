<?php
include 'Conexion.php';

class GradoEspCl14
{
	private $PStCl14_IdGrado;
    private $PStCl14_IdEspecialidad;
	
	public function GradoEspCl14($IdG, $IdE)
	{
		$this->PStCl14_IdGrado = $IdG;
		$this->PStCl14_IdEspecialidad = $IdE;
	}
	
	public function GradoEspCl14()
	{	
	}
	
	public function setPStCl14_IdGrado($IdG)
	{
		$this->PStCl14_IdGrado = $IdG;
	}
	public function getPStCl14_IdGrado()
	{
		return $this->PStCl14_IdGrado;
	}
	
	public function setPStCl14_IdEspecialidad($IdE)
	{
		$this->PStCl14_IdEspecialidad = $IdE;
	}
	public function getPStCl14_IdEspecialidad()
	{
		$this->PStCl14_IdEspecialidad;
	}
}
?>