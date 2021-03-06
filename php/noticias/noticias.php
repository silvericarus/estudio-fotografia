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
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<title>Noticias | Estudio Fotográfico</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel='stylesheet' href='../../css/main.css'>
	<script
  src='https://code.jquery.com/jquery-3.3.1.min.js'
  integrity='sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8='
  crossorigin='anonymous'></script>
	<script type='text/javascript' src='../../js/contextmenu.js'></script>
	<script type='text/javascript' src='../../js/confirmarBorrado.js'></script>
	<script type="text/javascript" src="../../js/mostrarAyuda.js"></script>
</head>
<body>
	
		<?php 
			menu('noticias',$userId);
		?>
	<div style="display: flex; justify-content: space-between;">
		<div></div>
		<div id="searchbar">
			<form name='buscarnoticias' action='buscarNoticias.php' method='get'>
				<input type='text' name='textobusqueda' title="Titular o Fecha de activación en formato 30/12/1996" required="required">
				<input type='submit'><br>
				<label for="titular">Ordenar por titular</label><input type="radio" name="orden" value="titular" required="required"><br>
				<label for="fecha">Ordenar por fecha</label><input type="radio" name="orden" value="fecha" required="required">
			</form>
		</div>
	<?php 
    	mapaweb("php");
     ?>
		<div class='content'>
			<?php 

				$conector = conectarServer();

				/**
				 * Se obtiene la información necesaria de las noticias.
				 */
				$fila = 0;
				$pag=0;
				if (!isset($_GET['page'])) {
					
				}else{
					$pag = $_GET['page'];
					$fila = 4 * $pag;
				}

				$consulta = "SELECT id,imagen,titular from noticias order by fecha desc limit $fila,4";
				$consulta2 = "SELECT count(id) filas from noticias;";

				$datos = mysqli_query($conector,$consulta);


				$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);

				$resultados = mysqli_num_rows($datos);

				$datos2 = mysqli_query($conector,$consulta2);

				$resultado2 = mysqli_fetch_array($datos2,MYSQLI_ASSOC);

				echo "<div class='container'><div class='row'><table class='table table-bordered table-dark col-6 offset-3 mb-0'><tr><td>Imagen</td><td>Títular</td><td>Ver más</td><td>Borrar Noticia</td></tr>";

				while(!is_null($resultado)){
						echo "<tr><td><img src='../../img/noticias/$resultado[imagen]' alt='$resultado[titular]' width='40px'></td><td>$resultado[titular]</td><td><form action='verNoticia.php' method='post'>
						<input type='hidden' name='n' value='$resultado[id]'>
			<button type='submit' name='verNoticia' value='Ver' class='btn btn-light'><i class=\"far fa-eye\"></i></button>
		</form></td><td><button type='button' name='borrarTrabajo' value='Borrar' onClick=\"confirmDelete('noticias','borrarNoticia.php?t=$resultado[id]&img=$resultado[imagen]')\" class='btn btn-light'><i class=\"far fa-trash-alt\"></i></button></td></tr>";
						$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
					}

				echo "</table></div><div class='row'><div class='col-6 offset-3 bg-dark' style='justify-content: space-between;
    align-items: center;
    flex-direction: row;
    display: inline-flex;'>";
				$filamenos = $pag - 1;
				if ($fila == 0) {
					echo "<form action='noticias.php' method='get' ><input type='hidden' name='page' value='$filamenos'>
			<button type='submit' name='anteriorPagina' value='Anterior' disabled class='btn btn-dark'><i class=\"far fa-arrow-alt-circle-left\"></i></button>
		</form>";
				}else{
					echo "<form action='noticias.php' method='get'><input type='hidden' name='page' value='$filamenos'>
			<button type='submit' name='anteriorPagina' value='Anterior' class='btn btn-dark'><i class=\"far fa-arrow-alt-circle-left\"></i></button>
		</form>";
				}
				$filamas = $pag+1;
				if ($resultado2["filas"]-$fila > 4) {
					echo "<form action='noticias.php' method='get'>
		<input type='hidden' name='page' value='$filamas'>
			<button type='submit' name='siguientePagina' value=' Siguiente' class='btn btn-dark'><i class=\"far fa-arrow-alt-circle-right\"></i></button>
		</form></div></div>";
				}else{
					echo "<form action='noticias.php' method='get'>
		<input type='hidden' name='page' value='$filamas'>
			<button type='submit' name='siguientePagina' value=' Siguiente' class='btn btn-dark' disabled><i class=\"far fa-arrow-alt-circle-right\"></i></button>
		</form></div></div></div>";
				}
			mysqli_close($conector);
			?>
		</div>
	</div>
	<form action='crearNuevaNoticia.php' method='post' class='botonCrear'>
		<button type='submit' name='crearNoticia' value='+' class="btn btn-dark rounded-circle" ><i class="fas fa-plus"></i></button>
	</form>
	<?php 
		contextmenu('noticias');
	?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>