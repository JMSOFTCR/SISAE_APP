<?php require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/EncCl04.php';
session_start();
$enc = new EncCl04();
$result = $enc->BuscaEnc($_SESSION['usuario']);
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
<div class="container">
 <h2 class="page-header" style="background-color:#6b6bec;color:white;">
 	<?php foreach ($result as $r){echo $r['Nombre'],' ',$r['Apellido1'],' ',$r['Apellido2'];} ?>
 	</h2>
<form class="form-inline" style="margin-bottom:10px;float:left" id="desplegar">
<div class="form-group">
	<div class="form-group">
		<label for="est">Estudiante</label>
		<select id="est" name="estudiante" class="form-control">
		</select>
	</div>
<button class="btn btn-primary" type="submit" >Detalles</button>
</div>
</form>
<button class="btn btn-success" id="ausen" style="float:right">Ver Asistencia</button>
<div id="tabla"></div>
</div>


<script type="text/javascript">

function estudiante(){
	var param = {'idenc':<?php echo $_SESSION['usuario'];?>};
$.ajax({
	url:'Vista/Seg_Nivel/Nivel_3/CargarEstudiante.php',
	data:param,
	success:function(data){
		$('#est').html(data);
	}
});
}

estudiante();

$('#desplegar').submit(function(e){
	e.preventDefault();
	var para = {'idest':$('#est').val()};
	$.ajax({
		url:'Vista/Seg_Nivel/Nivel_3/TablaEncEst.php',
		data:para,
		success:function(data){
			$('#tabla').html(data)
		}
	});
});

$('#ausen').click(function(){
	var par = {'est':$('#est').val()}
	$.ajax({
		url:'Vista/Seg_Nivel/Nivel_3/TablaAusencias.php',
		data:par,
		success:function(data){
			$('#tabla').html(data);
		}
	});
});

</script>
  
</body>
</html>