<?php require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/ProfCl03.php';
session_start();
$prof = new ProfCl03();
$result = $prof->BuscaProf($_SESSION['usuario']);
?>
<html lang="en">
<head>
</head>
<body>
<div class="container">
 <h2 class="page-header" style="background-color:#6b6bec;color:white;"><?php foreach ($result as $r){echo $r['Nombre'],' ',$r['Apellido1'],' ',$r['Apellido2'];} ?></h2>
<form class="form-inline" style="margin-bottom:10px;float:left" id="desplegar">
<div class="form-group">
<label for="materia">Materias</label>
<select id="mater" name="materia" class="form-control">
</select>
<label for="seccion">Secciones</label>
<select id="sec" name="seccion" class="form-control">
</select>
<button class="btn btn-primary" type="submit" >Desplegar lista</button>
</div>
</form>
<button class="btn btn-success" style="float:right" id="hist">Ver Historial</button>
<div id="tabla">
</div>
</div>
</body>
<script type="text/javascript">

function secciones(){
	var param = {'idMater':$('#mater').val(),'idProf':<?php echo $_SESSION['usuario'];?>};
$.ajax({
	url:'Vista/Seg_Nivel/Nivel_2/CargarSeccion.php',
	data:param,
	success:function(data){
		$('#sec').html(data);
	}
});
}

function materias(){
var param = {'ced':<?php echo $_SESSION['usuario'];?>};
$.ajax({
	url:'Vista/Seg_Nivel/Nivel_2/CargarMateria.php',
	data:param,
	success:function(data){
		$('#mater').html(data);
		secciones();
	}
});
}
materias();

$('#mater').change(function(){
var param = {'idMater':$('#mater').val(),'idProf':<?php echo $_SESSION['usuario'];?>};
$.ajax({
	url:'Vista/Seg_Nivel/Nivel_2/CargarSeccion.php',
	data:param,
	success:function(data){
		$('#sec').html(data);
	}
});
});

$('#desplegar').submit(function(e){
	e.preventDefault();
	var para = {'secc':$('#sec').val(),'idma':$('#mater').val()};
	$.ajax({
		url:'Vista/Seg_Nivel/Nivel_2/TablaAsistencia.php',
		data:para,
		success:function(data){
			$('#tabla').html(data)
		}
	});
});

$('#hist').click(function(){
	var par = {'secc':$('#sec').val(),'idma':$('#mater').val()};
	$.ajax({
		url:'Vista/Seg_Nivel/Nivel_2/TablaHistorial.php',
		data:par,
		success:function(data){
			$('#tabla').html(data)
		}
	});
});

</script>
</html>