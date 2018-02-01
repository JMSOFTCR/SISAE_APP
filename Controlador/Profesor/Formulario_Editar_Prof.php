<?php
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/ProfCl03.php';
require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/UsuCl01.php';
$busq =$_GET['ced'];
$prof = new ProfCl03(); 
$result = $prof->BuscaProf($busq);
  if($result){
?>

<?php foreach ($result as $r): ?>

<form role="form" id="actualizar" method="post">
<h2>Editando Profesor: <?php echo $r["Cedula"];?> </h2>
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" name="nombre" value="<?php echo $r['Nombre']; ?>">
	</div>
	<div class="form-group">
		<label for="Apellido1">1° Apellido</label>
		<input type="text" class="form-control" name="Apellido1" value="<?php echo $r['Apellido1']; ?>">
	</div>
	<div class="form-group">
		<label for="Apellido2">2° Apellido</label>
		<input type="text" class="form-control" name="Apellido2" value="<?php echo $r['Apellido2']; ?>">
	</div>
	<div class="form-group">
		<label for="Direccion">Domicilio</label>
		<input type="text" class="form-control" name="direccion" value="<?php echo $r['Direccion']; ?>">
	</div>
	<div class="form-group">
		<label for="Telefono">Telefono</label>
		<input type="text" class="form-control" name="telefono" value="<?php echo $r['Telefono']; ?>">
	</div>
	<div class="form-group">
		<label for="email">Correo electronico</label>
		<input type="text" class="form-control" name="email" value="<?php echo $r['Correo_Electronico']; ?>">
	</div>
	<div class="form-group">
		<label for="Clave">Contraseña</label>
		<input type="password" class="form-control" name="clave" value="<?php echo $r['Clave']; ?>">
	</div>
	<div class="form-group">
		<label for="fecha_nac">Fecha de Nacimiento</label>
		<div class='input-group date' id='fecha'>
			<input type='text' class="form-control" name="fecha_nac" value="<?php echo $r['Fecha_Nac']; ?>" readonly>
			<span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span>
		</div>
	</div>
	<input type="hidden" name="cedula" value="<?php echo $r['Cedula']; ?>">
	<button type="submit" class="btn btn-default">
		Actualizar
	</button>
</form>
<?php endforeach?>
<?php } else{?>
<p class="alert alert-danger">
	No se encuentra
</p>
<?php } ?>

<script>
	$("#actualizar").submit(function(e) {
		e.preventDefault();
		$.post("./Controlador/Profesor/ActualizarProf.php", $("#actualizar").serialize(), function(data) {
		if(data!=1){swal('Ups...', 'Algo salió mal!', 'error');}
		else{
		$('#Modal_Editar').modal('hide');
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
