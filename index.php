<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Estudio de Fotografía</title>
	<link rel="icon" href="img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/contextmenu.js"></script>
	<script type="text/javascript" src="js/scroll.js"></script>
	<script type="text/javascript" src="js/mostrarAyuda.js"></script>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<nav>
				<?php 
					include 'php/conectarServidor.php';
					/**
					 * Se llama a la función que crea el menú con / como parámetro 'ruta'
					 */
					menu("/");
				?>
			</nav>
		</div>
	</div>
	<button title="Ir abajo" class="scrolldown">
        <i class="fas fa-chevron-down"></i>
    </button> 
    <?php 
    	mapaweb("/");
     ?>
    <div class="container">
    	<div class="row">
			<div class="col-12 offset-3 content">
				<?php 
					$conector = conectarServer();

					$files = array_slice(scandir('./img/trabajos'), 2);

					$archivo1 = rand(0,sizeof($files)-1);
					$archivo2 = rand(0,sizeof($files)-1);
					while($archivo2==$archivo1){
						$archivo2 = rand(0,sizeof($files)-1);
					}
					$archivo3 = rand(0,sizeof($files)-1);
					while($archivo3==$archivo2||$archivo3==$archivo1){
						$archivo3 = rand(0,sizeof($files)-1);
					}


					$id1 = archivo_id($files[$archivo1]);
					$id2 = archivo_id($files[$archivo2]);
					$id3 = archivo_id($files[$archivo3]);

					$con1 = "SELECT titulo,descripcion from trabajos where id = $id1";
					$con2 = "SELECT titulo,descripcion from trabajos where id = $id2";
					$con3 = "SELECT titulo,descripcion from trabajos where id = $id3";

					$datos1 = mysqli_query($conector,$con1);
					$resultado1 = mysqli_fetch_array($datos1,MYSQLI_ASSOC);

					$datos2 = mysqli_query($conector,$con2);
					$resultado2 = mysqli_fetch_array($datos2,MYSQLI_ASSOC);

					$datos3 = mysqli_query($conector,$con3);
					$resultado3 = mysqli_fetch_array($datos3,MYSQLI_ASSOC);

			echo "<div id='carousel' class='carousel slide' data-ride='carousel'>
  <ol class='carousel-indicators'>
    <li data-target='#carousel' data-slide-to='0' class='active'></li>
    <li data-target='#carousel' data-slide-to='1'></li>
    <li data-target='#carousel' data-slide-to='2'></li>
  </ol>
  <div class='carousel-inner'>
    <div class='carousel-item active'>
      	<img class='d-block w-100 p-3' src='./img/trabajos/$files[$archivo1]' alt='First slide' height='700px'>
      	<div class='carousel-caption d-none d-md-block caption'>
    		<h5>$resultado1[titulo]</h5>
    		<p>$resultado1[descripcion]</p>
  		</div>
    </div>
    <div class='carousel-item'>
      	<img class='d-block w-100 p-3' src='./img/trabajos/$files[$archivo2]' alt='Second slide' height='700px'>
      	<div class='carousel-caption d-none d-md-block caption'>
    		<h5>$resultado2[titulo]</h5>
    		<p>$resultado2[descripcion]</p>
  		</div>
    </div>
    <div class='carousel-item'>
      	<img class='d-block w-100 p-3' src='./img/trabajos/$files[$archivo3]' alt='Third slide' height='700px'>
      	<div class='carousel-caption d-none d-md-block caption'>
    		<h5>$resultado3[titulo]</h5>
    		<p>$resultado3[descripcion]</p>
  		</div>
    </div>
  </div>
  <a class='carousel-control-prev' href='#carousel' role='button' data-slide='prev'>
    <span class='carousel-control-prev-icon bg-dark' aria-hidden='true'></span>
    <span class='sr-only'>Previous</span>
  </a>
  <a class='carousel-control-next' href='#carousel' role='button' data-slide='next'>
    <span class='carousel-control-next-icon bg-dark' aria-hidden='true'></span>
    <span class='sr-only'>Next</span>
  </a>
</div><br>";

					$currenttimestamp = date("Y-m-d");

					$consulta = "SELECT id,imagen,titular from noticias where fecha <= '$currenttimestamp'  order by fecha desc limit 0,3";

					$datos = mysqli_query($conector,$consulta);


					$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);

					while (!is_null($resultado)) {
						echo "<div class='noticiap card'><img class='card-img-top' src='./img/noticias/$resultado[imagen]' alt='$resultado[titular]' width='250px'><div class='card-body'>$resultado[titular]<form action='php/noticias/verNoticia.php' method='post'>
						<input type='hidden' name='n' value='$resultado[id]'>
				<input type='submit' name='verNoticia' value='Ver' class=' btn btn-light botonEditar'>
			</form></div></div>";
						$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
					}
					mysqli_close($conector);
				?>
			</div>
		</div>
	</div>
	<?php 
		contextmenu('/');
	?>
	<button title="Ir arriba" class="scrollup">
        <i class="fas fa-chevron-up"></i>
    </button>
    	<?php 
    		footer("/");
    	 ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(".carousel").carousel(5000);
</script>
</html>
