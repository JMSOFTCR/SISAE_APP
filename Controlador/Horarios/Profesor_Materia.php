<?php 
include "C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php";
$query = $con->query("CALL PaHorariosTb29_Profe_Mater(\"$_REQUEST[idm]\")");
while ($valores = mysqli_fetch_array($query)) {
$result = "<option value= \"$valores[Cedula]\">$valores[Nombre] $valores[Apellido1] $valores[Apellido2]</option>";
print $result;
                      }
 ?>
