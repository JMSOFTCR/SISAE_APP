<?php session_start(); 
session_destroy();
 ?>
<!DOCTYPE html>
<html>
<head>
<link href="Public/css/Login.css" rel="stylesheet">  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
   
<body>
<div class="container" style="text-align:center;">
<div class="login">
    <h1>Login</h1>
    <form method="post" action="index.php" id="log">
    	<input type="text" name="u" placeholder="Usuario" required="required" />
        <input type="password" name="p" placeholder="Contraseña" required="required" />
        <hr>                           
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>
</div>

<script type="text/javascript">

</script>
</body>
</html>
