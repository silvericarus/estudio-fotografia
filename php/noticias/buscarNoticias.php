<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Noticias | Estudio de Fotografía</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="../../css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script type="text/javascript" src="../../js/confirmarBorrado.js"></script>
</head>
<body>
	<nav>
		<?php 
			include '../conectarServidor.php';
			menu("noticias");
		?>
	</nav>
	<div id="searchbar">
		<form name='buscarnoticias' action='buscarNoticias.php' method='get'>
			<input type='text' name='textobusqueda' title="Titular o Fecha de activación en formato 30/12/1996" required="required">
			<input type='submit'><br>
			<label for="titular">Ordenar por titular</label><input type="radio" name="orden" value="titular" required="required"><br>
			<label for="fecha">Ordenar por fecha</label><input type="radio" name="orden" value="fecha" required="required">
		</form>
	</div>
	<div class="content">
		<?php 

			$textobusqueda = $_GET["textobusqueda"];
			$orden = $_GET["orden"];

			/**
			 * Transformamos el resultado del formulario en caso de que sea una fecha de un formato amigable al usuario	a un formato amigable a la base de datos.
			 */
			if (strpos($textobusqueda,"/")!=FALSE) {
				$textobusqueda = convertirFecha($textobusqueda,false);
			}

			$conector = conectarServer();
			/**
			 * Se busca en la consulta las noticias que cumplan
			 * con el término de búsqueda en titular o fecha de activación, ordenados por titular o fecha de activación.
			 */
			$consulta = "SELECT id,imagen,titular from noticias where (titular like '%$textobusqueda%' or fecha like '%$textobusqueda%') order by $orden;";

			$datos = mysqli_query($conector,$consulta);
			if(mysqli_num_rows($datos)>0){
				$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				$textobusqueda = convertirFecha($textobusqueda,true);
				echo "<i>Mostrando noticias buscando por $textobusqueda :</i>";
				echo "<table><tr><td>Imagen</td><td>Títular</td><td>Ver más</td><td>Borrar Noticia</td></tr>";

				while(!is_null($resultado)){
					echo "<tr><td><img src=\"../../img/noticias/$resultado[imagen]\" alt=\"$resultado[titular]\" width=\"40px\"></td><td>$resultado[titular]</td><td><form action=\"verNoticia.php\" method=\"post\">
					<input type='hidden' name='n' value='$resultado[id]'>
		<input type=\"submit\" name=\"verNoticia\" value=\"Ver\" class=\"botonEditar\">
	</form></td><td><input type=\"button\" name=\"borrarCita\" value=\"Borrar\" onClick=\"confirmDelete('noticias','borrarNoticia.php?n=$resultado[id]')\"></td></tr>";
					$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				}

				
					
				

				echo "</table>";
		}else{
			echo "<h2 class=\"mensaje error\"><span>No se ha encontrado ningún resultado para $textobusqueda</span></h2>";
		}
		mysqli_close($conector);
		?>
	</div>
	<form action="crearNuevaNoticia.php" method="post" class="botonCrear">
		<input type="submit" name="crearNoticia" value="+">
	</form>
</body>
</html>