<?php 
session_start();
include '../conectarServidor.php'; 
$userId = getId();

if (!isset($_GET["c"])) {
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
	
		<?php 
			/**
			 * Se llama a la función que crea el menú con citas como parámetro 'ruta'.
			 */
			menu("citas",$userId);
		?>
	<?php 
		if (!isset($_GET["c"])) {
			echo "
			<div style=\"display: flex; justify-content: space-between;\">
						<div></div>";
		}
		
		 ?>

		 	<?php 
	if (!isset($_GET["c"])) {
		echo "<div id=\"searchbar\">
			<form name=\"buscartrabajos\" action=\"buscarTrabajos.php\">
				<input type=\"text\" name=\"textobusqueda\" title=\"Título, nombre de cliente o precio\" required=\"required\">
				<input type=\"submit\"><br>
				<label for=\"c.nombre\">Ordenar por nombre de cliente</label><input type=\"radio\" name=\"orden\" value=\"c.nombre\" required=\"required\"><br>
				<label for=\"t.precio\">Ordenar por precio</label><input type=\"radio\" name=\"orden\" value=\"t.precio\" required=\"required\">
			</form>
		</div>";
	}
		
	 ?>
	<?php 
    	mapaweb("php");
     ?>
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


				echo "<div class='container'><div class='row'><table class='table table-bordered table-dark col-6 offset-3 mb-0'><tr><caption class='bg-dark'>$mes/$anio</caption></tr><tr>";
					for ($i=1; $i <= 7; $i++) { 
						if($i < $empiezames){

							echo "<td style='width:68px;border:none;'><div><p></p></div></td>";
						}else{
							if (isset($_GET["c"])) {
								if(busca_citas_id("$anio-$mes-$dia",$userId)){
									$numcitas = num_citas_id("$anio-$mes-$dia",$userId);
									echo "<td bgcolor=\"#faf6e9\" style='color:black' data-toggle='tooltip' data-placement='top' title='Tienes $numcitas citas este día.'><div>$dia
											<form action=\"verCita.php\" method=\"get\">	
												<input type='hidden' name='cl' value='true'>
												<input type='hidden' name='fecha' value='$anio-$mes-$dia'>
												<input type=\"submit\" name=\"verCita\" value=\"Ver citas\" class=\"botonEditar\">
											</form></div>
										</td>";
								}else{
									echo "<td style='width:68px;'><div>$dia<p></p></div></td>";
								}
								$dia++;
								$cont_dia++;
							}else{
								if(busca_citas("$anio-$mes-$dia")){
									$numcitas = num_citas("$anio-$mes-$dia");
									echo "<td bgcolor=\"#faf6e9\" style='color:black' data-toggle='tooltip' data-placement='top' title='Tienes $numcitas citas este día.'><div>$dia
											<form action=\"verCita.php\" method=\"get\">	
												<input type='hidden' name='fecha' value='$anio-$mes-$dia'>
												<input type=\"submit\" name=\"verCita\" value=\"Ver citas\" class=\"botonEditar\">
											</form></div>
										</td>";
								}else{
									echo "<td style='width:68px;'><div>$dia<p></p></div></td>";
								}
								$dia++;
								$cont_dia++;
						}
						}
					}
				echo "</tr>";
				$cont_dia = 0;
				while($dia <= $maxmes){
					if($cont_dia == 0){
						echo "<tr>";
					}
					if (isset($_GET["c"])) {
							if(busca_citas_id("$anio-$mes-$dia",$userId)){
							$numcitas = num_citas_id("$anio-$mes-$dia",$userId);
							echo "<td bgcolor=\"#faf6e9\" style='color:black' data-toggle='tooltip' data-placement='top' title='Tienes $numcitas citas este día.'><div>$dia<form action=\"verCita.php\" method=\"get\">
								<input type='hidden' name='fecha' value='$anio-$mes-$dia'>
								<input type='hidden' name='cl' value='true'>
				<input type=\"submit\" name=\"verCita\" value=\"Ver citas\" class=\"botonEditar\">
			</form></div></td>";
						}else{
							echo "<td style='width:68px;'><div>$dia<p></p></div></td>";
						}
						$cont_dia++;
						$dia++;
					}else{
						if(busca_citas("$anio-$mes-$dia")){
							$numcitas = num_citas("$anio-$mes-$dia");
							echo "<td bgcolor=\"#faf6e9\" style='color:black' data-toggle='tooltip' data-placement='top' title='Tienes $numcitas citas este día.'><div>$dia<form action=\"verCita.php\" method=\"get\">
								<input type='hidden' name='fecha' value='$anio-$mes-$dia'>
				<input type=\"submit\" name=\"verCita\" value=\"Ver citas\" class=\"botonEditar\">
			</form></div></td>";
						}else{
							echo "<td style='width:68px;'><div>$dia<p></p></div></td>";
						}
						$cont_dia++;
						$dia++;
					}
					if ($cont_dia == 7){
        				$cont_dia = 0;
         				echo "</tr>";
      				}
				}
				echo "</tr>";
				echo "</table>";
				if (isset($_GET["c"])) {
					echo "</div><div class='row'>";
				}
				
				if (isset($_GET["c"])) {
					echo "<form action='citas.php' method='get' class='bg-dark col-6 offset-3'>
					<input type='hidden' name='c' value='true'>
			<label for='m'>Mes</label><input type='number' name='m' min='01' max='12' required='required' value='$mes'><br>
			<label for='y'>Año</label><input type='number' name='y' required='required' min='1996' max='2055' value='$anio'><br>
			<input type='submit' name='Ir' value='Ir'>
		</form>";
				}else{
					echo "<form action='citas.php' method='get' class='bg-dark col-6 offset-3'>
			<label for='m'>Mes</label><input type='number' name='m' min='01' max='12' required='required' value='$mes'><br>
			<label for='y'>Año</label><input type='number' name='y' required='required' min='1996' max='2055' value='$anio'><br>
			<input type='submit' name='Ir' value='Ir'>
		</form>";
				}
				
		if (isset($_GET["c"])) {
			echo "</div>";
		}

		mysqli_close($conector);
		
		function mes_empieza($mes,$anio){
 			return date('N',mktime(0, 0, 0, $mes, 1, $anio));
		}	

		?>
	</div>
	<?php 
	if (!isset($_GET["c"])) {
	echo "<form action=\"crearNuevaCita.php\" method=\"post\" class=\"botonCrear\">
		<button type='submit' name='crearCita' value='+' class=\"btn btn-dark rounded-circle\" ><i class=\"fas fa-plus\"></i></button>
	</form>";
	}
		
	 ?>
	<?php 
		contextmenu("citas");
	?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(function () {
  		$('[data-toggle="tooltip"]').tooltip()
	})
</script>
</html>