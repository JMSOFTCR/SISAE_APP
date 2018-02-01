<?php
include 'Conexion.php';

class AsistColeCl07
{
	private $PStCl07_IdAsistCole;
    private $PStCl07_HoraEntrada;
    private $PStCl07_FechaEntrada;
    private $PStCl07_HoraSalida;
    private $PStCl07_FechaSalida;
    private $PStCl07_IdEstudiante;
	
	public function AsistColeCl07($IdAsis, $HoEn, $FeEn, $HoSa, $FeSa, $IdEst)
	{
		$this->PStCl07_IdAsistCole = $IdAsis;
		$this->PStCl07_HoraEntrada = $HoEn;
		$this->PStCl07_FechaEntrada = $FeEn;
		$this->PStCl07_HoraSalida = $HoSa;
		$this->PStCl07_FechaSalida = $FeSa;
		$this->PStCl07_IdEstudiante = $IdEst;
	}
	
	public function AsistColeCl07()
	{
	}
	
	public function setPStCl07_IdAsistCole($Asist)
	{
		$this->PStCl07_IdAsistCole = $Asist;
	}
	public function getPStCl07_IdAsistCole()
	{
		return $this->PStCl07_IdAsistCole;
	}
	
	public function setPStCl07_HoraEntrada($HoEn)
	{
		$this->PStCl07_HoraEntrada = $HoEn;
	}
	public function getPStCl07_HoraEntrada()
	{
		return $this->PStCl07_HoraEntrada;
	}
	
	public function setPStCl07_FechaEntrada($FeEn)
	{
		$this->PStCl07_FechaEntrada = $FeEn;
	}
	public function getPStCl07_FechaEntrada()
	{
		return $this->PStCl07_FechaEntrada;
	}
	
	public function setPStCl07_HoraSalida($HoSa)
	{
		$this->PStCl07_HoraSalida = $HoSa;
	}
	public function getPStCl07_HoraSalida()
	{
		return $this->PStCl07_HoraSalida;
	}
	
	public function setPStCl07_FechaSalida($FeSa)
	{
		$this->PStCl07_FechaSalida = $FeSa;
	}
	public function getPStCl07_FechaSalida()
	{
		return $this->PStCl07_FechaSalida;
	}
	
	public function setPStCl07_IdEstudiante($IdEst)
	{
		$this->PStCl07_IdEstudiante = $IdEst;
	}
	public function getPStCl07_IdEstudiante()
	{
		return $this->PStCl07_IdEstudiante;
	}
}
?>