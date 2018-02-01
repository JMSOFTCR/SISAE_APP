<?php
include 'Conexion.php';

class RepCl09
{
	private $PStCl09_IdReporte;
    private $PStCl09_FechaReporte;
    private $PStCl09_HoraReporte;
    private $PStCl09_IdAsistClase;
	
	public function RepCl09($IdRep, $FecR, $HoR, $IdAsis)
	{
		$this->PStCl09_IdReporte = $IdRep;
		$this->PStCl09_FechaReporte = $FecR;
		$this->PStCl09_HoraReporte = $HoR;
		$this->PStCl09_IdAsistClase = $IdAsis;
	}
	
	public function RepCl09()
	{
	}
	
	public function setPStCl09_IdReporte($IdRep)
	{
		$this->PStCl09_IdReporte = $IdRep;
	}
	public function getPStCl09_IdReporte()
	{
		return $this->PStCl09_IdReporte;
	}
	
	public function setPStCl09_FechaReporte($FecR)
	{
		$this->PStCl09_FechaReporte = $FecR;
	}
	public function getPStCl09_FechaReporte()
	{
		return $this->PStCl09_FechaReporte;
	}
	
	public function setPStCl09_HoraReporte($HoR)
	{
		$this->PStCl09_HoraReporte = $HoR;
	}
	public function getPStCl09_HoraReporte()
	{
		return $this->PStCl09_HoraReporte;
	}
	
	public function setPStCl09_IdAsistClase($IdAsis)
	{
		$this->PStCl09_IdAsistClase = $IdAsis;
	}
	public function getPStCl09_IdAsistClase()
	{
		return $this->PStCl09_IdAsistClase;
	}
}
?>