<?php require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php'; 
$id_est = $_REQUEST['est'];
$con = new conexion();
$resultado = $con->query("CALL PaAsistEstTb23_Listar_Est(\"$id_est\")");
?>

<div class="col-md-4">
<form method="post" class="form-inline" style="padding-left:10px" id="filtro">
  <label for="fecha">Fecha</label><input class="form-control" type="date" name="fecha" id="fech">
  <button class="btn btn-info" type="submit">Filtrar</button>
</form>
</div>
<table class="table table-bordered table-hover" style="font-size:13px;" id="tb">
<thead>
  <th>Estado</th>
  <th>Hora</th>
  <th>Fecha</th>
  <th>Materia</th>
</thead>
<?php foreach($resultado as $r):?>
<tr>
  <td<?php if($r["Estado"]=='Ausente'){echo ' style="background-color:#ef401c"';}elseif($r["Estado"]=='Justificado'){echo ' style="background-color:#9f26b7"';}else{echo ' style="background-color:#4caf4c"';}?> > <?php echo $r["Estado"];?> </td>
  <td><?php echo $r["Hora"]; ?></td>
  <td><?php echo $r["Fecha"]; ?></td>
  <td><?php echo $r["Materia"]; ?></td>
</tr>
<?php endforeach;?>
</table>

<script type="text/javascript">
	$('#filtro').submit(function(e){
    e.preventDefault();
    var pa = {'fech':$('#fech').val(),'id_est':'<?php echo $id_est;?>'}
    $.ajax({
      url:'Vista/Seg_Nivel/Nivel_3/BuscarFecha.php',
      data:pa,
      success:function(data){
        $('#tb').html(data);
      }
    });
  });
</script>