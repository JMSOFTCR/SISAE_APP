<?php require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/ProfCl03.php'; 
$pagina = $_REQUEST['pagina'];
$por_pagina = 10;
$inicio = ($pagina -1)*$por_pagina;
$enc = new ProfCl03(); 
$result = $enc->ListaProf($inicio,$por_pagina);
$total = $enc->Cantidad();
$total_botones = ceil($total/$por_pagina);
if($total>$por_pagina):?>
<div class="table-pagination pull-right">
  <div class="scrollmenu" style="overflow:auto;white-space:nowrap;max-width:140px;">
  <?php for($i=1;$i<=$total_botones;$i++):?>
    <a type="submit" class="btn btn-pag btn-xs btn-default" style="font-size:10px;" data-id="<?php echo $i;?>"><?php echo $i;?>
    </a>  
  <?php endfor;?>
</div>
</div>
<?php endif;?>
<label style="float:right;margin-right:8px;">Total <?php echo $total;?></label>

<table class="table table-bordered table-hover" style="font-size:13px;">
<thead>
  <th>Cedula</th>
  <th>Nombre</th>
  <th>1° Apellido</th>
  <th>2° Apellido</th>
  <th>Direccion</th>
  <th>Genero</th>
  <th>Telefono</th>
  <th>Email</th>
  <th>Clave</th>
  <th>Fecha Nacimiento </th>
  <th>Estado</th>
  <th></th>
</thead>
<?php while ($r=$result->fetch_array()){
?>
<tr>
  <td><?php echo $r["Cedula"]; ?></td>
  <td><?php echo $r["Nombre"]; ?></td>
  <td><?php echo $r["Apellido1"]; ?></td>
  <td><?php echo $r["Apellido2"]; ?></td>
  <td><?php echo $r["Direccion"]; ?></td>
  <td><?php echo $r["Genero"]; ?></td>
  <td><?php echo $r["Telefono"]; ?></td>
  <td><?php echo $r["Email"]; ?></td>
  <td><?php echo $r["Clave"]; ?></td>
  <td><?php echo $r["Fecha_Nac"]; ?></td>
  <td><?php echo $r["Estado"]; ?></td>
  
  <td style="width:150px;">
    <a data-id="<?php echo $r["Cedula"];?>" class="btn btn-edit btn-sm btn-warning" style="width:60px">Editar</a>
    <a href="#" id="bor-<?php echo $r["Cedula"];?>" class="btn btn-sm btn-danger" style="width:60px">Eliminar</a>
    <script>
    $('#bor-'+<?php echo $r['Cedula']?>).click(function(e){
      e.preventDefault();
      swal({
        title: 'Está seguro?',
        text: "Se podra recuperar el dato!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar',
        }).then(function () {
          swal({
  title: 'Procesando',
  text: 'Su peticion se esta procesando',
  imageUrl: './Public/img/Loading.gif',
  showConfirmButton:false,
  imageWidth: 130,
  animation:false,
});
          //ELIMINA
      $.ajax({
      url:'./Controlador/Profesor/EliminarProf.php',
      type:'GET',
      data:'ced='+<?php echo $r['Cedula']?>,
      success:function(data){
    if(data!=1){swal('Ups...', 'Algo salió mal!', 'error')}
    else{
    $('#tabla').html('');
    CargarTabla(<?php echo $pagina; ?>);
    swal('Eliminado!','El registro fue eliminado.','success');    
          } 
      }
    });
   });
  });
</script>
      </td>
</tr>
<?php } ?>
</table>

<script>
$(".btn-edit").click(function(){
      id = $(this).data("id");
      $.get("Controlador/Profesor/Formulario_Editar_Prof.php","ced="+id,function(data){
        $("#form-Editar").html(data);
      });
      $('#Modal_Editar').modal('show');
    });

$(".btn-pag").click(function(e){
  pg = $(this).data("id");
  CargarTabla(pg);
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