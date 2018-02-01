<?php
include "C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php";

$sql1 = "CALL PaEstTb03_BuscarEst($_GET[ced])";
$query = $con -> query($sql1);

if ($query -> num_rows > 0) {
	while ($estudiante = $query -> fetch_object()) {
		break;
	}
}
?>

<?php if($estudiante!=null):
?>

<form role="form" id="actualizar" method="post">
	<div class="form-group">
		<label for="cedula">Cedula</label>
		<input type="text" class="form-control" name="cedula" value="<?php echo $estudiante -> Cedula; ?>" readonly>
	</div>
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" name="nombre" value="<?php echo $estudiante -> Nombre; ?>">
	</div>
	<div class="form-group">
		<label for="Apellido1">1° Apellido</label>
		<input type="text" class="form-control" name="Apellido1" value="<?php echo $estudiante -> Apellido1; ?>">
	</div>
	<div class="form-group">
		<label for="Apellido2">2° Apellido</label>
		<input type="text" class="form-control" name="Apellido2" value="<?php echo $estudiante -> Apellido2; ?>">
	</div>
	<div class="form-group">
		<label for="Direccion">Domicilio</label>
		<input type="text" class="form-control" name="direccion" value="<?php echo $estudiante -> Direccion; ?>">
	</div>
	<div class="form-group">
		<label for="Telefono">Telefono</label>
		<input type="text" class="form-control" name="telefono" value="<?php echo $estudiante -> Telefono; ?>">
	</div>
	<div class="form-group">
		<label for="email">Correo electronico</label>
		<input type="text" class="form-control" name="email" value="<?php echo $estudiante -> Email; ?>">
	</div>
	<div class="form-group">
		<label for="fecha_nac">Fecha de Nacimiento</label>
		<div class='input-group date' id='fecha'>
			<input type='text' class="form-control" name="fecha_nac" value="<?php echo $estudiante -> Fecha_Nac; ?>" readonly>
			<span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span>
		</div>
	</div>
	<input type="hidden" name="id" value="<?php echo $estudiante -> id; ?>">
	<button type="submit" class="btn btn-default">
		Actualizar
	</button>
</form>

<script>
	$("#actualizar").submit(function(e) {
		e.preventDefault();
		$.post("./Controlador/Estudiante/ActualizarEst.php", $("#actualizar").serialize(), function(data) {
		if(!data){alert("Se produjo un error");}
		else{
		$('#Modal_Editar').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
		$('#tabla').html('');	
		CargarTabla();
		}
		});			  
	});

</script>

<?php else: ?>
<p class="alert alert-danger">
	No se encuentra
</p>
<?php endif; ?>
