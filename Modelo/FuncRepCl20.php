<?php
include 'Conexion.php';

class FuncRepCl20
{
	private $PStCl20_IdFuncionario;
    private $PStCl20_IdReporte;
	
	public function FuncRepCl20($IdF, $IdR)
	{
			$this->PStCl20_IdFuncionario = $IdF;
			$this->PStCl20_IdReporte = $IdR;
	}
	
	public function FuncRepCl20()
	{	
	}
	
	public function setPStCl20_IdFuncionario($IdF)
	{
		$this->PStCl20_IdFuncionario = $IdF;
	}
	public function getPStCl20_IdFuncionario()
	{
		return $this->PStCl20_IdFuncionario;
	}
	
	public function setPStCl20_IdReporte($IdR)
	{
		$this->PStCl20_IdReporte = $IdR;
	}
	public function getPStCl20_IdReporte()
	{
		return $this->PStCl20_IdReporte;
	}
}
?>