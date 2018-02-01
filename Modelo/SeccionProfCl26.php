<?php
include 'Conexion.php';

class SeccionProfCl26
{
	private $PStCl26_IdProfesor;
    private $PStCl26_IdSeccion;
	
	public function SeccionProfCl26($IdP, $IdS)
	{
		$this->PStCl26_IdProfesor = $IdP;
		$this->PStCl26_IdSeccion = $IdS;
	}
	public function SeccionProfCl26()
	{
	}
	
	public function setPStCl26_IdProfesor($IdP)
	{
		$this->PStCl26_IdProfesor = $IdP;
	}
	public function getPStCl26_IdProfesor()
	{
		return $this->PStCl26_IdProfesor;
	}
	
	public function setPStCl26_IdSeccion($IdS)
	{
		$this->PStCl26_IdSeccion = $IdS;
	}
	public function getPStCl26_IdSeccion()
	{
		return $this->PStCl26_IdSeccion;
	}
}
?>