<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Citas | Estudio de Fotografía</title>
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
	<nav>
		<?php 
			include '../conectarServidor.php';
			/**
			 * Se llama a la función que crea el menú con citas como parámetro 'ruta'.
			 */
			menu("citas");
		?>
	</nav>
	<?php 
    	mapaweb("php");
     ?>
	<div id="searchbar">
		<form name="buscarcitas" action="buscarCitas.php" method="get">
			<input type="text" name="textobusqueda" title="Fecha en formato 30/12/1996 o Nombre de cliente" required="required">
			<input type="submit"><br>
			<label for="c.nombre">Ordenar por nombre de cliente</label><input type="radio" name="orden" value="c.nombre" required="required"><br>
			<label for="ci.fecha">Ordenar por fecha de cita</label><input type="radio" name="orden" value="ci.fecha" required="required">
		</form>
	</div>
	<div class="content">
		<?php 
			$cont_dia = 1;
			$dia = 1;

			if (!isset($_GET["m"])) {
				$mes = date("m");
				$anio = date("Y");
			}else{
				$mes = $_GET["m"];
				$anio = $_GET["y"];	
			}

				$conector = conectarServer();

				$empiezames = mes_empieza($mes,$anio);

				$maxmes = date("t",mktime(0,0,0,$mes,1,$anio));

				$consulta = "SELECT id,fecha from citas where fecha <= '$anio-$mes-$maxmes' and fecha >= '$anio-$mes-01';";

				$datos = mysqli_query($conector,$consulta);

				$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				$numrows = mysqli_num_rows($datos);

				echo "<table><tr><caption>$mes/$anio</caption></tr><tr>";
				if ($numrows > 0) {
					for ($i=1; $i <= 7; $i++) { 
						if($i < $empiezames){
							echo "<td style='width:68px;border:none;'><div><p></p></div></td>";
						}else{
							$fechacita = explode("-",$resultado["fecha"]);
						if($dia==$fechacita[2]){
							echo "<td bgcolor=\"#E13E3E\"><div>$dia<form action=\"verCita.php\" method=\"get\">
							<input type='hidden' name='fecha' value='$resultado[fecha]'>
			<input type=\"submit\" name=\"verCita\" value=\"Ver citas\" class=\"botonEditar\">
		</form></div></td>";
						}else{
							echo "<td style='width:68px;'><div>$dia<p></p></div></td>";
						}
						$dia++;
						$cont_dia++;
					}
				}
				echo "</tr>";
				$cont_dia = 0;
				while($dia <= $maxmes){
					if($cont_dia == 0){
						echo "<tr>";
					}
					if($dia==$fechacita[2]){
						echo "<td bgcolor=\"#E13E3E\"><div>$dia<form action=\"verCita.php\" method=\"get\">
							<input type='hidden' name='fecha' value='$resultado[fecha]'>
			<input type=\"submit\" name=\"verCita\" value=\"Ver citas\" class=\"botonEditar\">
		</form></div></td>";
					}else{
						echo "<td style='width:68px;'><div>$dia<p></p></div></td>";
					}
					$cont_dia++;
					$dia++;
					if ($cont_dia == 7){
        				$cont_dia = 0;
         				echo "</tr>";
      				}
				}
				echo "</tr>";
				echo "</table>";
				}

				echo "<form action='citas.php' method='get'>
			<label for='m'>Mes</label><input type='number' name='m' min='01' max='12' required='required' value='$mes'><br>
			<label for='y'>Año</label><input type='number' name='y' required='required' min='1996' max='2055' value='$anio'><br>
			<input type='submit' name='Ir' value='Ir'>
		</form>";

		mysqli_close($conector);
		
		function mes_empieza($mes,$anio){
 			return date('N',mktime(0, 0, 0, $mes, 1, $anio));
		}	

		?>
	</div>
	<form action="crearNuevaCita.php" method="post" class="botonCrear">
		<input type="submit" name="crearCita" value="+" >
	</form>
	<?php 
		contextmenu("citas");
	?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>