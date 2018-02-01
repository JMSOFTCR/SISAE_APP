<?php
include "../conexion.php";

$sql1 = "CALL PaGradoTb13_BuscarGrado($_GET[id])";
$query = $con -> query($sql1);

if ($query -> num_rows > 0) {
	while ($grad = $query -> fetch_object()) {
		break;
	}
}
?>

<?php if($grad!=null):
?>

<form role="form" id="actualizar" method="post">
	<div class="form-group">
		<label for="idgrado">ID Grado</label>
		<input type="text" class="form-control" name="idgrado" value="<?php echo $grad -> idgrado; ?>" readonly>
	</div>
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" name="nombre" value="<?php echo $grad -> Nombre; ?>">
	</div>
	<div class="form-group">
		<label for="idbachi">ID Bachiller</label>
		<input type="text" class="form-control" name="idbachi" value="<?php echo $grad -> idbachi; ?>">
	</div>
	
	<input type="hidden" name="id" value="<?php echo $grad -> id; ?>">
	<button type="submit" class="btn btn-default">
		Actualizar
	</button>
</form>

<script>
	$("#actualizar").submit(function(e) {
		e.preventDefault();
		$.post("./Controlador/Grado/ActualizarGrado.php", $("#actualizar").serialize(), function(status) {
		});
		$('#Modal_Editar').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();		  
	});

</script>

<?php else: ?>
<p class="alert alert-danger">
	No se encuentra
</p>
<?php endif; ?>
