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
				<?php 
					include 'php/conectarServidor.php';
					/**
					 * Se llama a la función que crea el menú con / como parámetro 'ruta'
					 */
					menu("/");
				?>
		</div>
	</div>
	<button title="Ir abajo" class="scrolldown">
        <i class="fas fa-chevron-down"></i>
    </button> 
    <div class="modal fade" id="modalCookies" tabindex="-1" role="dialog"
    aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="modalCookiesTitle">Política de aceptación
de cookies</h5>
      			</div>
      			<div class="modal-body">
        			Utilizamos cookies propias para mejorar nuestros servicios y mostrarle
publicidad relacionada con sus preferencias mediante el análisis de sus hábitos de
navegación. Si continua navegando, consideramos que acepta su uso. Puede obtener
más información <a href="cookies_page.php">aquí</a>.
      			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-danger" onclick="ClickRechazar()">Rechazar</button>
        			<button type="button" class="btn btn-success" onclick="ClickAceptar()">Aceptar</button>
      			</div>
    		</div>
  		</div>
	</div>
    <?php 
    	mapaweb("/");
     ?>
    <!--TODO añadir aqui el slider-->
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
      	<img class='d-block w-100' src='./img/trabajos/$files[$archivo1]' alt='First slide'>
      	<div class='carousel-caption d-none d-md-block caption'>
    		<h5>$resultado1[titulo]</h5>
    		<p>$resultado1[descripcion]</p>
  		</div>
    </div>
    <div class='carousel-item'>
      	<img class='d-block w-100' src='./img/trabajos/$files[$archivo2]' alt='Second slide'>
      	<div class='carousel-caption d-none d-md-block caption'>
    		<h5>$resultado2[titulo]</h5>
    		<p>$resultado2[descripcion]</p>
  		</div>
    </div>
    <div class='carousel-item'>
      	<img class='d-block w-100' src='./img/trabajos/$files[$archivo3]' alt='Third slide'>
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

					$consulta = "SELECT id,imagen,titular,contenido from noticias where fecha <= '$currenttimestamp'  order by fecha desc limit 0,3";

					$datos = mysqli_query($conector,$consulta);


					$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);

					while (!is_null($resultado)) {
						echo "<div class='noticiap card'><img class='card-img-top' src='./img/noticias/$resultado[imagen]' alt='$resultado[titular]' width='250px'><div class='card-body'><h5 class='card-title'>$resultado[titular]</h5><a href='#' class='btn btn-primary botonEditar' data-toggle='collapse' data-target='#contenidocollapse'>Ver</a></div><div class='card-body collapse' id='contenidocollapse'>$resultado[contenido]</div></div>";
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
