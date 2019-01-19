<?php 
session_start();
include '../conectarServidor.php';
$userId = getId();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear cita | Estudio de Fotografía</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/main.css">
</head>
<body>
	
		<?php
			menu("citas",$userId);
		?>
	
		<div class="container">
			<div class="row">
				<div class="col-6 offset-3 bg-dark text-light">
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

					echo "<div class='form-row'><div class='form-group col-12'><label for=\"codigo\">Código</label><input type=\"text\" name=\"codigo\" value=\"$resultado[AUTO_INCREMENT]\" disabled></div></div>";
					?>

					<div class='form-row'>
						<div class='form-group col-6'>
							<label for="motivo">Motivo</label><input type="text" name="motivo">
						</div>
						<div class='form-group col-6'>
							<label for="lugar">Lugar</label><input type="text" name="lugar">
						</div>
					</div>
					<div class='form-row'>
						<div class='form-group col-4'>
							<label for="fecha">Fecha</label><input type="date" name="fecha">
						</div>
						<div class='form-group col-4'>
							<label for="hora">Hora</label><input type="time" name="hora">
						</div>
						<div class='form-group col-4'>
							<label for="id_cliente">Cliente</label><select name="id_cliente">
							<?php 
							while(!is_null($resultado2)){
								echo "<option value=\"$resultado2[id]\">$resultado2[nombre]</option>";
								$resultado2 = mysqli_fetch_array($datos2,MYSQLI_ASSOC);
							}
							mysqli_close($conector);
							?>
							</select>
						</div>
					</div>
					<div class='form-row'>
						<div class='form-group col-12'>
							<input type="submit" value="Crear" class="btn btn-light btn-block">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>