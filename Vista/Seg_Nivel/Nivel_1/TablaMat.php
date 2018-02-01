<?php include "C:/xampp/htdocs/SISAE_APP/Controlador/Materia/ListarMat.php";
$pagina = $_REQUEST['pagina'];
$por_pagina = 10;
$inicio = ($pagina -1)*$por_pagina;
$resultado = listar($inicio,$por_pagina);
$total = cantidad();
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
	<th>Id</th>
	<th>Nombre</th>
  <th></th>
</thead>
<?php while ($r=$resultado->fetch_array()):?>
<tr>
	<td><?php echo $r["Id"]; ?></td>
	<td><?php echo $r["Nombre"]; ?></td>
	
 <td style="width:150px;">
    <a data-id="<?php echo $r["Id"];?>" class="btn btn-edit btn-sm btn-warning" style="width:60px">Editar</a>
    <a href="#" id="bor-<?php echo $r["Id"];?>" class="btn btn-sm btn-danger" style="width:60px">Eliminar</a>
    <script>
    $('#bor-'+<?php echo $r['Id']?>).click(function(e){
      e.preventDefault();
      p = confirm('¿Está Seguro?');
      if(p){$.get('./Controlador/Materia/EliminarMat.php','idm='+<?php echo $r['Id']?>,function(data){
      if(!data){alert('Algo salio mal!!');}
      else{
      $('#tabla').html('');
      CargarTabla(<?php echo $pagina;?>);
      }    
      });}
    });
    </script>
    </td>
    <td style="width:150px;">
      <a href="#" data-id="<?php echo $r["Id"];?>" style="width:130px" class="btn btn-asig btn-md btn-success">Asignar Profesor</a>
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
      $.get("Controlador/Materia/Formulario_Editar_Mat.php","idm="+id,function(data){
        $("#form-Editar").html(data); 
      });
      $('#Modal_Editar').modal('show');      
    }); 

$(".btn-pag").click(function(e){
  pg = $(this).data("id");
  CargarTabla(pg);
});

$(".btn-asig").click(function(){
  idma = $(this).data("id");
   $.get("Controlador/Materia/Tabla_Asignar_Prof.php","idm="+idma,function(data){
        $("#tabla-asignar").html(data); 
      });
      $('#Modal_Asigna').modal('show'); 
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

  <div class="modal fade" id="Modal_Asigna" role="dialog" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Asignar Profesor</h4>
        </div>
        <div class="modal-body">
        <div id="tabla-asignar"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->