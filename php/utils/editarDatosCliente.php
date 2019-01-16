<?php 
session_start();

include '../conectarServidor.php';

$userId = getId();

$conector = conectarServer();

$consulta1 = "SELECT nombre,apellidos, apellidos, direccion, telefono1, telefono2, nick, contraseña FROM clientes WHERE id = '$userId'";

$datos = mysqli_query($conector,$consulta1);

$resul = mysqli_fetch_assoc($datos);

if (isset($_POST["Enviar"])) {
	if(isset($_POST["telefono2"])){
		$consulta2 = "UPDATE clientes SET direccion='$_POST[direccion]',telefono1='$_POST[telefono1]',telefono2='$_POST[telefono2]',contraseña='$_POST[pass]' where id = '$userId'";
		$update = mysqli_query($conector,$consulta2);

		if ($update) {
			header("Location:datos.php?edit=1");
		}else{
			header("Location:datos.php?edit=0");
		}
	}else{
		$consulta2 = "UPDATE clientes SET direccion='$_POST[direccion]',telefono1='$_POST[telefono1]',telefono2=NULL,contraseña='$_POST[pass]' where id = '$userId'";
		mysqli_query($conector,$consulta2);

		$update = mysqli_query($conector,$consulta2);

		if ($update) {
			header("Location:datos.php?edit=1");
		}else{
			header("Location:datos.php?edit=0");
		}
	}
}
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo "Editar Perfil de $resul[nombre] $resul[apellidos] | Estudio de Fotografía"; ?></title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../js/scroll.js"></script>
	<script type="text/javascript" src="../../js/mostrarAyuda.js"></script>
	<link rel="stylesheet" href="../../css/main.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
				<?php
					/**
					 * Se llama a la función que crea el menú con php como parámetro 'ruta'
					 */
					menu("php",$userId);
				?>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-8 offset-2 border mt-5 bg-secondary">
				<div style="display: flex;justify-content: space-around;">
					<div style="
    					width: 200px;
    					height: 91px;
    					margin-top: -10px;">
					<img src="../../img/stock.jpg" style="object-fit: scale-down; object-position: center; 
						width: inherit;">
					</div>
					
				</div>
				
				<div style="margin-top: 53px;">
					<form action="#" method="post" name="editarDatosCliente">
  						<fieldset>
    						<div class="form-group">
      							<label for="direccion">Dirección</label>
      							<?php echo "<input type=\"text\" name=\"direccion\" id=\"direccion\" class=\"form-control\" value=\"$resul[direccion]\">"; ?>
      							<label for="telefono1">Teléfono 1</label>
      							<?php echo "<input type=\"text\" name=\"telefono1\" id=\"telefono1\" class=\"form-control\" value=\"$resul[telefono1]\">"; ?>
      							<label for="telefono2">Teléfono 2 (Opcional)</label>
      							<?php echo "<input type=\"text\" name=\"telefono2\" id=\"telefono2\" class=\"form-control\" value=\"$resul[telefono2]\">"; ?>
      							<label for="pass">Contraseña</label>
      							<?php echo "<input type=\"text\" name=\"pass\" id=\"pass\" class=\"form-control\" value=\"$resul[contraseña]\">"; ?>
  						</fieldset>
  						<button type="submit" name="Enviar" class="btn btn-light mb-3">
							<i class="fas fa-user-edit"></i>
							<span class="text-dark">Guardar</span>
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>