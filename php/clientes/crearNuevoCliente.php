<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear ficha de cliente | Estudio de Fotografía</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/main.css">
</head>
<body>
	<nav>
		<?php 
			include '../conectarServidor.php';
			menu("trabajos");
		?>
	</nav>
	<div class="form">
		<form action="crearCliente.php" method="post">
			<?php 

				$conector = conectarServer();

				/**
				 * Se obtiene el siguiente código 
				 * que se le va a asignar automáticamente 
				 * al nuevo usuario que crearás.
				 */
				$consulta = "SELECT AUTO_INCREMENT from information_schema.TABLES WHERE TABLE_SCHEMA = \"estudio\" and TABLE_NAME = \"clientes\";";

				$datos = mysqli_query($conector,$consulta);

				$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);

				echo "<span class=\"campo\"><label for=\"codigo\">Código</label><input type=\"text\" name=\"codigo\" value=\"$resultado[AUTO_INCREMENT]\" disabled></span><br>";
				mysqli_close($conector);
			?>
			<span class="campo"><label for="nombre">Nombre *</label><input type="text" name="nombre" maxlength="20" required="required"></span><br>
			<span class="campo"><label for="apellidos">Apellidos *</label><input type="text" name="apellidos" maxlength="50" required="required"></span><br>
			<span class="campo"><label for="direccion">Dirección *</label><textarea name="direccion" maxlength="100" required="required"></textarea></span><br>
			<span class="campo"><label for="telefono1">Teléfono 1 *</label><input type="text" name="telefono1" maxlength="9" minlength="9" required="required"></span><br>
			<span class="campo"><label for="telefono2">Teléfono 2 (Opcional)</label><input type="text" name="telefono2" maxlength="9" minlength="9"></span><br>
			<span class="campo"><label for="nick">Nick *</label><input type="text" name="nick" maxlength="20" required="required"></span><br>
			<span class="campo"><label for="contraseña">Contraseña *</label><input type="text" name="contraseña" maxlength="20" required="required"></span><br>
			<span class="campo"><input type="submit" value="Crear"></span>
		</form>
	</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>