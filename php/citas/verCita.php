<?php 
session_start();
include '../conectarServidor.php'; 
$userId = getId();

if (!isset($_GET["cl"])) {
	if (checkID($userId,"admin")==-1) {
		header("Location:../../login.php");
	}elseif (checkID($userId,"admin")==0) {
		header("Location:../../index.php");
	}
}else{
	if (checkID($userId,"cliente")==-1) {
		header("Location:../../login.php");
	}elseif (checkID($userId,"cliente")==0) {
		header("Location:../../index.php");
	}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Citas | Estudio Fotográfico</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/main.css">
	<script type="text/javascript" src="../../js/confirmarBorrado.js"></script>
</head>
<body>
	
		<?php 
			
			menu("citas",$userId);
		?>
	
	<div class="content">
		<?php 

			$conector = conectarServer();


			/**
			 * Se trae todos los datos de las citas
			 * en la fecha seleccionada para así mostrarlos
			 * ya si en detalle. En caso de que se proporcione el parámetro
			 * de cual cliente quiere obtenerse el listado de las citas, se filtra
			 * por fecha y por ese cliente, en caso contrario, se filtra sólo por
			 * fecha.
			 */
			if(!isset($_GET["c"])&&!isset($_GET["cl"])){
				$fecha = $_GET["fecha"];
				$consulta = "SELECT ci.id,ci.fecha,ci.hora,ci.motivo,ci.lugar,c.nombre,c.telefono1 from citas ci,clientes c where ci.id_cliente = c.id and ci.fecha = '$fecha' order by ci.hora asc;";
			}else if (isset($_GET["cl"])) {
				$fecha = $_GET["fecha"];
				$consulta = "SELECT ci.id,ci.fecha,ci.hora,ci.motivo,ci.lugar,c.nombre,c.telefono1 from citas ci,clientes c where ci.id_cliente = c.id and ci.fecha = '$fecha' and c.id = $userId";
			}else{
				$fecha = convertirFecha($_GET["fecha"],false);
				$consulta = "SELECT ci.id,ci.fecha,ci.hora,ci.motivo,ci.lugar,c.nombre,c.telefono1 from citas ci,clientes c where ci.id_cliente = c.id and ci.fecha = '$fecha' and c.id = $_GET[c];";
			}
			

			$datos = mysqli_query($conector,$consulta);


			$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);


			$fechacita = explode("-",$fecha);

			$timestampcita = mktime($resultado["hora"],0,0,$fechacita[1],$fechacita[2],$fechacita[0]);

			$timestampactual = time();
			while (!is_null($resultado)) {
				$resultado["fecha"] = convertirFecha($resultado["fecha"],true);
				if ($timestampcita > $timestampactual) {

				echo "<div class='container'><div class='row'><div class='col-6 offset-3 bg-dark'>";
				echo "<h2>$resultado[motivo]</h2>";
				if (!isset($_GET["cl"])) {
					echo "<p>En <b>$resultado[lugar]</b> el <b>$resultado[fecha]</b> a las <b>$resultado[hora]</b> horas, el cliente con el que te citas es <b>$resultado[nombre]</b>, su telefono de contacto es <b>$resultado[telefono1]</b></p>";
				}else{
					echo "<p>En <b>$resultado[lugar]</b> el <b>$resultado[fecha]</b> a las <b>$resultado[hora]</b> horas, si deseas hacer alguna consulta o cancelar esta cita, puedes contactarnos en <a href='mailto:ayuda@estudiofotografia.es' class='important'>nuestro correo</a>.</p>";
				}
				
				if(!isset($_GET["cl"])){
					echo"<form action='editarCita.php' method='get'>
						<input type='hidden' name='c' value='$resultado[id]'>
						<input type='submit' name='editarCita' value='Editar'>
					</form>
					<input type='button' name='borrarCita' value='Borrar' onClick=\"confirmDelete('citas','borrarCita.php?c=$resultado[id]')\">";
				}
					
					echo "</div></div></div>";
					$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				}else{
					echo "<div class='container'><div class='row'><div class='col-6 offset-3 bg-dark'>";
					if (!isset($_GET["cl"])) {
						echo "<h2>$resultado[motivo]</h2>";
						echo "<p>En <b>$resultado[lugar]</b> el <b>$resultado[fecha]</b> a las <b>$resultado[hora]</b> horas, el cliente con el que te citas es <b>$resultado[nombre]</b>, su telefono de contacto es <b>$resultado[telefono1]<br></b><i>Cita pasada</i></p>";
					}else{
						echo "<h2>$resultado[motivo]</h2>";
						echo "<p>En <b>$resultado[lugar]</b> el <b>$resultado[fecha]</b> a las <b>$resultado[hora]</b> horas, si deseas hacer alguna consulta o cancelar esta cita, puedes contactarnos en <a href='mailto:ayuda@estudiofotografia.es' class='important'>nuestro correo</a>.<br><i>Cita pasada</i></p>";
					}
					
						if (!isset($_GET["cl"])) {
							echo "<form action='editarCita.php' method='get'>
						<input type='hidden' name='c' value='$resultado[id]'>
							<input type='submit' name='editarCita' value='Editar' disabled>
						</form>
						<input type='button' name='borrarCita' value='Borrar' onClick=\"confirmDelete('citas','borrarCita.php?c=$resultado[id]')\" disabled>";
						}
						
						echo "</div></div></div>";
						$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				}
			}
			mysqli_close($conector);
			
		?>
	</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>