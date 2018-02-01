<?php
include 'Conexion.php';

class AsistMateriaCl18
{
	private $PStCl18_IdProf;
    private $PStCl18_IdMateria;
	
	public function AsistMateriaCl18($IdP, $IdM)
	{
		$this->PStCl18_IdProf = $IdP;
		$this->PStCl18_IdMateria = $IdM;	
	}
	
	public function AsistMateriaCl18()
	{	
	}
	
	public function setPStCl18_IdProf($IdP)
	{
		$this->PStCl18_IdProf = $IdP;
	}
	public function getPStCl18_IdProf()
	{
		return $this->PStCl18_IdProf;
	}
	
	public function setPStCl18_IdMateria($IdM)
	{
		$this->PStCl18_IdMateria = $IdM;
	}
	public function getPStCl18_IdMateria()
	{
		return $this->PStCl18_IdMateria;
	}
}
?>