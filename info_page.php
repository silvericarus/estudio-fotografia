<?php 
session_start();
include './php/conectarServidor.php';
$userId = getId();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
			
				<?php
					/**
					 * Se llama a la función que crea el menú con / como parámetro 'ruta'
					 */
					menu("/",$userId);
				?>
			
		</div>
	</div>
	<button title="Ir abajo" class="scrolldown">
        <i class="fas fa-chevron-down"></i>
    </button> 
	<div class="container">
		<div class="row">
			<div class="col-12 content bg-dark">
				<section>
					<h2>Identidad del titular de la web</h2>
					<p>
						<ul>
							<li>Titular: Fotos y Objetivos S.L. con domicilio en Calle Gran Vía de Colón, 23, 18001, Granada, Granada.</li>
							<li>Nº de inscripción en el Registro Mercantil de Granada: Tomo 5743, Folio 298, SECCION  3,  Hoja número F-49643, inscripción 3º</li>
							<li>CIF: B56363626</li>	
						</ul>
					</p>
				</section>
				<section>
					<h2>Aceptación de las condiciones de uso</h2>
					<p>
						Las presentes Condiciones (en adelante denominado como Aviso Legal) tienen por
						objeto regular el uso de este sitio Web que su titular pone a disposición del público.
						La utilización del web por un tercero le atribuye la condición de Usuario y, supone la
						aceptación plena por dicho Usuario, de todas y cada una de las condiciones que se
						incorporan en el presente Aviso Legal.
						El titular del Web puede ofrecer a través del Web, servicios o productos que podrán
						encontrarse sometidas a unas condiciones particulares propias que, según los casos,
						sustituyen, completan y/o modifican las presentes Condiciones, y sobre las cuales se
						informará al Usuario en cada caso concreto.
					</p>
				</section>
				<section>
					<h2>Uso correcto del sitio web</h2>
					<p>
						El Usuario se compromete a utilizar el Web, los contenidos y servicios de conformidad
						con la Ley, el presente Aviso Legal, las buenas costumbres y el orden público. Del
						mismo modo, el Usuario se obliga a no utilizar el Web o los servicios que se presten a
						través de él con fines o efectos ilícitos o contrarios al contenido del presente Aviso
						Legal, lesivos de los intereses o derechos de terceros, o que de cualquier forma pueda
						dañar, inutilizar o deteriorar el Web o sus servicios, o impedir un normal disfrute del
						Web por otros Usuarios.
						Asimismo, el Usuario se compromete expresamente a no destruir, alterar, inutilizar o,
						de cualquier otra forma, dañar los datos, programas o documentos electrónicos y
						demás que se encuentren en la presente Web.
						El Usuario se compromete a no obstaculizar el acceso de otros usuarios al servicio de
						acceso mediante el consumo masivo de los recursos informáticos a través de los
						cuales el titular del Web presta el servicio, así como realizar acciones que dañen,
						interrumpan o generen errores en dichos sistemas.
						El Usuario se compromete a no introducir programas, virus, macros, applets, controles
						ActiveX o cualquier otro dispositivo lógico o secuencia de caracteres que causen o
						sean susceptibles de causar cualquier tipo de alteración en los sistemas informáticos
						del titular del Web o de terceros.
						Se prohíbe al usuario el envío de comunicaciones publicitarias o promocionales por
						cualquier medio de comunicación electrónica (“SPAM”) que previamente no hubieran
						sido solicitadas o expresamente autorizadas por el titular del Web. El incumplimiento
						de lo anteriormente expuesto será denunciado por el titular del Web ante el organismo
						competente al efecto, quien, tras la oportuna tramitación y verificación de la infracción,
						impondrá al usuario infractor la sanción que corresponda de acuerdo a lo establecido
						legalmente.
					</p>
				</section>
				<section>
					<h2>Publicidad</h2>
					<p>
						Parte del Sitio web puede albergar contenidos publicitarios o estar patrocinado. Los anunciantes y patrocinadores son los únicos responsables de asegurarse que el
						material remitido para su inclusión en el Sitio web cumple con las leyes que en cada
						caso puedan ser de aplicación. El titular del Web no será responsable de cualquier
						error, inexactitud o irregularidad que puedan contener los contenidos publicitarios o de
						los patrocinadores.
						En todo caso, para interponer cualquier reclamación relacionada con los Contenidos
						publicitarios insertados en este Sitio web pueden dirigirse a la siguiente dirección de
						correo electrónico: help@estudiofoto.es
					</p>
				</section>
				<section>
					<h2>Propiedad Intelectual e Industrial</h2>
					<p>
						Todos los derechos de propiedad industrial e intelectual de este sitio Web y de las
						distintas páginas web pertenecientes al mismo, así como de los elementos contenidos
						en el mismo y en sus páginas web (incluidos, con carácter enunciativo que no
						limitativo, el diseño gráfico, código fuente, logos, contenidos, imágenes, textos,
						gráficos, ilustraciones, fotografías, bases de datos y demás elementos que aparecen
						en la Web), salvo que se indique lo contrario, son titularidad exclusiva del titular del
						Web o de terceros. En este sentido, el titular de este sitio Web hace expresa reserva
						de todos los derechos.
						Igualmente, todos los nombres comerciales, dominios, marcas o signos distintivos de
						cualquier clase contenidos en el sitio Web y sus páginas webs, están protegidos por la
						Ley.
						El titular del Web no concede ningún tipo de licencia o autorización de uso público y/o
						comercial al Usuario sobre sus derechos de propiedad intelectual e industrial o sobre
						cualquier otro derecho relacionado con este sitio Web, sus páginas webs y los
						servicios ofrecidos en las mismas. El Usuario única y exclusivamente podrá acceder a
						tales elementos y servicios para su uso personal y privado, quedando, por tanto,
						terminantemente prohibida la utilización de la totalidad o parte de los contenidos de
						este Web y páginas webs pertenecientes al mismo con propósitos públicos o
						comerciales, su distribución, comunicación pública, incluida la modalidad de puesta a
						disposición, así como su modificación, alteración o descompilación a no ser que para
						ello se cuente con el consentimiento expreso y por escrito del titular del Web.
						Por ello, el Usuario reconoce que la reproducción, distribución, comercialización,
						transformación, y en general, cualquier otra forma de explotación, por cualquier
						procedimiento, de todo o parte de los contenidos de este sitio Web y sus páginas webs
						constituye una infracción de los derechos de propiedad intelectual y/o industrial del
						titular del Web o de los titulares de los mismos.
					</p>
				</section>
				<section>
					<h2>Régimen de responsabilidad</h2>
					<h4>Responsabilidad por el Uso del Web</h4>
					<p>
El Usuario es el único responsable de las infracciones en las que pueda incurrir o de
los perjuicios que pueda causar por la utilización del Web, quedando el titular del Web,
sus socios, empresas del grupo, colaboradores, empleados y representantes,
exonerados de cualquier clase de responsabilidad que se pudiera derivar por las
acciones del Usuario.
El titular del Web empleará todos los esfuerzos y medios razonables para facilitar
información actualizada y fehaciente en el Web, no obstante, el titular del Web no
asume ninguna garantía en relación con la ausencia de errores, o de posibles
inexactitudes y/u omisiones en ninguno de los contenidos accesibles a través de este
Web.
El Usuario es el único responsable frente a cualquier reclamación o acción legal,
judicial o extrajudicial, iniciada por terceras personas contra el titular del Web basada
en la utilización por el Usuario del Web. En su caso, el Usuario asumirá cuantos
gastos, costes e indemnizaciones sean irrogados al titular de la Web con motivo de
tales reclamaciones o acciones legales.
<h4>Responsabilidad por el funcionamiento del Web</h4>
<p>
El titular del Web excluye toda responsabilidad que se pudiera derivar de
interferencias, omisiones, interrupciones, virus informáticos, averías telefónicas o
desconexiones en el funcionamiento operativo del sistema electrónico, motivado por
causas ajenas al titular de la Web.
Asimismo, el titular del Web también excluye cualquier responsabilidad que pudiera
derivarse por retrasos o bloqueos en el funcionamiento operativo de este sistema
electrónico causado por deficiencias o sobre carga en las líneas telefónicas o en
Internet, así como de daños causados por terceras personas mediante intromisiones
ilegitimas fuera del control del titular del Web.
El titular de la Web está facultado para suspender temporalmente, y sin previo aviso, la
accesibilidad al Web con motivo de operaciones de mantenimiento, reparación,
actualización o mejora.
</p>
<h4>Responsabilidad por links</h4>
<p>
Los enlaces o links contenidos en el Web pueden conducir al Usuario a otros Web
gestionados por terceros.
El titular del Web declina cualquier responsabilidad respecto a la información que se
halle fuera del Web, ya que la función de los links que aparecen es únicamente la de
informar al Usuario sobre la existencia de otras fuentes de información sobre un tema
en concreto.
El titular del Web queda exonerada de toda responsabilidad por el correcto
funcionamiento de tales enlaces, del resultado obtenido a través de dichos enlaces, de
la veracidad y licitud del contenido o información a la que se puede acceder, así como
de los perjuicios que pueda sufrir el Usuario en virtud de la información encontrada en
la Web enlazada.<br>
					</p>
				</section>
				<section>
					<h2>Política respecto a los datos personales obtenidos a través de la web</h2>
						<h4>A través de formularios</h4>
						<p>
						Sin perjuicio de lo previsto en lo indicado en cada uno de los formularios de la Web,
cuando el Usuario facilite sus datos de carácter personal está autorizando
expresamente al titular de la Web al tratamiento de sus Datos Personales para las
finalidades que en los mismos se indiquen. El titular del Web incorporará los datos
facilitados por el Usuario en un fichero titularidad del mismo debidamente comunicado
a la Agencia de Protección de Datos.
El Usuario o su representante podrá ejercitar sus derechos de acceso, rectificación,
cancelación u oposición, mediante solicitud escrita y firmada dirigida al domicilio
indicado en el apartado "Datos informativos" del presente Web.
</p>
						<h4>A través de cookies</h4>
						<p>
						Este Web utiliza cookies. Los cookies son pequeños ficheros de datos que se generan
en el ordenador del usuario y que nos permiten conocer la siguiente información:</p>
<ul>
	<li>La fecha y la hora de la última vez que el usuario visitó nuestro Web.</li>
	<li>El diseño de contenidos que el usuario escogió en su primera vista a nuestro Web.</li>
	<li>Elementos de seguridad que intervienen en el control de acceso a las áreas restringidas.</li>
	<li>El login del usuario.</li>
	<li>La fecha del servidor y la fecha local del cliente.</li>
	<li>El idioma por defecto de la publicación.</li>
</ul>
<p>
El Usuario tiene la opción de impedir la generación de cookies, mediante la selección
de la correspondiente opción en su programa Navegador.</p>
						<h4>Confidencialidad</h4>
						<p>
						El titular del Web se compromete al cumplimiento de su obligación de secreto de los
datos de carácter personal y de su deber de guardarlos de forma confidencial y
adoptará las medidas necesarias para evitar su alteración, pérdida, tratamiento o
acceso no autorizado, habida cuenta en todo momento del estado de la tecnología.
					</p>
				</section>
				<section>
					<h2>Observaciones del usuario</h2>
					<p>
						El Usuario garantiza que la información, material, contenidos u observaciones que no
sean sus propios datos personales y que sean facilitados al titular de la Web través del
Web, no infringen los derechos de propiedad intelectual o industrial de terceros, ni
ninguna otra disposición legal.
La información, materiales, contenidos u observaciones que el Usuario facilite al titular
de la Web, se considerarán no confidenciales, reservándose el titular del Web el
derecho a usarlas de la forma que considere más adecuada.
					</p>
				</section>
				<section>
					<h2>Modificaciones de las condiciones de uso</h2>
					<p>
						El titular del Web se reserva el derecho a modificar, desarrollar o actualizar en
cualquier momento y sin previa notificación, las condiciones de uso del presente Web.
El Usuario quedará obligado automáticamente por las condiciones de uso que se
hallen vigentes en el momento en que acceda al Web, por lo que deberá leer
periódicamente dichas condiciones de uso.
					</p>
				</section>
				<section>
					<h2>Legislación aplicable y competencia jurisdiccional</h2>
					<p>
						Todas las controversias o reclamaciones surgidas de la interpretación o ejecución del
presente Aviso Legal se regirán por la legislación española, y se someterán a la
jurisdicción de los Juzgados y Tribunales de Granada.
					</p>
				</section>
			</div>
		</div>
	</div>
	<button title="Ir arriba" class="scrollup">
        <i class="fas fa-chevron-up"></i>
    </button>
    	<?php 
    		footer("/",$userId);
    	 ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>