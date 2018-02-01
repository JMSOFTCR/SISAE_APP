<?php require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/AsistClaseCl17.php';
$fecha = $_REQUEST['fech'];
$id_est = $_REQUEST['id_est'];
$asis = new AsistClaseCl17();
$result = $asis->BuscaFechaEst($fecha,$id_est);
?>
<table class="table table-bordered table-hover" style="font-size:13px;" id="tb">
<thead>
  <th>Estado</th>
  <th>Hora</th>
  <th>Fecha</th>
  <th>Materia</th>
</thead>
<?php foreach($result as $r):?>
<tr>
  <td<?php if($r["Estado"]=='Ausente'){echo ' style="background-color:#ef401c"';}elseif($r["Estado"]=='Justificado'){echo ' style="background-color:#9f26b7"';}else{echo ' style="background-color:#4caf4c"';}?> > <?php echo $r["Estado"];?> </td>
  <td><?php echo $r["Hora"]; ?></td>
  <td><?php echo $r["Fecha"]; ?></td>
  <td><?php echo $r["Materia"]; ?></td>
</tr>
<?php endforeach;?>
</table>