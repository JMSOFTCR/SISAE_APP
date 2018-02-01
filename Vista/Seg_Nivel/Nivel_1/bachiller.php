<html lang="en">
<head>
</head>
<body>
<div class="container">
          <h1 class="page-header" style="background-color:blue;color:white;">Bachiller</h1>
     <form class="form-inline" role="search" id="buscar">
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
    <label for="IdB">ID Bachiller</label>
    <input type="text" class="form-control" name="IdB">
  </div>
  <div class="form-group">
    <label for="NomB">Nombre Bachiller</label>
    <input type="text" class="form-control" name="NomB">
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
  $.post('Controlador/AgregarBachi.php',$('#agregar').serialize(),function(status){});
  $('#agregar')[0].reset();
  $('#Modal').modal('hide');
  $('#tabla').html('');
  CargarTabla();
});
function CargarTabla(){
  $('#tabla').load('Vista/Seg_Nivel/Nivel_1/TablaBachi.php');
}
CargarTabla();
$('#buscar').submit(function(e){
  e.preventDefault();
  $.get('Controlador/Bachiller/BuscarBachi.php',$('#buscar').serialize(),function(data){$('#tabla').html(data);});
});
</script>

</body>
</html>