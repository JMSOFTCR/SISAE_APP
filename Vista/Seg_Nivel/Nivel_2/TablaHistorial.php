<?php require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php'; 
$id_sec = $_REQUEST['secc'];
$mater = $_REQUEST['idma'];
$con = new conexion();
$resultado = $con->query("CALL PaAsistEstTb23_Listar(\"$id_sec\",\"$mater\")");
?>

<div class="col-md-4">
<form method="post" class="form-inline" style="padding-left:10px" id="filtro">
  <label for="fecha">Fecha</label><input class="form-control" type="date" name="fecha" id="fech">
  <button class="btn btn-info" type="submit">Filtrar</button>
</form>
</div>
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
<?php foreach($resultado as $r):?>
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

<script type="text/javascript">
	$('#filtro').submit(function(e){
    e.preventDefault();
    var pa = {'fech':$('#fech').val(),'id_sec':'<?php echo $id_sec;?>','mater':'<?php echo $mater;?>'}
    $.ajax({
      url:'Vista/Seg_Nivel/Nivel_2/BuscarFecha.php',
      data:pa,
      success:function(data){
        $('#tb').html(data);
      }
    });
  });
</script>