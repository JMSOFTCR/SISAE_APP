<?php
include 'Conexion.php';

class GradoCl12
{
	private $PStCl12_IdGrado;
    private $PStCl12_NombreGrado;
    private $PStCl12_IdBachiller;
	
	public function GradoCl12($IdG, $NomG, $IdB)
	{
		$this->PStCl12_IdGrado = $IdG;
		$this->PStCl12_NombreGrado = $NomG;
		$this->PStCl12_IdBachiller = $IdB;
	}
	public function GradoCl12()
	{	
	}
	
	public function setPStCl12_IdGrado($IdG)
	{
		$this->PStCl12_IdGrado = $IdG;
	}
	public function getPStCl12_IdGrado()
	{
		return $this->PStCl12_IdGrado;
	}
	
	public function setPStCl12_NombreGrado($NomG)
	{
		$this->PStCl12_NombreGrado = $NomG;
	}
	public function getPStCl12_NombreGrado()
	{
		return $this->PStCl12_NombreGrado;
	}
	
	public function setPStCl12_IdBachiller($IdB)
	{
		$this->PStCl12_IdBachiller = $IdB;
	}
	public function getPStCl12_IdBachiller()
	{
		return $this->PStCl12_IdBachiller;
	}
    public function ListaGrad()
	{
		$con = new conexion();
		$sql = "CALL PaGradoTb13_Listar();";
		$result = $con->query($sql);
		return $result;
	}
}
?>