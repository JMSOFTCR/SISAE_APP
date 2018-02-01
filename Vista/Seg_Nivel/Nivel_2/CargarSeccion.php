<?php require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php' ;
$con = new conexion();
$query = "CALL PaMatriculaTb30_CargarSeccion(\"$_REQUEST[idMater]\",\"$_REQUEST[idProf]\")";
$result = $con->query($query);
while ($valores = mysqli_fetch_array($result)) {
$resultado = "<option value= \"$valores[Id_Seccion]\">$valores[Grado] - $valores[num_grupo]</option>";
print $resultado;
}
?>