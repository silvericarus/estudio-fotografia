<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Estudio de Fotografía</title>
	<link rel="icon" href="img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/contextmenu.js"></script>
	<script type="text/javascript" src="js/scroll.js"></script>
	<script type="text/javascript" src="js/mostrarAyuda.js"></script>
</head>
<body>
	<nav>
		<?php 
			include 'php/conectarServidor.php';
			/**
			 * Se llama a la función que crea el menú con / como parámetro 'ruta'.
			 */
			menu("/");
		?>
	</nav>
	<button title="Ir abajo" class="scrolldown">
        <i class="fas fa-chevron-down"></i>
    </button> 
    <?php 
    	mapaweb("/");
     ?>
	<div class="content">
		<?php 
			$conector = conectarServer();

			$files = array_slice(scandir('img/trabajos'), 2);

			$archivo = rand(0,sizeof($files)-1);

			echo "<img src='img/trabajos/$files[$archivo]' alt='Trabajo aleatorio' width='500px'><br>";

			$currenttimestamp = date("Y-m-d");

			$consulta = "SELECT id,imagen,titular from noticias where fecha <= '$currenttimestamp'  order by fecha desc limit 0,3";

			$datos = mysqli_query($conector,$consulta);


			$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);

			while (!is_null($resultado)) {
				echo "<div class='noticiap'><img src='img/noticias/$resultado[imagen]' alt='$resultado[titular]' width='250px'><br><b>$resultado[titular]</b><form action='php/noticias/verNoticia.php' method='post'>
				<input type='hidden' name='n' value='$resultado[id]'>
		<input type='submit' name='verNoticia' value='Ver' class='botonEditar'>
	</form></div>";
				$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
			}
			mysqli_close($conector);
		?>
	</div>
	<?php 
		contextmenu('/');
	?>
	<button title="Ir arriba" class="scrollup">
        <i class="fas fa-chevron-up"></i>
    </button>
    	<?php 
    		footer("/");
    	 ?>
</body>
</html>