<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/SeccionCl19.php';
$busq =$_GET['id_sec'];
$sec = new SeccionCl19(); 
 $result = $sec->BuscaSec($busq);
if($result){
?>

<?php foreach($result as $r):?>

<form role="form" id="actualizar" method="post">
  <div class="form-group">
    <label for="id_grupo">ID_Grupo</label>
    <input type="text" class="form-control" name="id_grupo" value="<?php echo $r['ID_Seccion'];?>" readonly>
  </div>
  <div class="form-group">
    <label for="Grado">Grado</label>
    <input type="text" class="form-control" name="Grado" value="<?php echo $r['Grado'];?>" readonly>
  </div>
  <div class="form-group">
    <label for="num_grupo">Numero Grupo</label>
    <input type="text" class="form-control" name="num_grupo" value="<?php echo $r['Num_grupo'];?>">
  </div>
  <div  class="form-group">
    <label for="cupo">Cupo</label>
    <input type="text" class="form-control" name="cupo" value="<?php echo $r['cupo'];?>">
  </div>
  <input type="hidden" name="id" value="<?php echo $r["ID_Seccion"]; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php endforeach; ?>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./Controlador/Sec-Grupo/EditarSeccion.php",$("#actualizar").serialize(),function(data){
    if(data!=1){swal('Ups...', 'Algo salió mal!', 'error');}
    else{
$('#Modal_Editar').modal('hide');
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();
$('#tabla').html('');
CargarTabla(1);
swal('Editado', 'El registro fue modificado', 'success');
    }
    });
  });
</script>
<?php } else{?>
  <p class="alert alert-danger">No se encuentra</p>
<?php }?>