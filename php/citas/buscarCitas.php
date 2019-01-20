<?php 
session_start();
include '../conectarServidor.php'; 
$userId = getId();

if (checkID($userId,"cliente")==-1) {
	header("Location:../../login.php");
}elseif (checkID($userId,"cliente")==0) {
	header("Location:../../index.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Citas | Estudio de Fotografía</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/main.css">
</head>
<body>
	
		<?php
			menu("trabajos",$userId);
		?>
	
	<div id="searchbar">
		<form name="buscarcitas" action="buscarCitas.php">
			<input type="text" name="textobusqueda" title="Fecha en formato 30/12/1996 o Nombre de cliente" required="required">
			<input type="submit"><br>
			<label for="ci.nombre">Ordenar por nombre de cliente</label><input type="radio" name="orden" value="c.nombre" required="required"><br>
			<label for="ci.nombre">Ordenar por fecha de cita</label><input type="radio" name="orden" value="ci.fecha" required="required">
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
			 * Se busca en la consulta los citas que cumplan
			 * con el término de búsqueda en nombre de cliente o fecha.
			 */
			$consulta = "SELECT ci.id,ci.fecha,ci.motivo,c.nombre from citas ci,clientes c where ci.id_cliente = c.id and (ci.fecha like '%$textobusqueda%' or c.nombre like '%$textobusqueda%') order by $orden;";

			$datos = mysqli_query($conector,$consulta);
			if(mysqli_num_rows($datos)>0){
				$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				if (strpos($textobusqueda,"/")!=FALSE) {
					$textobusqueda = convertirFecha($textobusqueda,true);
				}
				echo "<i>Mostrando citas buscando por $textobusqueda :</i>";
				echo "<table border><tr><td>Fecha</td><td>Motivo</td><td>Cliente</td><td>Ver cita</td></tr>";

				while(!is_null($resultado)){
					$resultado["fecha"] = convertirFecha($resultado["fecha"],true);
					echo "<tr><td>$resultado[fecha]</td><td>$resultado[motivo]</td><td>$resultado[nombre]</td><td><form action=\"verCita.php\" method=\"get\">
					<input type='hidden' name='c' value='$resultado[id]'>
					<input type='hidden' name='fecha' value='$resultado[fecha]'>
			<input type=\"submit\" name=\"verCita\" value=\"Ver\">
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
	<form action="crearNuevaCita.php" method="post" class="botonCrear">
		<input type="submit" name="crearCita" value="+">
	</form>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>