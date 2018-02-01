<?php require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php' ;
$con = new conexion();
$query = "CALL PaEstEncTb07_CargarEst(\"$_REQUEST[idenc]\")";
$result = $con->query($query);
while ($valores = mysqli_fetch_array($result)) {
$resultado = "<option value= \"$valores[Cedula]\">$valores[Nombre] $valores[Apellido1] $valores[Apellido2] </option>";
print $resultado;
}
?>