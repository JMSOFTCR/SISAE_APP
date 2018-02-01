<html lang="en">
<head>
</head>
<body>
<div class="container">
          <h2 class="page-header" style="background-color:#6b6bec;color:white;">Profesores</h2>
     <form class="form-inline" role="search" id="buscar" style="float:left;">
      <div class="form-group">
        <input type="text" name="busqueda" class="form-control" placeholder="Buscar" onkeyup="bus();" id="busc">
      </div>
      <button type="submit" class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>
  <a data-toggle="modal" href="#Modal" class="btn btn-default">Agregar</a>
    </form>

<br>
  <!-- Modal -->
 <!-- Modal -->
  <div class="modal fade" id="Modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" id="agregar" method="post">
  <div class="form-group">
    <label for="cedula">Cedula</label>
    <input type="text" class="form-control" name="cedula" required="required">
  </div>
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" required="required">
  </div>
  <div class="form-group">
    <label for="Apellido1">1° Apellido</label>
    <input type="text" class="form-control" name="Apellido1" required="required">
  </div>
  <div class="form-group">
    <label for="Apellido2">2° Apellido</label>
    <input type="text" class="form-control" name="Apellido2" required="required">
  </div>
  <div class="form-group">
    <label for="Direccion">Domicilio</label>
    <input type="text" class="form-control" name="direccion" required="required">
  </div>
  <div class="form-group">
    <label for="Genero">Genero</label>
    <label><input type="radio" name="genero" value="F"> Femenino</label>
    <label><input type="radio" name="genero" value="M"> Masculino</label>
  </div>
  <div class="form-group">
    <label for="Telefono">Telefono</label>
    <input type="text" class="form-control" name="telefono">
  </div>
  <div class="form-group">
    <label for="email">Correo electronico</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label for="Clave">Contraseña</label>
    <input type="password" class="form-control" name="clave" required="required">
  </div>
  <div class="form-group">
  <label for="fecha_nac">Fecha de Nacimiento</label>
    <div class='input-group date' id='fecha'>
    <input type='date' class="form-control" name="fecha_nac" required="required">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-calendar"></span>
    </span>
    </div>
  </div>
  <div class="modal-footer">
          <button type="submit" class="btn btn-success">Agregar</button>         
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
  </div>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<div id="tabla">
  
</div>
</div>
<script type="text/javascript">
$('#agregar').submit(function(e){
  e.preventDefault();
  $.post('Controlador/Profesor/AgregarProf.php',$('#agregar').serialize(),function(data){
    if(data!=1){
      swal('Ups...', 'Algo salió mal!', 'error');
    }else{
  $('#agregar')[0].reset();
  $('#Modal').modal('hide');
  $('#tabla').html('');
  CargarTabla(1);
  swal('Agregado','El registro fue agregado.','success')
}
  });
});

function CargarTabla(pagina){
    var parametros = {"pagina":pagina};
    $("#animacion").fadeIn('slow');
    $.ajax({
      url:'Vista/Seg_Nivel/Nivel_1/TablaProf.php',
      data: parametros,
      success:function(data){
        $("#tabla").html(data).fadeIn('slow');
        $("#animacion").html("");
      }
    })
  }

$(document).ready(function(){
  CargarTabla(1);
});

function bus(){
  var par = {'busqueda':$('#busc').val()};
  $.ajax({
    url:"Controlador/Profesor/BuscarProf.php",
    data:par,
    success:function(data){
      $('#tabla').html(data);
    }
  })
}

</script>

</body>
</html>
