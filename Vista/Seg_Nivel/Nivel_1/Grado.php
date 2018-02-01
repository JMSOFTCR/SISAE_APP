<html lang="en">
<head>
</head>
<body>
<div class="container">
          <h1 class="page-header" style="background-color:blue;color:white;">Grado</h1>
     <form class="form-inline" role="search" id="buscar" style="float:left;">
      <div class="form-group">
        <input type="text" name="busqueda" class="form-control" placeholder="Buscar">
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
    <label for="idgrado">ID Grado</label>
    <input type="text" class="form-control" name="idgrado">
  </div>
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre">
  </div>
  <div class="form-group">
    <label for="idbachi">ID Bachiller</label>
    <input type="text" class="form-control" name="idbachi">
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
  $.post('Controlador/Grado/AgregarGrado.php',$('#agregar').serialize(),function(status){});
  $('#agregar')[0].reset();
  $('#Modal').modal('hide');
  $('#tabla').html('');
  CargarTabla();
});

function CargarTabla(pagina){
    var parametros = {"pagina":pagina};
    $("#animacion").fadeIn('slow');
    $.ajax({
      url:'Vista/Seg_Nivel/Nivel_1/TablaGrado.php',
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

$('#buscar').submit(function(e){
  e.preventDefault();
  $.get('Controlador/Grado/BuscarGrado.php',$('#buscar').serialize(),function(data){$('#tabla').html(data);});
});
</script>

</body>
</html>