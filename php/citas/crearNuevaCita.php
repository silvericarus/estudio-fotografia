<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear cita | Estudio de Fotografía</title>
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
	<div class="form">
		<?php 
			$conector = conectarServer();
			/**
			* Se obtiene el siguiente código 
			* que se le va a asignar automáticamente 
			* a la nueva cita que crearás.
			*/
				
			$consulta = "SELECT AUTO_INCREMENT from information_schema.TABLES WHERE TABLE_SCHEMA = \"estudio\" and TABLE_NAME = \"citas\";";
			$consulta2 = "SELECT id,nombre from clientes;";

			$datos = mysqli_query($conector,$consulta);
			$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);

			$datos2 = mysqli_query($conector,$consulta2);
			$resultado2 = mysqli_fetch_array($datos2,MYSQLI_ASSOC);

			echo "<form action=\"crearCita.php\" method=\"post\"><input type='hidden' name='c' value='$resultado[AUTO_INCREMENT]'>";

			echo "<span class=\"campo\"><label for=\"codigo\">Código</label><input type=\"text\" name=\"codigo\" value=\"$resultado[AUTO_INCREMENT]\" disabled></span><br>";
			?>

			<span class="campo"><label for="motivo">Motivo</label><input type="text" name="motivo"></span><br>
			<span class="campo"><label for="lugar">Lugar</label><input type="text" name="lugar"></span><br>
			<span class="campo"><label for="fecha">Fecha</label><input type="date" name="fecha"></span><br>
			<span class="campo"><label for="hora">Hora(Valores aceptados:00 a 23)</label><input type="number" name="hora" min="00" max="23"></span><br>
			<span class="campo"><label for="id_cliente">Cliente</label><select name="id_cliente">
				<?php 
					while(!is_null($resultado2)){
						echo "<option value=\"$resultado2[id]\">$resultado2[nombre]</option>";
						$resultado2 = mysqli_fetch_array($datos2,MYSQLI_ASSOC);
					}
					mysqli_close($conector);
				?>
			</select></span><br>
			<span class="campo"><input type="submit" value="Crear"></span>
		</form>
	</div>
</body>
</html>