<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/EncCl04.php';
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/UsuCl01.php';
$busq =$_GET['ced'];
  $enc = new EncCl04(); 
  $result = $enc->BuscaEnc($busq);
  if($result){
?>

<?php foreach ($result as $r): ?> 
<form role="form" id="actualizar" method="post">
	<h2>Editando Encargado: <?php echo $r["Cedula"];?> </h2>
	<div class="form-group">
		<label for="Nombre">Nombre</label>
		<input type="text" class="form-control" value="<?php echo $r["Nombre"]; ?>" name="Nombre">
	</div>
	<div class="form-group">
		<label for="Apellido1">1°Apellido</label>
		<input type="text" class="form-control" value="<?php echo  $r["Apellido1"]; ?>" name="Apellido1">
	</div>
	<div class="form-group">
		<label for="Apellido2">2°Apellido</label>
		<input type="text" class="form-control" value="<?php echo $r["Apellido2"]; ?>" name="Apellido2">
	</div>
	<div class="form-group">
		<label for="Direccion">Domicilio</label>
		<input type="text" class="form-control" value="<?php echo $r["Direccion"]; ?>" name="Direccion">
	</div>
	<div class="form-group">
		<label for="Telefono">Telefono</label>
		<input type="text" class="form-control" value="<?php echo $r["Telefono"]; ?>" name="Telefono" >
	</div>
	<div class="form-group">
		<label for="Email">Email</label>
		<input type="email" class="form-control" value="<?php echo $r["Email"]; ?>" name="Email" >
	</div>
	<input type="hidden" name="Cedula" value="<?php echo $r["Cedula"]; ?>">
	<button type="submit" class="btn btn-default">
		Actualizar
	</button>
</form>
<?php endforeach ?>     
<?php

}?>

<script>
	$("#actualizar").submit(function(e) {
		e.preventDefault();
		$.post("./Controlador/Encargado/ActualizarEnc.php", $("#actualizar").serialize(), function(data) {
			if(data!=1){swal('Ups...', 'Algo salió mal!', 'error');}
			else{$('#Modal_Editar').modal('hide');
		$('body').removeClass('modal-open');
		$('body').removeAttr("style");
		$('.modal-backdrop').remove();
		$('#tabla').html('');
		CargarTabla(1);
		swal('Editado!','El registro fue modificado.','success');
	}
		});	
	});

</script>
