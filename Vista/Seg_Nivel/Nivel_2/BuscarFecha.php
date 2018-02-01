<?php require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/AsistClaseCl17.php';
$fecha = $_REQUEST['fech'];
$id_sec = $_REQUEST['id_sec'];
$mater = $_REQUEST['mater'];
$asis = new AsistClaseCl17();
$result = $asis->BuscaFecha($fecha,$id_sec,$mater);
?>
<table class="table table-bordered table-hover" style="font-size:13px;" id="tb">
<thead>
  <th>Cedula</th>
  <th>Nombre</th>
  <th>1° Apellido</th>
  <th>2° Apellido</th>
  <th>Estado</th>
  <th>Fecha</th>
  <th>Hora</th>
  <th></th>
</thead>
<?php foreach($result as $r):?>
<tr>
  <td><?php echo $r["Cedula"]; ?></td>
  <td><?php echo $r["Nombre"]; ?></td>
  <td><?php echo $r["Apellido1"]; ?></td>
  <td><?php echo $r["Apellido2"]; ?></td>
  <td<?php if($r["Estado"]=='Ausente'){echo ' style="background-color:#ef401c"';}elseif($r["Estado"]=='Justificado'){echo ' style="background-color:#9f26b7"';}else{echo ' style="background-color:#4caf4c"';}?> > <?php echo $r["Estado"];?> </td>
  <td><?php echo $r["Fecha"]; ?></td>
  <td><?php echo $r["Hora"]; ?></td>
  <td><a class="btn-warning btn-sm">Editar</a></td>
</tr>
<?php endforeach;?>
</table>