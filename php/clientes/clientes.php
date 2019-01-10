<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Clientes | Estudio de Fotografía</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/main.css">
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../js/contextmenu.js"></script>
	<script type="text/javascript" src="../../js/mostrarAyuda.js"></script>
</head>
<body>
	
		<?php 
			include '../conectarServidor.php';
			/**
			 * Se llama a la función que crea el menú con clientes como parámetro 'ruta'.
			 */
			menu("clientes");
		?>
	
	<div id="searchbar">
		<form name="buscarclientes" action="buscarClientes.php" method="get">
			<input type="text" name="textobusqueda" title="Nombre, Apellidos o Teléfono primario" required="required">
			<input type="submit"><br>
			<label for="nombre">Ordenar por nombre</label><input type="radio" name="orden" value="nombre" required="required"><br>
			<label for="apellidos">Ordenar por apellidos</label><input type="radio" name="orden" value="apellidos" required="required">
		</form>
	</div>
	<?php 
    	mapaweb("php");
     ?>
	<div class="content">
		<?php 

			$conector = conectarServer();

			/**
			 * Se almacena en $consulta la consulta para 
			 * traerse todos los clientes menos el 0, que es
			 * un cliente interno necesario para el funcionamiento
			 * de la aplicación.
			 */
			$consulta = "SELECT * from clientes where id > 0;";

			$datos = mysqli_query($conector,$consulta);

			$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);

			echo "<table><tr><td>Nombre</td><td>Apellidos</td><td>Dirección</td><td>Teléfono</td><td>Teléfono 2</td><td>Nick</td><td>Contraseña</td><td>Editar cliente</td></tr>";
			/**
			 * En el caso de pulsar el boton de editarCliente, te 
			 * ejecuta el archivo editarCliente.php pasándole como
			 * parámetro a la url el id del cliente a editar.
			 */
			while(!is_null($resultado)){
				echo "<tr><td>$resultado[nombre]</td><td>$resultado[apellidos]</td><td>$resultado[direccion]</td><td>$resultado[telefono1]</td><td>$resultado[telefono2]</td><td>$resultado[nick]</td><td>$resultado[contraseña]</td><td><form action=\"editarCliente.php\" method=\"get\">
				<input type='hidden' name='c' value='$resultado[id]'>
		<input type=\"submit\" name=\"editarCliente\" value=\"Editar\" class=\"botonEditar\">
	</form></td></tr>";
				$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				
			}

			echo "</table>";
			mysqli_close($conector);
		?>
	</div>
	<form action="crearNuevoCliente.php" method="post" class="botonCrear">
		<input type="submit" name="crearCliente" value="+" >
	</form>
	<?php 
		contextmenu("clientes");
	?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>