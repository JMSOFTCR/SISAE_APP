<?php include "C:/xampp/htdocs/SISAE_APP/Controlador/Materia/Listar_Asignacion.php";
$id_Materia = $_GET['idm'];
if($resultado->num_rows>0):?>
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
  <td><a href="#" data-id="<?php echo $r["Cedula"];?>" class="btn btn-agre btn-md btn-success" style="width:80px;">Asignar</a></td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
  <p class="alert alert-warning">No hay resultados</p>
<?php endif;?>

<script type="text/javascript">

$('.btn-agre').click(function(){
idp = $(this).data('id');
var parametros = {"idm":"<?php echo $id_Materia;?>","idp":idp};
$.ajax({
    url:"Controlador/Materia/Asignar_Prof.php",
    data: parametros,
    success:function(data){
       $('#Modal_Asigna').modal('hide');
       $('body').removeClass('modal-open');
       $('.modal-backdrop').remove();
       alert(data);
    }
});
});

</script>