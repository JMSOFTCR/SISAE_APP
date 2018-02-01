<?php
include "../conexion.php";

$sql1 = "CALL PaBachillerTb14_BuscarBachiller($_GET[busqueda])";
$query = $con -> query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
  <th>ID</th>
  <th>Nombre</th>
  
  <th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
  <td><?php echo $r["ID"]; ?></td>
  <td><?php echo $r["Nombre"]; ?></td>
  
  
    <td style="width:150px;">
    <a data-id="<?php echo $r["ID"]; ?>" class="btn btn-edit btn-sm btn-warning" style="width:60px">Editar</a>
    <a href="#" id="bor-<?php echo $r["ID"]; ?>" class="btn btn-sm btn-danger" style="width:60px">Eliminar</a>
    <script>
      $('#bor-'+<?php echo $r['ID']?>).click(function(e){
      e.preventDefault();
      p = confirm('¿Está Seguro?');
      if(p){$.get('./Controlador/Bachiller/EliminarBachi.php','id='+<?php echo $r['ID']?>
		,function(status) {
			$('#tabla').html('');
			CargarTabla();
		});}
		});
    </script>
    </td>
</tr>
<?php endwhile; ?>
</table>
<?php else: ?>
  <p class="alert alert-warning">No hay resultados</p>
<?php endif; ?>
<script>
	$(".btn-edit").click(function() {
		id = $(this).data("id");
		$.get("./Controlador/Bachiller/Formulario_Editar_Bachi.php", "id=" + id, function(data) {
			$("#form-Editar").html(data);
		});
		$('#Modal_Editar').modal('show');
	});
</script>

<div class="modal fade" id="Modal_Editar" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-Editar"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->