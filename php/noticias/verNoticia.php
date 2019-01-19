<?php 
session_start();			
include '../conectarServidor.php';
$userId = getId();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Noticias | Estudio Fotográfico</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/main.css">
</head>
<body>
	
		<?php 

			menu("trabajos",$userId);
		?>
	
	<div class="content">
		<?php 

			$conector = conectarServer();

			/**
			 * Se trae todos los datos de la noticia
			 * para así mostrarlos ya si en detalle.
			 */
			$consulta = "SELECT id,titular,contenido,imagen,fecha from noticias where  id = $_POST[n];";

			$datos = mysqli_query($conector,$consulta);

			$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
			$resultado["fecha"] = convertirFecha($resultado["fecha"],true);
			echo "<div class='container'><div class='row'><div class=\"noticia col-6 offset-3 bg-dark\">";
			echo "<h2>$resultado[titular]</h2><br><img src=\"../../img/noticias/$resultado[imagen]\" alt=\"$resultado[titular]\" width=\"400px\" align=\"left\" hspace=\"20\">";
			echo "<p>$resultado[contenido]<br></p><span id=\"noticia-foot\">Publicado el $resultado[fecha]</span></div></div></div>";
			mysqli_close($conector);
		?>
	</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>