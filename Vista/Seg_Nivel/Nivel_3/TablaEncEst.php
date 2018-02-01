<?php require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php'; 
$ced = $_REQUEST['idest'];
$con = new conexion();
$result = $con->query("CALL PaEstEncTb07_ListarEstEn(\"$ced\")");
?> 
<table class="table table-bordered table-hover" style="font-size:13px;">
<thead>
  <th>Cedula</th>
  <th>Nombre</th>
  <th>1° Apellido</th>
  <th>2° Apellido</th>
  <th>Especialidad</th>
  <th>Fecha Nacimiento </th>
  <th>Adecuacion</th>
  <th></th>
</thead>
<tbody>
  <?php 
  while ($r = $result->fetch_array()) {
  ?>
<tr>
  <td><?php echo $r["Cedula"]; ?></td>
  <td><?php echo $r["Nombre"]; ?></td>
  <td><?php echo $r["Apellido1"]; ?></td>
  <td><?php echo $r["Apellido2"]; ?></td>
  <td><?php echo $r["Especialidad"]; ?></td>
  <td><?php echo $r["Fecha_nac"]; ?></td>
  <td><?php echo $r["Adecuacion"]; ?></td>
</tr>
 <?php
}
          ?>
     </tbody>
</table>

<script type="text/javascript">
$('#ausen').click(function(){
  var para = {'est':$('#est').val()}
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
