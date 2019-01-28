<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Description" content="Esta es la página del Estudio de Fotografía, donde podrás comprobar los trabajos que tenemos a la venta y posiblemente adquirir alguno.">
	<title>Estudio de Fotografía</title>
	<link rel="icon" href="img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/scroll.js"></script>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
				<?php
					include './php/conectarServidor.php';
					$idUser = getId();
					/**
					 * Se llama a la función que crea el menú con / como parámetro 'ruta'
					 */
					menu("/",$idUser);
				?>
		</div>
	</div>
	<button title="Ir abajo" class="scrolldown">
        <i class="fas fa-chevron-down"></i>
    </button> 
    <div class="modal fade" id="modalCookies" tabindex="-1" role="dialog"
    aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content bg-dark text-light">
      			<div class="modal-header">
        			<h5 class="modal-title" id="modalCookiesTitle">Política de aceptación
de cookies</h5>
      			</div>
      			<div class="modal-body" aria-labelledby='modalCookiesTitle'>
        			Utilizamos cookies propias para mejorar nuestros servicios y mostrarle
publicidad relacionada con sus preferencias mediante el análisis de sus hábitos de
navegación. Si continua navegando, consideramos que acepta su uso. Puede obtener
más información <a href="cookies_page.php" class="important">aquí</a>.
      			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-danger" onclick="ClickRechazar()">Rechazar</button>
        			<button type="button" class="btn btn-success" onclick="ClickAceptar()">Aceptar</button>
      			</div>
    		</div>
  		</div>
	</div>
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

			echo "<div id='carousel' class='carousel slide carousel-fade' data-ride='carousel'>
  <ol class='carousel-indicators'>
    <li data-target='#carousel' data-slide-to='0' class='active'></li>
    <li data-target='#carousel' data-slide-to='1'></li>
    <li data-target='#carousel' data-slide-to='2'></li>
  </ol>
  <div class='carousel-inner'>
    <div class='carousel-item active itemcarousel'>
      	<img class='d-block w-100 ' src='./img/trabajos/$files[$archivo1]' alt='$resultado1[titulo]' role='img'>
      	<div class='carousel-caption d-none d-md-block caption'>
    		<h5 id='carouselTitle1'>$resultado1[titulo]</h5>
    		<p aria-labelledby='carouselTitle1'>$resultado1[descripcion]</p>
  		</div>
    </div>
    <div class='carousel-item itemcarousel'>
      	<img class='d-block w-100 ' src='./img/trabajos/$files[$archivo2]' alt='$resultado2[titulo]' role='img'>
      	<div class='carousel-caption d-none d-md-block caption'>
	    	<h5 id='carouselTitle2'>$resultado2[titulo]</h5>
	    	<p aria-labelledby='carouselTitle2'>$resultado2[descripcion]</p>
  		</div>
    </div>
    <div class='carousel-item itemcarousel'>
      	<img class='d-block w-100 ' src='./img/trabajos/$files[$archivo3]' alt='$resultado3[titulo]' role='img'>
      	<div class='carousel-caption d-none d-md-block caption'>
      		<h5 id='carouselTitle3'>$resultado3[titulo]</h5>
    		<p aria-labelledby='carouselTitle3'>$resultado3[descripcion]</p>
  		</div>
    </div>
  </div>
  <a class='carousel-control-prev text-dark' href='#carousel' role='button' data-slide='prev'>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='sr-only'>Previous</span>
  </a>
  <a class='carousel-control-next text-dark' href='#carousel' role='button' data-slide='next'>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='sr-only'>Next</span>
  </a>
</div><br>";
     ?>
    <div class="container">
    	<div class="row">
			<div class="col-10 offset-1 content">
				<?php 

					$currenttimestamp = date("Y-m-d");

					$consulta = "SELECT id,imagen,titular,contenido from noticias where fecha <= '$currenttimestamp'  order by fecha desc limit 0,3";

					$datos = mysqli_query($conector,$consulta);


					$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
					$x = 0;
					while (!is_null($resultado)) {
						echo "<div class='noticiap card' role='article' aria-labelledby='title$x'><img class='card-img-top' src='./img/noticias/$resultado[imagen]' alt='$resultado[titular]' width='250px' role='img'><div class='card-body'><h5 class='card-title' id='title$x'>$resultado[titular]</h5><a href='#' class='btn btn-light botonEditar' data-toggle='collapse' data-target='#contenidocollapse$x'>Ver</a></div><div class='card-body collapse' id='contenidocollapse$x'>$resultado[contenido]</div></div>";
						$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
						$x++;
					}
					mysqli_close($conector);
				?>
			</div>
		</div>
	</div>
	<button title="Ir arriba" class="scrollup" role='button'>
        <i class="fas fa-chevron-up"></i>
    </button>
    	<?php 
    		footer("/",$idUser);
    	 ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(".carousel").carousel(5000);
</script>
<script type="text/javascript">
	$('#modalCookies').modal({backdrop: 'static', keyboard: false});

	if (localStorage.getItem('cookies')!=='1') {
		$('#modalCookies').modal('show');	
	}
	
	function ClickAceptar() {
		$('#modalCookies').modal('hide');
		localStorage.setItem('cookies',1);
	}

	function ClickRechazar() {
		$('#modalCookies').modal('hide');
		setTimeout("Redireccionar()",2000);
	}

	function Redireccionar() {
		window.location='https://www.boe.es/buscar/doc.php?id=BOE-A-1999-23750';
	}
</script>
</html>
