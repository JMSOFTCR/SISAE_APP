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
  <h3>Cominicados</h3>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Inicio</a></li>
    <li><a data-toggle="tab" href="#menu1">Generales</a></li>
    <li><a data-toggle="tab" href="#menu2">Especificos</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Inicio</h3>
      <label>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</label>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Generales</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Especificos</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
<div id="tabla">
</div>
</div>
</body>
<script type="text/javascript">

</script>
</html>