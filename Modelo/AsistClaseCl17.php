<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php';
class AsistClaseCl17
{
	private $PStCl17_IdAsistClase;
    private $PDtCl17_Fecha;
	private $PTmCl17_Hora;
    private $PStCl17_Estado;
    private $PStCl17_IdMateria;
	
	public function __construct()
	{
		$con = new conexion();
	}
	
	public function setPStCl17_IdAsistClase($IdA)
	{
		$this->PStCl17_IdAsistClase = $IdA;
	}
	public function getPStCl17_IdAsistClase()
	{
		return $this->PStCl17_IdAsistClase;
	}
	
	public function setPDtCl17_Fecha($Fec)
	{
		$this->PDtCl17_Fecha = $Fec;
	}
	public function getPDtCl17_Fecha()
	
	{
		return $this->PDtCl17_Fecha;
	}
	
	public function setPTmCl17_Hora($Hora)
	{
		$this->PTmCl17_Hora = $Hora;
	}
	public function getPTmCl17_Hora()
	{
		return $this->PTmCl17_Hora;
	}
	
	public function setPStCl17_Estado($Est)
	{
		$this->PStCl17_Estado = $Est;
	}
	public function getPStCl17_Estado()
	{
		return 	$this->PStCl17_Estado;
	}
	
	public function setPStCl17_IdMateria($IdM)
	{
		$this->PStCl17_IdMateria = $IdM;
	}
	public function getPStCl17_IdMateria()
	{
		return $this->PStCl17_IdMateria;
	}

	public function AddAsis($PDtCl17_Fecha,$PTmCl17_Hora,$PStCl17_Estado,$PStCl17_IdMateria,$PStCl17_IdEstudiante)
	{
		$con = new conexion();
		$sql = "CALL PaAsistClaseTb18_GuardarAsis('".$PDtCl17_Fecha."','".$PTmCl17_Hora."','".$PStCl17_Estado."',".$PStCl17_IdMateria.",'".$PStCl17_IdEstudiante."');";
		$add = $con->query($sql);
		if($add)
		{
		return $add;
	    }
	}

	public function BuscaFecha($Fecha,$Id_Sec,$Id_Mater){
		$con = new conexion();
		$sql = "call PaAsistEstTb23_BuscarFecha('".$Fecha."','".$Id_Sec."','".$Id_Mater."')";
		$result = $con->query($sql);
		return $result;
	}

	public function BuscaFechaEst($Fecha,$Id_Sec){
		$con = new conexion();
		$sql = "call PaAsistEstTb23_BuscarFechaEst('".$Fecha."','".$Id_Sec."')";
		$result = $con->query($sql);
		return $result;
	}
}
?>