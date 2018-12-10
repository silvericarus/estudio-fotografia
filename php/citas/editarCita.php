<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Cita | Estudio de Fotografía</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="../../css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
	<nav>
		<?php 
			include '../conectarServidor.php';
			menu("citas");
		?>
	</nav>
	<?php 

		$id=$_GET["c"];

		$conector = conectarServer();

		$consulta = "SELECT * from citas where id = $id;";
		$consulta2 = "SELECT id,nombre from clientes;";

		$datos = mysqli_query($conector,$consulta);
		$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);

		$datos2 = mysqli_query($conector,$consulta2);
		$resultado2 = mysqli_fetch_array($datos2,MYSQLI_ASSOC);
		echo "<div class='form'>";
		echo "<form action='actualizarCita.php' method='post'><input type='hidden' name='c' value='$id'>";
		echo "<span class='campo'><label for='fecha'>Fecha</label><input type='date' name='fecha' value='$resultado[fecha]' required>";
		echo "<span class='campo'><label for='hora'>Hora</label><input type='number' name='hora' min='00' max='23' value='$resultado[hora]' required>";
		echo "<span class='campo'><label for='motivo'>Motivo</label><textarea name='motivo' maxlength='50' required>$resultado[motivo]</textarea>";
		echo "<span class='campo'><label for='lugar'>Lugar</label><textarea name='lugar' maxlength='100' required>$resultado[lugar]</textarea>";
		echo "<span class='campo'><label for='cliente'>Cliente</label><select name='cliente' required>";
		while(!is_null($resultado2)){
			if($resultado2['id'] == $resultado['id']){
				echo "<option value=\"$resultado2[id]\" selected>$resultado2[nombre]</option>";
			}else{
				echo "<option value=\"$resultado2[id]\">$resultado2[nombre]</option>";
			}
			
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