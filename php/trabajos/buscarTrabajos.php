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
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Buscar Trabajos| Estudio de Fotografía</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/main.css">
	<script type="text/javascript" src="../../js/confirmarBorrado.js"></script>
</head>
<body>
	
		<?php
			menu("trabajos",$userId);
		?>
	
	<div id="searchbar">
		<form name="buscartrabajos" action="buscarTrabajos.php">
			<input type="text" name="textobusqueda" title="Título, nombre de cliente o precio" required="required">
			<input type="submit"><br>
			<label for="c.nombre">Ordenar por nombre de cliente</label><input type="radio" name="orden" value="c.nombre" required="required"><br>
			<label for="t.precio">Ordenar por precio</label><input type="radio" name="orden" value="t.precio" required="required">
		</form>
	</div>
	<div class="content">
		<?php 

			$textobusqueda = $_GET["textobusqueda"];
			$orden = $_GET["orden"];

			$conector = conectarServer();

			/**
			 * Se obtienen los trabajos que coincidan con los términos de búsqueda
			 * en descripción, cliente o precio.
			 */
			$consulta = "SELECT t.id,t.titulo,t.imagen,c.nombre from trabajos t,clientes c where t.id_cliente = c.id and (t.titulo like '%$textobusqueda%' or c.nombre like '%$textobusqueda%' or t.precio like '%$textobusqueda%') order by $orden;";

			$datos = mysqli_query($conector,$consulta);
			if(mysqli_num_rows($datos)>0){
				$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				echo "<i>Mostrando trabajos buscando por $textobusqueda :</i>";
				echo "<table><tr><td>Miniatura</td><td>Título</td><td>Cliente</td><td>Editar trabajo</td><td>Ver trabajo</td><td>Borrar trabajo</td></tr>";

			while(!is_null($resultado)){
				if($resultado["nombre"]=="Disponible"){
					echo "<tr id=\"disponible\"><td><img src=\"$resultado[imagen]\" alt=\"$resultado[titulo]\" width=\"40px\"></td><td>$resultado[titulo]</td><td>$resultado[nombre]</td><td><form action=\"editarTrabajo.php\" method=\"post\">
					<input type='hidden' name='t' value='$resultado[id]'>
		<input type=\"submit\" name=\"editarTrabajo\" value=\"Editar\" class=\"botonEditar\">
	</form></td><td><form action=\"verTrabajo.php\" method=\"post\">
					<input type='hidden' name='t' value='$resultado[id]'>
		<input type=\"submit\" name=\"verTrabajo\" value=\"Ver\" class=\"botonEditar\">
	</form></td><td><form action=\"editarTrabajo.php\" method=\"post\">
					<input type='hidden' name='t' value='$resultado[id]'>
		<input type=\"submit\" name=\"borrarTrabajo\" value=\"Borrar\" class=\"botonEditar\">
	</form></td></tr>";
					$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				}else{
					echo "<tr><td><img src=\"$resultado[imagen]\" alt=\"$resultado[titulo]\" width=\"40px\"></td><td>$resultado[titulo]</td><td>$resultado[nombre]</td><td><form action=\"editarTrabajo.php\" method=\"post\">
					<input type='hidden' name='t' value='$resultado[id]'>
		<input type=\"submit\" name=\"editarTrabajo\" value=\"Editar\" class=\"botonEditar\" disabled>
	</form></td><td><form action=\"verTrabajo.php\" method=\"post\">
		<input type='hidden' name='t' value='$resultado[id]'>
		<input type=\"submit\" name=\"verTrabajo\" value=\"Ver\" class=\"botonEditar\">
	</form></td><td><input type=\"button\" name=\"borrarCita\" value=\"Borrar\" onClick=\"confirmDelete('trabajos','borrarTrabajo.php?t=$resultado[id]')\"></td></tr>";
					$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				}
			}
			echo "</table>";
		}else{
			echo "<h2 class=\"mensaje error\"><span>No se ha encontrado ningún resultado para $textobusqueda</span></h2>";
		}
		mysqli_close($conector);
		?>
	</div>
	<form action="crearNuevoTrabajo.php" method="post" class="botonCrear">
		<input type="submit" name="crearTrabajo" value="+" >
	</form>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>