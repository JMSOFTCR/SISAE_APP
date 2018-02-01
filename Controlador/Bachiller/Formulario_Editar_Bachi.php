<?php
include "../conexion.php";

$sql1 = "CALL PaBachillerTb14_BuscarBachiller($_GET[id])";
$query = $con -> query($sql1);

if ($query -> num_rows > 0) {
	while ($bchi = $query -> fetch_object()) {
		break;
	}
}
?>

<?php if($bchi!=null):
?>

<form role="form" id="actualizar" method="post">
	<div class="form-group">
		<label for="IdB">ID</label>
		<input type="text" class="form-control" name="IdB" value="<?php echo $bchi -> ID; ?>" readonly>
	</div>
	<div class="form-group">
		<label for="NomB">Nombre</label>
		<input type="text" class="form-control" name="NomB" value="<?php echo $bchi -> Nombre; ?>">
	</div>
	
	<input type="hidden" name="id" value="<?php echo $bchi -> id; ?>">
	<button type="submit" class="btn btn-default">
		Actualizar
	</button>
</form>

<script>
	$("#actualizar").submit(function(e) {
		e.preventDefault();
		$.post("./Controlador/Bachiller/ActualizarBachi.php", $("#actualizar").serialize(), function(status) {
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
