<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizando Cliente | Estudio de Fotografía</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="../../css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
		 * Se almacenan los datos recibidos desde el formulario,
		 * y el id que le pasamos por la url.
		 */
		if (isset($_POST["nombre"])) {
			$nombre = $_POST["nombre"];
			$apellidos = $_POST["apellidos"];
			$direccion = $_POST["direccion"];
			$telefono = $_POST["telefono"];
			$telefono2 = $_POST["telefono2"];
			$nick = $_POST["nick"];
			$contraseña = $_POST["contraseña"];
			$id = $_GET["c"];

			$conector = conectarServer();

			if ($telefono2 == "") {
				$consulta = "UPDATE clientes SET nombre = '$nombre', apellidos = '$apellidos', direccion = '$direccion', telefono1 = '$telefono', telefono2 = NULL, nick = '$nick', contraseña = '$contraseña' where id = $id;";
			}else{
				$consulta = "UPDATE clientes SET nombre = '$nombre', apellidos = '$apellidos', direccion = '$direccion', telefono1 = '$telefono', telefono2 = '$telefono2', nick = '$nick', contraseña = '$contraseña' where id = $id;";
			}
			

			if ($conector->query($consulta) === TRUE) {
			    echo "<h2 class=\"mensaje correcto\"><span>Cliente actualizado con éxito!</span></h2>";
			} else {
			    echo "<h2 class=\"mensaje error\"><span>Error al actualizar el cliente: " . $conector->error."</span></h2>";
			}

			mysqli_close($conector);
			header("Refresh:5; url=clientes.php");
		}else{
			header("Location: clientes.php");
		}
	?>
</body>
</html>