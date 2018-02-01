<?php require_once 'C:/xampp/htdocs/SISAE_APP/Modelo/ProfCl03.php';
session_start();
if(!isset($_POST['u']) || !isset($_POST['p'])){if(!isset($_SESSION['usuario']) || !isset($_SESSION['contraseña'])){header('Location:Login.php');}}else{$_SESSION['usuario'] = $_POST['u'];$_SESSION['contraseña'] = $_POST['p'];}
$query = "CALL PaSeguridadTb31_Validar_Usu(\"$_SESSION[usuario]\",\"$_SESSION[contraseña]\")";
$con = new Conexion();
$result = $con->query($query);
$funciones=array();
$iconos=array();
$sidenav=array();
while($r=$result->fetch_array()){
$funciones[] = $r['Funcion'];
$iconos[] = $r['Iconos'];
$sidenav[] = $r['SideNav'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SISAE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="Public/css/dash.css" rel="stylesheet">
    <script src="assets/SweetAlert/js/sweetalert2.min.js"></script>
    <link href="assets/SweetAlert/css/sweetalert2.min.css" rel="stylesheet">
    <script type="text/javascript">
<?php foreach ($funciones as $fun) {
  echo $fun;
}?>
    </script>
  </head>
  <body onload="principal();">
 <div id="header">
 <a href="Login.php" data-toggle="tooltip" data-placement="bottom" title="Cerrar Sesion" class="glyphicon glyphicon-log-out"></a>
 <p>Bienvenido</p>
 </div>

<div class="sidebar" style="background-color:#1a2127;">
<span style="font-size:30px;cursor:pointer;color:white;right:5px;" id="hamb" onclick="openNav()">&#9776;</span>
<div>
<?php foreach ($iconos as $icon) {
  echo $icon;
} ?>
 </div>
 </div>
 <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php foreach ($sidenav as $sid) {
    echo $sid;
  } ?>
</div>
<div id="contenido">
</div>
  </body>
  <script>
function openNav() {
    document.getElementById("mySidenav").style.width = "150px";
    document.getElementById("contenido").style.marginLeft = "150px";
    
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("contenido").style.marginLeft= "0";
    document.getElementById("hamb").style.display = "block";
}
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
</html>
            
