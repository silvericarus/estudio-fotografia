<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Creando ficha de cliente | Estudio de Fotografía</title>
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
	<?php 
		/**
		 * Si hay algún dato que llegue desde el formulario, 
		 * se ejecuta todo, si no, se reenvía al usuario a clientes.php
		 * para evitar crear un usuario con datos en blanco por error.
		 */
		if (isset($_POST["nombre"])) {

			$nombre     = $_POST["nombre"];
			$apellidos  = $_POST["apellidos"];
			$direccion  = $_POST["direccion"];
			$telefono1  = $_POST["telefono1"];
			$telefono2  = $_POST["telefono2"];
			$nick       = $_POST["nick"];
			$contraseña = $_POST["contraseña"];

			$conector = conectarServer();

			if ($telefono2 == "") {
			$consulta = "INSERT into clientes VALUES (NULL,'$nombre','$apellidos','$direccion','$telefono1',NULL,'$nick','$contraseña');";
			}else{
				$consulta = "INSERT into clientes VALUES (NULL,'$nombre','$apellidos','$direccion','$telefono1','$telefono2','$nick','$contraseña');";
			}
			if(comprobarNickValido($nick)){
				if ($conector->query($consulta) === TRUE) {
			    echo "<h2 class=\"mensaje correcto\"><span>Cliente creado con éxito!</span></h2>";
				} else {
				    echo "<h2 class=\"mensaje error\"><span>Error al crear el cliente: " . $conector->error."</span></h2>";
				}
			}else{
				echo "<h2 class=\"mensaje error\"><span>Error al crear el cliente: El nick elegido ya existe.</span></h2>";
			}
			

			/**
			 * Luego de ejecutarlo, se esperan 5 segundos
			 * y se manda al usuario de nuevo a clientes.php.
			 */
			mysqli_close($conector);
			header("Refresh:5; url=clientes.php");
		}else{
			header("Location: clientes.php");
		}
		


	?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>