<?php require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php' ;
$con = new conexion();
$query = "CALL PaAsigmateriaTb19_Profe_Materia(\"$_REQUEST[ced]\")";
$result = $con->query($query);
while ($valores = mysqli_fetch_array($result)) {
$resultado = "<option value= \"$valores[Id_Materia]\">$valores[nombre] </option>";
print $resultado;
}
?>