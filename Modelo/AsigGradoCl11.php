<?php
include 'Conexion.php';

class AsigGradoCl11
{
	private $PStCl11_IdGrado;
    private $PStCl11_IdProf;
	
	public function AsigGradoCl11($IdG, $IdP)
	{
		$this->PStCl11_IdGrado = $IdG;
		$this->PStCl11_IdProf = $IdP;
	}
	
	public function AsigGradoCl11()
	{	
	}
	
	public function setPStCl11_IdGrado($IdG)
	{
		$this->PStCl11_IdGrado = $IdG;
	}
	public function getPStCl11_IdGrado()
	{
		return $this->PStCl11_IdGrado;
	}
	
	public function setPStCl11_IdProf($IdP)
	{
		$this->PStCl11_IdProf = $IdP;
	}
	public function getPStCl11_IdProf()
	{
		return $this->PStCl11_IdProf;
	}
}
?>