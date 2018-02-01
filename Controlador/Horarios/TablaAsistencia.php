<?php require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php'; 
$con = new conexion();
$resultado = $con->query('CALL PaSecEstTb28_Listar_Asist(\'$_REQUEST[secc]\')');
?>
<table class="table table-bordered table-hover" style="font-size:13px;">
<thead>
  <th>Cedula</th>
  <th>Nombre</th>
  <th>1° Apellido</th>
  <th>2° Apellido</th>
  <th></th>
</thead>
<?php while ($r=$resultado->fetch_array()):?>
<tr>
  <td><?php echo $r["Cedula"]; ?></td>
  <td><?php echo $r["Nombre"]; ?></td>
  <td><?php echo $r["Apellido1"]; ?></td>
  <td><?php echo $r["Apellido2"]; ?></td>
</tr>
<?php endwhile;?>
</table>