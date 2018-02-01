<?php
include 'Conexion.php';

class MateriaCl16
{
	private $PStCl16_IdMateria;
    private $PStCl16_Nombre;
	
	public function MateriaCl16($IdM, $Nom)
	{
			$this->PStCl16_IdMateria = $IdM;
			$this->PStCl16_Nombre = $Nom;
	}
	
	public function MateriaCl16()
	{	
	}
	
	public function setPStCl16_IdMateria($IdM)
	{
		$this->PStCl16_IdMateria = $IdM;
	}
	public function getPStCl16_IdMateria()
	{
		return $this->PStCl16_IdMateria;
	}
	
	public function setPStCl16_Nombre($Nom)
	{
		$this->PStCl16_Nombre = $Nom;
	}
	public function getPStCl16_Nombre()
	{
		return $this->PStCl16_Nombre;
	}
}
?>