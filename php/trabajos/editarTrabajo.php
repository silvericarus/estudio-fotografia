<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Trabajo | Estudio de Fotografía</title>
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

		$id=$_POST["t"];

		$conector = conectarServer();

		$consulta = "SELECT t.titulo from trabajos t where t.id = $id;";
		$consulta2 = "SELECT id,nombre from clientes;";

		$datos = mysqli_query($conector,$consulta);
		$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);

		$datos2 = mysqli_query($conector,$consulta2);
		$resultado2 = mysqli_fetch_array($datos2,MYSQLI_ASSOC);
		echo "<div class=\"form\">";
		echo "<form action=\"actualizarTrabajo.php\" method=\"post\"><input type='hidden' name='t' value='$id'>";
		echo "<span class=\"campo\"><label for=\"propietario\">Cliente al que se ha vendido el trabajo $resultado[titulo]</label><select name=\"propietario\">";
		while(!is_null($resultado2)){
			echo "<option value=\"$resultado2[id]\">$resultado2[nombre]</option>";
			$resultado2 = mysqli_fetch_array($datos2,MYSQLI_ASSOC);
		}
		echo "</select></span><br>";
		echo "<span class=\"campo\"><input type=\"submit\" value=\"Modificar\"></span>";
		echo "</form>";
		echo "</div>";
		mysqli_close($conector);
	?>
</body>
</html>