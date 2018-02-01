<?php require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/conexion.php'; 
$id_sec = $_REQUEST['secc'];
$mater = $_REQUEST['idma'];
$con = new conexion();
$resultado = $con->query("CALL PaSecEstTb28_Listar_Asist(\"$id_sec\")");
$cont = 0;
?>
<table class="table table-bordered table-hover" style="font-size:13px;">
<thead>
  <th>P</th>
  <th>A</th>
  <th>J</th>
  <th>Nombre</th>
  <th>1° Apellido</th>
  <th>2° Apellido</th>
  <th>Cedula</th>
</thead>
<?php while ($r=$resultado->fetch_array()):?>
<tr>
	  <?php $cont++;?>
   <td><label class="cont"><input type="radio" value="Presente:<?php echo $r['Cedula'];?>" id="" name="<?php echo $cont;?>"><span class="checkmark"></span></label></td>
   <td><label class="cont"><input type="radio" value="Ausente:<?php echo $r['Cedula'];?>" id="" name="<?php echo $cont;?>"><span class="checkmark"></span></label></td>
   <td><label class="cont"><input type="radio" value="Justificado:<?php echo $r['Cedula'];?>" id="" name="<?php echo $cont;?>"><span class="checkmark"></span></label></td>
  <td><?php echo $r["Nombre"]; ?></td>
  <td><?php echo $r["Apellido1"]; ?></td>
  <td><?php echo $r["Apellido2"]; ?></td>
  <td><?php echo $r["Cedula"]; ?></td>
</tr>
<?php endwhile;?>
</table>

<button class="btn btn-success" id="proce">Procesar</button>

<script type="text/javascript">
	$('#proce').click(function(){
    var param='';
    swal({
        title: 'Está seguro?',
        text: "Se guardara la lista!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Guardar!',
        }).then(function(){
          for(var i=1;i<= <?php echo $cont;?>;i++){
            param += $("input:radio[name="+i+"]:checked").val()+';';
          }
            var env = {'est':param, 'idma':'<?php echo $mater;?>'}
           $.ajax({
            url:'Vista/Seg_Nivel/Nivel_2/GuardarAsistencia.php',
            data:env,
            success:function(data){
              if(data!=1){swal('Algo salio mal','No se pudo guardar','error');}
              else if(data=1){swal('Guardada','La lista se guardo exitosamente','success');
              $('#tabla').html('');
            }
            }
            });
        });
  });
</script>