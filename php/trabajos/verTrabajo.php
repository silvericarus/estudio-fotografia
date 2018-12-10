<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Trabajos | Estudio Fotográfico</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="../../css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../js/scroll.js"></script>
</head>
<body>
	<nav>
		<?php 
			include '../conectarServidor.php';
			menu("trabajos");
		?>
	</nav>
	<button title="Ir abajo" class="scrolldown">
        <i class="fas fa-chevron-down"></i>
    </button> 
	<div class="content">
		<?php 

			$conector = conectarServer();

			/**
			 * Se trae todos los datos de los trabajos
			 * para así mostrarlos ya si en detalle.
			 */
			$consulta = "SELECT t.id,t.titulo,t.descripcion,t.precio,t.imagen,c.nombre from trabajos t,clientes c where t.id_cliente = c.id and t.id = $_POST[t];";

			$datos = mysqli_query($conector,$consulta);

			$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);

			echo "<div>";
			echo "<img src=\"$resultado[imagen]\" alt=\"$resultado[titulo]\" width=\"800px\"><h2>$resultado[titulo]</h2>";
			echo "<p>$resultado[descripcion]<br>Precio:<b>$resultado[precio]</b></p></div>";
			mysqli_close($conector);
		?>
	</div>
	<button title="Ir arriba" class="scrollup">
        <i class="fas fa-chevron-up"></i>
    </button> 
</body>
</html>