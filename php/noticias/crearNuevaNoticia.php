<?php 
session_start();
include '../conectarServidor.php'; 
$userId = getId();

if (checkID($userId,"admin")==-1) {
	header("Location:../../login.php");
}elseif (checkID($userId,"admin")==0) {
	header("Location:../../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear Noticia | Estudio de Fotografía</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/main.css">
</head>
<body>
	
		<?php 
			menu("noticias",$userId);
		?>
	<div class="container">
		<div class="row">
			<div class="col-6 offset-3 bg-dark text-light">
				<?php 
					$conector = conectarServer();
					/**
					* Se obtiene el siguiente código 
					* que se le va a asignar automáticamente 
					* a la nueva noticia que crearás.
					*/
						
					$consulta = "SELECT AUTO_INCREMENT from information_schema.TABLES WHERE TABLE_SCHEMA = \"estudio\" and TABLE_NAME = \"noticias\";";

					$datos = mysqli_query($conector,$consulta);
					$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);

					echo "<form action=\"crearNoticia.php\" method=\"post\" enctype=\"multipart/form-data\">
					<input type='hidden' name='n' value='$resultado[AUTO_INCREMENT]'>";

					echo "<div class='form-row'><div class='form-group col-12'><label for=\"codigo\">Código</label><input type=\"text\" name=\"codigo\" value=\"$resultado[AUTO_INCREMENT]\" disabled></div></div>";
					mysqli_close($conector);
					?>
					<div class='form-row'>
						<div class='form-group col-4'>
							<label for="titular">Títular</label>
							<input type="text" name="titular" maxlength="100" required="required">
						</div>
						<div class='form-group col-8'>
							<label for="contenido">Contenido</label>
							<textarea name="contenido" maxlength="1000" required="required"></textarea>
						</div>
					</div>
					<div class='form-row'>
						<div class='form-group col-8'>
							<label for="imagen">Archivo</label>
							<input type="file" name="imagen" accept=".png,.jpg" required="required">
						</div>
						<div class='form-group col-4'>
							<label for="fecha">Fecha de activación</label>
							<input type="date" name="fecha" required="required">
						</div>
					</div>
					<div class='form-row'>
						<div class='form-group col-6 offset-3'>	
							<button type="submit" value="Crear" class='btn btn-light btn-block'>Crear</button>
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