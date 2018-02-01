<?php
include 'Conexion.php';

class SecGradoCl24
{
	private $PStCl24_IdGrado;
    private $PStCl24_IdSeccion;
	
	public function SecGradoCl24($IdG, $IdS)
	{
		$this->PStCl24_IdGrado = $IdG;
		$this->PStCl24_IdSeccion = $IdS;
	}
	public function SecGradoCl24()
	{
	}
	
	public function setPStCl24_IdGrado($IdG)
	{
		$this->PStCl24_IdGrado = $IdG;
	}
	public function getPStCl24_IdGrado()
	{
		return $this->PStCl24_IdGrado;
	}
	
	public function setPStCl24_IdSeccion($IdS)
	{
		$this->PStCl24_IdSeccion = $IdS;
	}
	public function getPStCl24_IdSeccion()
	{
		return $this->PStCl24_IdSeccion;
	}
}
?>