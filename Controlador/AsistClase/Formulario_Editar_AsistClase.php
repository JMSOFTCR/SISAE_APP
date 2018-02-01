<?php
include "../conexion.php";

$sql1 = "CALL PaAsistClaseTb18_BuscarAsistClase($_GET[idA])";
$query = $con -> query($sql1);

if ($query -> num_rows > 0) {
	while ($asist = $query -> fetch_object()) {
		break;
	}
}
?>

<?php if($asist!=null):
?>

<form role="form" id="actualizar" method="post">
	<div class="form-group">
		<label for="IdAC">Id Asistencia</label>
		<input type="text" class="form-control" name="IdAC" value="<?php echo $asist -> Id; ?>" readonly>
	</div>
	<div class="form-group">
		<label for="Fecha">Fecha</label>
		<input type="text" class="form-control" name="IdAC" value="<?php echo $asist -> Fecha; ?>">
	</div>
	<div class="form-group">
		<label for="Hora">Hora</label>
		<input type="text" class="form-control" name="Hora" value="<?php echo $asist -> Hora; ?>">
	</div>
	<div class="form-group">
		<label for="Estado">Estado</label>
		<input type="text" class="form-control" name="Estado" value="<?php echo $asist -> Estado; ?>">
	</div>
	<div class="form-group">
		<label for="IdMateria">Id Materia</label>
		<input type="text" class="form-control" name="IdMateria" value="<?php echo $asist -> Id_Materia; ?>">
	</div>
	<input type="hidden" name="id" value="<?php echo $asist -> Id; ?>">
	<button type="submit" class="btn btn-default">
		Actualizar
	</button>
</form>

<script>
	$("#actualizar").submit(function(e) {
		e.preventDefault();
		$.post("./Controlador/AsistClase/ActualizarAsistClase.php", $("#actualizar").serialize(), function(status) {
		});
		$('#editModal').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();		  
	});

</script>

<?php else: ?>
<p class="alert alert-danger">
	No se encuentra
</p>
<?php endif; ?>
