<?php
include "../conexion.php";

$sql1 = "CALL PaGradoTb13_BuscarGrado($_GET[busqueda])";
$query = $con -> query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
  <th>ID Grado</th>
  <th>Nombre</th>
  <th>ID Bachiller</th>
 
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
  <td><?php echo $r["idgrado"]; ?></td>
  <td><?php echo $r["Nombre"]; ?></td>
  <td><?php echo $r["idbachi"]; ?></td>
  
  
    <td style="width:150px;">
    <a data-id="<?php echo $r["idgrado"]; ?>" class="btn btn-edit btn-sm btn-warning" style="width:60px">Editar</a>
    <a href="#" id="bor-<?php echo $r["idgrado"]; ?>" class="btn btn-sm btn-danger" style="width:60px">Eliminar</a>
    <script>
      $('#bor-'+<?php echo $r['idgrado']?>).click(function(e){
      e.preventDefault();
      p = confirm('¿Está Seguro?');
      if(p){$.get('./Controlador/Grado/EliminarGrado.php','id='+<?php echo $r['idgrado']?>
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
    $.get("./Controlador/Grado/Formulario_Editar_Grado.php", "id=" + id, function(data) {
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