<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Información General | Estudio de Fotografía</title>
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
	<div class="container">
		<div class="row">
			<div class="col-12 offset-3 content">
				<section>
					<h2>Política de Cookies</h2>
					<p>
						Cookie es un fichero que se descarga en su ordenador al acceder a determinadas
						páginas web. Las cookies permiten a una página web, entre otras cosas, almacenar y
						recuperar información sobre los hábitos de navegación de un usuario o de su equipo y,
						dependiendo de la información que contengan y de la forma en que utilice su equipo,
						pueden utilizarse para reconocer al usuario. El navegador del usuario memoriza
						cookies en el disco duro solamente durante la sesión actual ocupando un espacio de
						memoria mínimo y no perjudicando al ordenador. Las cookies no contienen ninguna
						clase de información personal específica, y la mayoría de las mismas se borran del
						disco duro al finalizar la sesión de navegador (las denominadas cookies de sesión).
					</p>
					<p>
						La mayoría de los navegadores aceptan como estándar a las cookies y, con
						independencia de las mismas, permiten o impiden en los ajustes de seguridad las
						cookies temporales o memorizadas.
						Sin su expreso consentimiento –mediante la activación de las cookies en su
						navegador– Fotos y Objetivos S.L. no enlazará en las cookies los datos memorizados con sus datos
						personales proporcionados en el momento del registro.
					</p>
					<p>
						<i>¿Qué tipos de Cookies usamos?</i><br>
						<ul>
							<li>Cookies técnicas: Son aquéllas que permiten al usuario la navegación a través de una
							página web, plataforma o aplicación y la utilización de las diferentes opciones o
							servicios que en ella existan como, por ejemplo, controlar el tráfico y la comunicación
							de datos, identificar la sesión, acceder a partes de acceso restringido, recordar los
							elementos que integran un pedido, realizar el proceso de compra de un pedido,
							realizar la solicitud de inscripción o participación en un evento, utilizar elementos de
							seguridad durante la navegación, almacenar contenidos para la difusión de videos o
							sonido o compartir contenidos a través de redes sociales.</li>
							<ul>
								<li>
									Cookies de personalización: Son aquéllas que permiten al usuario acceder al
									servicio con algunas características de carácter general predefinidas en función
									de una serie de criterios en el terminal del usuario como por ejemplo serian el
									idioma, el tipo de navegador a través del cual accede al servicio, la
									configuración regional desde donde accede al servicio, etc.
								</li>
								<li>
									Cookies de análisis: Son aquéllas que tratadas por nosotros,
									nos permiten cuantificar el número de usuarios y así realizar la medición y
									análisis estadístico de la utilización que hacen los usuarios del servicio ofertado.
									Para ello se analiza su navegación en nuestra página web con el fin de mejorar
									la oferta de productos o servicios que le ofrecemos.
								</li>
							</ul>
						</ul>
					</p>
					<p>
						El Usuario acepta expresamente, por la utilización de este Sitio, el tratamiento de la
						información recabada en la forma y con los fines anteriormente mencionados. Y
						asimismo reconoce conocer la posibilidad de rechazar el tratamiento de tales datos o
						información rechazando el uso de Cookies mediante la selección de la configuración
						apropiada a tal fin en su navegador. Si bien esta opción de bloqueo de Cookies en su
						navegador puede no permitirle el uso pleno de todas las funcionalidades del Sitio.
					</p>
					<p>
						Puede usted permitir, bloquear o eliminar las cookies instaladas en su equipo
						mediante la configuración de las opciones del navegador instalado en su ordenador:
					</p>
					<ul>
						<li>Chrome</li>
						<li>Explorer</li>
						<li>Firefox</li>
						<li>Safari</li>
					</ul>
					<p>
						Si tiene dudas sobre esta política de cookies, puede contactar con nosotros en
						help@estudiofoto.es
					</p>
				</section>
			</div>
		</div>
	</div>
	<button title="Ir arriba" class="scrollup">
        <i class="fas fa-chevron-up"></i>
    </button>
    	<?php 
    		footer("/");
    	 ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>