<html lang="en">
  <head></head>
  <body>
    <div class="container">
        <h1 class="page-header" style="background-color:blue;color:white;">Horarios</h1>
        <form class="form-inline" role="search" id="buscar" style="float:left;">
          <div class="form-group">
            <input type="text" name="busqueda" class="form-control" placeholder="Buscar">
          </div>
          <button type="submit" class="btn btn-default">
            &nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;
          </button>
          <a data-toggle="modal" href="#Modal" class="btn btn-default">Agregar</a>
        </form>

        <br>
        <!-- Modal -->
        <!-- Modal -->
        <div class="modal fade" id="Modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times; </button>
                <h4 class="modal-title">Agregar</h4>
              </div>
              <div class="modal-body">
                <form role="form" id="agregar" method="post">
                  <div class="form-group">
                    <label for="seccion">Seccion</label>
                    <select name="seccion" class="form-control">
                      <?php
                      include "C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php";
                      $query = $con -> query("CALL PaSeccionTb20_Listar_Todos()");
                      while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="' . $valores["ID_Seccion"] . '">' . $valores["Grado"],"-",$valores["Num_grupo"] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="dia">Dia</label>
                    <select name="dia" class="form-control">
                      <option value="Lunes">Lunes</option>
                      <option value="Martes">Martes</option>
                      <option value="Miercoles">Miercoles</option>
                      <option value="Jueves">Jueves</option>
                      <option value="Viernes">Viernes</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Hora_Inicio">Hora Inicio</label>
                    <select name="Hora_Inicio" class="form-control">
                      <option value="07:00">07:00</option>
                      <option value="07:40">07:40</option>
                      <option value="08:25">08:25</option>
                      <option value="09:05">09:05</option>
                      <option value="10:00">10:00</option>
                      <option value="10:40">10:40</option>
                      <option value="12:10">12:10</option>
                      <option value="12:50">12:50</option>
                      <option value="01:45">01:45</option>
                      <option value="02:25">02:25</option>
                      <option value="03:10">03:10</option>
                      <option value="03:50">03:50</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Hora_Fin">Hora Fin</label>
                    <select name="Hora_Fin" class="form-control">
                
                      <option value="07:40">07:40</option>
                      <option value="08:20">08:20</option>
                      <option value="09:05">09:05</option>
                      <option value="09:45">09:45</option>
                      <option value="10:40">10:40</option>
                      <option value="11:20">11:20</option>
                      <option value="12:50">12:50</option>
                      <option value="01:30">01:30</option>
                      <option value="02:25">02:25</option>
                      <option value="03:05">03:05</option>
                      <option value="03:45">03:45</option>
                      <option value="04:30">04:30</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="materia">Materia</label>
                     <select name="materia" class="form-control" id="Mater" >
                      <?php
                      include "C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php";
                      $query = $con -> query("CALL PaMateriaTb17_Listar_Todos()");
                      while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="' . $valores["Id"] . '">' . $valores["Nombre"] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="profesor">Profesor</label>
                  <select name="profesor" class="form-control" id="prof">
                     
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                      Agregar
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                      Cancelar
                    </button>
                  </div>
                </form>
              </div>

            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


<?php include "C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php";

$sql = $con -> query("CALL PaSeccionTb20_Listar_Todos()");
?>
<div class="container" style="float:right">
<ul class="nav nav-pills">
<?php 
  while($secciones = $sql->fetch_array()):?>
<li class="btn btn-xs btn-warning"><a data-id="<?php echo $secciones[ID_Seccion];?>" onclick="horarios();" href="#" style="color:red"><?php echo $secciones['Grado'],"-",$secciones['Num_grupo'];?></a></li>
<?php endwhile;?>
</ul>
</div>

<div id="tabla">

</div>
    </div>
    <script type="text/javascript">
      $('#agregar').submit(function(e) {
        e.preventDefault();
        $.post('Controlador/Estudiante/AgregarEst.php', $('#agregar').serialize(), function(data) {
        if(!data){alert("Se produjo un error");}
        else{
        $('#agregar')[0].reset();
        $('#Modal').modal('hide');
        $('#tabla').html('');
        CargarTabla();}
        });
        
      });

  function CargarTabla(pagina){
    var parametros = {"pagina":pagina};
    $("#animacion").fadeIn('slow');
    $.ajax({
      url:'Vista/Seg_Nivel/Nivel_1/TablaHorarios.php',
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

      $('#buscar').submit(function(e) {
        e.preventDefault();
        $.get('Controlador/Estudiante/BuscarEst.php', $('#buscar').serialize(), function(data) {
          $('#tabla').html(data);
        });
      });

    $('#Mater').change(function(){
      var param = {'idm':$('#Mater').val()};
   $.ajax({
    url:"Controlador/Horarios/Profesor_Materia.php",
    data:param,
    success:function(data){
     $('#prof').html(data);
     }
   });
    }); 
    </script>
  </body>
</html>
