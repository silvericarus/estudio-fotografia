<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Clientes | Estudio de Fotografía</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/main.css">
</head>
<body>
	<nav>
		<?php 
			include '../conectarServidor.php';
			menu("trabajos");
		?>
	</nav>
	<div id="searchbar">
		<<form name="buscarclientes" action="buscarClientes.php" method="get">
			<input type="text" name="textobusqueda" title="Nombre, Apellidos o Teléfono primario" required="required">
			<input type="submit"><br>
			<label for="nombre">Ordenar por nombre</label><input type="radio" name="orden" value="nombre" required="required"><br>
			<label for="apellidos">Ordenar por apellidos</label><input type="radio" name="orden" value="apellidos" required="required">
		</form>
	</div>
	<div class="content">
		<?php 

			$textobusqueda = $_GET["textobusqueda"];
			$orden = $_GET["orden"];

			$conector = conectarServer();
			/**
			 * Se busca en la consulta los clientes que cumplan
			 * con el término de búsqueda en nombre, apellidos, o 
			 * teléfono.
			 */
			$consulta = "SELECT * from clientes where nombre like '%$textobusqueda%' or apellidos like '%$textobusqueda%' or telefono1 like '%$textobusqueda%' or telefono2 like '%$textobusqueda%' order by $orden;";

			$datos = mysqli_query($conector,$consulta);
			if(mysqli_num_rows($datos)>0){
				$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				echo "<i>Mostrando clientes buscando por $textobusqueda :</i>";
				echo "<table border><tr><td>Nombre</td><td>Apellidos</td><td>Dirección</td><td>Teléfono</td><td>Teléfono 2</td><td>Nick</td><td>Contraseña</td><td>Editar cliente</td></tr>";

				while(!is_null($resultado)){
					echo "<tr><td>$resultado[nombre]</td><td>$resultado[apellidos]</td><td>$resultado[direccion]</td><td>$resultado[telefono1]</td><td>$resultado[telefono2]</td><td>$resultado[nick]</td><td>$resultado[contraseña]</td><td><form action=\"editarCliente.php\" method=\"get\">
				<input type='hidden' name='c' value='$resultado[id]'>
		<input type=\"submit\" name=\"editarCliente\" value=\"Editar\" class=\"botonEditar\">
	</form></td></tr>";
					$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				}

				
					
				

				echo "</table>";
		}else{
			echo "<h2 class=\"mensaje error\"><span>No se ha encontrado ningún resultado para $textobusqueda</span></h2>";
		}
		mysqli_close($conector);
		?>
	</div>
	<form action="crearNuevoCliente.php" method="post" class="botonCrear">
		<input type="submit" name="crearCliente" value="+">
	</form>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>