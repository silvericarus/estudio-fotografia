<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Iniciar Sesión | Estudio de Fotografía</title>
	<link rel="icon" href="img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php
	if (isset($_POST["Enviar"])) {
		
		include 'php/conectarServidor.php';

		$conector = conectarServer();

		$user = $_POST["usuario"];
		$pass = $_POST["pass"];

		$consulta1 = "SELECT id from clientes where nick = '$user' and contraseña = '$pass'";

		$datos = mysqli_query($conector,$consulta1);

		$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);

		if(mysqli_num_rows($datos)==0){
			header("Refresh:0; url=login.php?nologin=1");
		}else{
			$_SESSION["id"] = $resultado["id"];
			if (!empty($_POST["recordar"])) {
				$datossession = session_encode();
				setcookie("idsession",$datossession,time()+2629746,"/");
			}
			header("Refresh:3; url=index.php");
		}

	}
	if (isset($_GET["nologin"])) {
		echo "<div class=\"alert alert-danger\" role=\"alert\">
  El usuario o la contraseña no son correctos! Prueba a introducir de nuevo los datos.
</div>";
	}
?>
	<div class="container">
		<div class="row">
			<div class="col-6 offset-3 border mt-5 bg-secondary">
				<h4 class="mx-auto pt-2" style="text-align: center;">Inicio de Sesión</h4>
				<img src="img/photograph.svg" class="rounded-circle mx-auto" width="60px" style="display: block;">
				<form action="#" method="post" name="login">
					<div class="form-group">
    					<label for="usuario">Nombre de usuario</label>
    					<input type="text" class="form-control" id="usuario" placeholder="Introduce tu nombre de usuario" name="usuario">
  					</div>
  					<div class="form-group">
    					<label for="pass">Contraseña</label>
    					<input type="password" class="form-control" id="pass" placeholder="Introduce tu contraseña" name="pass">
						<div class="form-group form-check">
    						<input type="checkbox" class="form-check-input" id="recordar" name="recordar">
    						<label class="form-check-label" for="recordar">Recordarme</label>
  						</div>
  						<button type="submit" class="btn btn-dark" name="Enviar">Enviar</button>
  					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>