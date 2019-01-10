<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Cliente | Estudio de Fotografía</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/main.css">
</head>
<body>
	
		<?php 
			include '../conectarServidor.php';
			menu("trabajos");
		?>
	
	<?php 

		$id=$_GET["c"];

		$conector = conectarServer();

		$consulta = "SELECT * from clientes where id = $id;";

		$datos = mysqli_query($conector,$consulta);

		$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
		echo "<div class=\"form\">";
		echo "<form action=\"actualizarCliente.php\" method=\"post\"><input type='hidden' name='c' value='$id'>";
		echo "<span class=\"campo\"><label for=\"nombre\">Nombre</label><input type=\"text\" name=\"nombre\" value=\"$resultado[nombre]\" maxlength=\"20\" required=\"required\"></span><br>";
		echo "<span class=\"campo\"><label for=\"apellidos\">Apellidos</label><input type=\"text\" name=\"apellidos\" value=\"$resultado[apellidos]\" maxlength=\"50\" required=\"required\"></span><br>";
		echo "<span class=\"campo\"><label for=\"direccion\">Dirección</label><input type=\"text\" name=\"direccion\" value=\"$resultado[direccion]\" maxlength=\"100\" required=\"required\"></span><br>";
		echo "<span class=\"campo\"><label for=\"telefono\">Teléfono 1</label><input type=\"text\" name=\"telefono\" value=\"$resultado[telefono1]\" maxlength=\"9\" minlength=\"9\" required=\"required\"></span><br>";
		echo "<span class=\"campo\"><label for=\"telefono2\">Teléfono 2 (Opcional)</label><input type=\"text\" name=\"telefono2\" value=\"$resultado[telefono2]\" maxlength=\"9\" minlength=\"9\"></span><br>";
		echo "<span class=\"campo\"><label for=\"nick\"><span>Nick</label><input type=\"text\" name=\"nick\" value=\"$resultado[nick]\" maxlength=\"20\" required=\"required\"></span><br>";
		echo "<span class=\"campo\"><label for=\"contraseña\">Contraseña</label><input type=\"text\" name=\"contraseña\" value=\"$resultado[contraseña]\" maxlength=\"20\" required=\"required\"></span><br>";
		echo "<span class=\"campo\"><input type=\"submit\" value=\"Modificar\"></span>";
		echo "</form>";
		echo "</div>";
		mysqli_close($conector);
	?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>