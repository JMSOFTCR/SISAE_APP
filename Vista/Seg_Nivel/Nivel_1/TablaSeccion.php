<?php require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/SeccionCl19.php';
$pagina = $_REQUEST['pagina'];
$por_pagina = 10;
$inicio = ($pagina -1)*$por_pagina;
$sec = new SeccionCl19();
$resultado = $sec->ListaSec($inicio,$por_pagina);
$total = $sec->cantidad();
$total_botones = ceil($total/$por_pagina);
if($resultado->num_rows>0):?>
<?php if($total>$por_pagina):?>
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
  <th>ID Seccion</th>
  <th>Grado</th>
  <th>Numero de grupo</th>
  <th>Cupo</th>
  <th></th>
</thead>
<?php while ($r=$resultado->fetch_array()):?>
<tr>
  <td><?php echo $r["ID_Seccion"]; ?></td>
  <td><?php echo $r["Grado"]; ?></td>
  <td><?php echo $r["Num_grupo"]; ?></td>
  <td><?php echo $r["cupo"]; ?></td>
  
  <td style="width:150px;">
    <a data-id="<?php echo $r["ID_Seccion"];?>" class="btn btn-edit btn-sm btn-warning" style="width:60px">Editar</a>
    <a href="#" id="bor-<?php echo $r["ID_Seccion"];?>" class="btn btn-sm btn-danger" style="width:60px">Eliminar</a>
    <script>
    $('#bor-'+<?php echo $r['ID_Seccion']?>).click(function(e){
      e.preventDefault();
      swal({
        title: 'Está seguro?',
        text: "No se puede recuperar el dato!",
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
      url:'./Controlador/Sec-Grupo/EliminarSeccion.php',
      type:'GET',
      data:'Id_sec='+<?php echo $r['ID_Seccion']?>,
      success:function(data){
    if(data!=1){swal('Ups...', 'Algo salió mal!', 'error')}
    else{
    $('#tabla').html('');
    CargarTabla(<?php echo $pagina; ?>);
    swal('Eliminado!','El registro fue eliminado.','success')    
          } 
      }
    });
   });
  });
</script>
      </td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
  <p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
<script>
$(".btn-edit").click(function(){
      id = $(this).data("id");
      $.get("Controlador/Sec-Grupo/Formulario_Edit_Sec.php","id_sec="+id,function(data){
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