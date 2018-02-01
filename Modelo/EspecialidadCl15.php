<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php';
class EspecialidadCl15
{
	private $PStCl15_IdEspecialidad;
	private $PStCl15_Nombre;
    private  $PInCl15_Cupo;
	
		public function __construct()
	{
		$con = new conexion();
	}	
	
	public function setPStCl15_IdEspecialidad($IdE)
	{
		$this->PStCl15_IdEspecialidad = $IdE;
	}
	public function getPStCl15_IdEspecialidad()
	{
		return $this->PStCl15_IdEspecialidad;
	}
	
	public function setPStCl15_Nombre($Nom)
	{
		$this->PStCl15_Nombre = $Nom;
	}
	public function getPStCl15_Nombre()
	{
		return $this->PStCl15_Nombre;
	}
	
	public function setPInCl15_Cupo($Cupo)
	{
		$this->PInCl15_Cupo = $Cupo;
	}
	public function getPInCl15_Cupo()
	{
		return $this->PInCl15_Cupo;
	}

	public function ListaEsp()
	{
		$con = new conexion();
		$sql = "CALL PaEspecialidadTb16_Listar();";
		$result = $con->query($sql);
		return $result;
	}
}

?>