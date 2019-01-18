<?php 

	function conectarServer(){
		$conector = mysqli_connect("localhost","root","","estudio");
		mysqli_set_charset($conector,"utf8");
		return $conector;
	}

	function menu($ruta,$id){
		if($ruta == "/"){
			if ($id == -1) {
				echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\" style=\"width:100%;\">
					<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    					<span class=\"navbar-toggler-icon\"></span>
  					</button>
  					<a class=\"navbar-brand\" href=\"index.php\"><img src=\"img/logo.png\" alt=\"Logo de la empresa\" width=\"50px\" id=\"logoEmpresa\"></a>
  					<div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
    					<ul class=\"navbar-nav\">
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link text-light\" href=\"php/trabajos/trabajos.php\">Trabajos</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link disabled\" href=\"#\">Contacto</a>
      						</li>
    					</ul>

  					</div>
  					<form id='login' action='login.php' method='post'>
  						<button type='submit' class='btn btn-light' form='login'><i class=\"fas fa-sign-in-alt\"></i></button>
  					</form>
				</nav>";
			}else if ($id==0) {
				# menú de admin
				echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\" style=\"width:100%;\">
					<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    					<span class=\"navbar-toggler-icon\"></span>
  					</button>
  					<a class=\"navbar-brand\" href=\"index.php\"><img src=\"img/logo.png\" alt=\"Logo de la empresa\" width=\"50px\" id=\"logoEmpresa\"></a>
  					<div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
    					<ul class=\"navbar-nav\">
    						<li class=\"nav-item\">
      							<a class=\"nav-item nav-link text-light\" href=\"php/noticias/noticias.php\">Noticias</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link text-light\" href=\"php/clientes/clientes.php\">Clientes</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link text-light\" href=\"php/trabajos/trabajos.php\">Trabajos</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link text-light\" href=\"php/citas/citas.php\">Citas</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link disabled\" href=\"#\">Contacto</a>
      						</li>
    					</ul>

  					</div>
  					<form id='cerrarSesion' action='php/utils/cerrarSesion.php' method='post'>
  						<button type='submit' class='btn btn-light' form='cerrarSesion'>Cerrar sesión de Administrador</button>
  					</form>
				</nav>";
			}else{
				# menú de cliente
				$conector = conectarServer();

				$consulta = "SELECT nombre from clientes where id = '$id'";
				$datos = mysqli_query($conector,$consulta);
				$resul = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\" style=\"width:100%;\">
					<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    					<span class=\"navbar-toggler-icon\"></span>
  					</button>
  					<a class=\"navbar-brand\" href=\"index.php\"><img src=\"img/logo.png\" alt=\"Logo de la empresa\" width=\"50px\" id=\"logoEmpresa\"></a>
  					<div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
    					<ul class=\"navbar-nav\">
    						<li class=\"nav-item\">
      							<a class=\"nav-item nav-link text-light\" href=\"php/utils/datos.php\">Mis Datos</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link text-light\" href=\"php/trabajos/trabajos.php?c=true\">Mis Trabajos</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link text-light\" href=\"php/citas/citas.php?c=true\">Mis Citas</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link text-light\" href=\"php/trabajos/trabajos.php?show=available\">Trabajos Disponibles</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link disabled\" href=\"#\">Contacto</a>
      						</li>
    					</ul>

  					</div>
  					<form id='cerrarSesion' action='php/utils/cerrarSesion.php' method='post'>
  						<button type='submit' class='btn btn-light' form='cerrarSesion'>Cerrar sesión de $resul[nombre]</button>
  					</form>
				</nav>";
			}
		}else{
			if ($id == -1) {
				echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\" style=\"width:100%;\">
					<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    					<span class=\"navbar-toggler-icon\"></span>
  					</button>
  					<a class=\"navbar-brand\" href=\"../../index.php\"><img src=\"../../img/logo.png\" alt=\"Logo de la empresa\" width=\"50px\" id=\"logoEmpresa\"></a>
  					<div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
    					<ul class=\"navbar-nav\">
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link text-light\" href=\"../trabajos/trabajos.php\">Trabajos</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link disabled\" href=\"#\">Contacto</a>
      						</li>
    					</ul>

  					</div>
  					<form id='login' action='../utils/login.php' method='post'>
  						<button type='submit' class='btn btn-light' form='login'><i class=\"fas fa-sign-in-alt\"></i></button>
  					</form>
				</nav>";
			}else if ($id==0) {
				# menú de admin
				echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\" style=\"width:100%;\">
					<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    					<span class=\"navbar-toggler-icon\"></span>
  					</button>
  					<a class=\"navbar-brand\" href=\"../index.php\"><img src=\"../img/logo.png\" alt=\"Logo de la empresa\" width=\"50px\" id=\"logoEmpresa\"></a>
  					<div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
    					<ul class=\"navbar-nav\">
    						<li class=\"nav-item\">
      							<a class=\"nav-item nav-link text-light\" href=\"../noticias/noticias.php\">Noticias</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link text-light\" href=\"../clientes/clientes.php\">Clientes</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link text-light\" href=\"../trabajos/trabajos.php\">Trabajos</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link text-light\" href=\"../citas/citas.php\">Citas</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link disabled\" href=\"#\">Contacto</a>
      						</li>
    					</ul>

  					</div>
  					<form id='cerrarSesion' action='../utils/cerrarSesion.php' method='post'>
  						<button type='submit' class='btn btn-light' form='cerrarSesion'>Cerrar sesión de Administrador</button>
  					</form>
				</nav>";
			}else{
				# menú de cliente
				$conector = conectarServer();

				$consulta = "SELECT nombre from clientes where id = '$id'";
				$datos = mysqli_query($conector,$consulta);
				$resul = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\" style=\"width:100%;\">
					<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    					<span class=\"navbar-toggler-icon\"></span>
  					</button>
  					<a class=\"navbar-brand\" href=\"../../index.php\"><img src=\"../../img/logo.png\" alt=\"Logo de la empresa\" width=\"50px\" id=\"logoEmpresa\"></a>
  					<div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
    					<ul class=\"navbar-nav\">
    						<li class=\"nav-item\">
      							<a class=\"nav-item nav-link text-light\" href=\"../utils/datos.php\">Mis Datos</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link text-light\" href=\"../trabajos/trabajos.php?c=true\">Mis Trabajos</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link text-light\" href=\"../citas/citas.php?c=true\">Mis Citas</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link text-light\" href=\"../trabajos/trabajos.php?show=available\">Trabajos Disponibles</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link disabled\" href=\"#\">Contacto</a>
      						</li>
    					</ul>

  					</div>
  					<form id='cerrarSesion' action='../utils/cerrarSesion.php' method='post'>
  						<button type='submit' class='btn btn-light' form='cerrarSesion'>Cerrar sesión de $resul[nombre]</button>
  					</form>
				</nav>";
			}
		}
	}

	function contextmenu($ruta){
		if($ruta == "/"){
			echo "<div class=\"menu\">
			<ul class=\"menu-options\">
				<li><a href=\"index.php\" class=\"menu-option\">Inicio</a></li>
				<li><a href=\"php/noticias/noticias.php\" class=\"menu-option\">Noticias</a></li>
				<li><a href=\"php/clientes/clientes.php\" class=\"menu-option\">Clientes</a></li>
				<li><a href=\"php/trabajos/trabajos.php\" class=\"menu-option\">Trabajos</a></li>
				<li><a href=\"php/citas/citas.php\" class=\"menu-option\">Citas</a></li>
				<li><a href=\"#\" class=\"menu-option\">Contacto</a></li>
			</ul>
			</div>";
		
		}else{
			switch ($ruta) {
				case 'noticias':
							echo "<div class=\"menu\">
			<ul class=\"menu-options\">
				<li><a href=\"crearNuevaNoticia.php\" class=\"menu-option\">Crear Noticia</a></li>
			</ul>
			</div>";
					break;
				case 'clientes':
					echo "<div class=\"menu\">
			<ul class=\"menu-options\">
				<li><a href=\"crearNuevoCliente.php\" class=\"menu-option\">Crear Cliente</a></li>
			</ul>
			</div>";
					break;
				case 'trabajos':
					echo "<div class=\"menu\">
			<ul class=\"menu-options\">
				<li><a href=\"crearNuevoTrabajo.php\" class=\"menu-option\">Crear Trabajo</a></li>
			</ul>
			</div>";
					break;
				case 'citas':
					echo "<div class=\"menu\">
			<ul class=\"menu-options\">
				<li><a href=\"crearNuevaCita.php\" class=\"menu-option\">Crear Cita</a></li>
			</ul>
			</div>";
					break;
				default:
					# code...
					break;
			}
		}
	}
	/**
	 * [convertirFecha Convierte una fecha de formato
	 * entendible para el usuario a formato entendible
	 * para SQL.]
	 * @param  [string] $fecha   [La fecha a cambiar]
	 * @param  [boolean] $reverse [Si se desea cambiar a de usuario a SQL(false) o viceversa(true).]
	 * @return [string]          [La fecha convertida]
	 */
	function convertirFecha($fecha,$reverse){
		if(!$reverse){
			$fechacita = explode("/",$fecha);
			$fecha = $fechacita[2]."-".$fechacita[1]."-".$fechacita[0];
			return $fecha;
		}else{
			$fechacita = explode("-",$fecha);
			$fecha = $fechacita[2]."/".$fechacita[1]."/".$fechacita[0];
			return $fecha;
		}
		
	}

	function mapaweb($ubicacion){
		if ($ubicacion=="/") {
			echo "<div class='mapaweb'>
    	<div style='background-color:#494949aa;width: 379px;'>
    		<figure><img src='img/mapaweb.png' alt='Mapa Web' width='300px'><figcaption>Esquema de la web. Las líneas representan los enlaces entre cada página, los puntos.</figcaption></figure>
    		<ul>
    			<li>Clientes: Página para visualizar los clientes.</li>
    			<li>Noticias: Página para visualizar las noticias.</li>
    			<li>Trabajos: Página para visualizar los trabajos.</li>
    			<li>Citas: Página para visualizar las citas.</li>
    			<li>Clientes: Página para visualizar los clientes.</li>
    			<li>Índice: Página de inicio.</li>
    			<li>Inicio: La raíz de la web, te autodirige a Índice, por lo que comparte sus enlaces.</li>
    		</ul>
    	</div>
    	<button title='Mostrar Ayuda' class='help'>
        	<i class='fas fa-question-circle'></i>
    	</button> 
    </div>";
		}else{
			echo "<div class='mapaweb'>
    	<div style='background-color:#494949aa;width: 379px;'>
    		<figure><img src='../../img/mapaweb.png' alt='Mapa Web' width='300px'><figcaption>Esquema de la web. Las líneas representan los enlaces entre cada página, los puntos.</figcaption></figure>
    		<ul>
    			<li>Clientes: Página para visualizar los clientes.</li>
    			<li>Noticias: Página para visualizar las noticias.</li>
    			<li>Trabajos: Página para visualizar los trabajos.</li>
    			<li>Citas: Página para visualizar las citas.</li>
    			<li>Clientes: Página para visualizar los clientes.</li>
    			<li>Índice: Página de inicio.</li>
    			<li>Inicio: La raíz de la web, te autodirige a Índice, por lo que comparte sus enlaces.</li>
    		</ul>
    	</div>
    	<button title='Mostrar Ayuda' class='help'>
        	<i class='fas fa-question-circle'></i>
    	</button> 
    </div>";
		}
	}

	function footer($ubicacion,$id){
		if ($ubicacion=="/") {
			if ($id==0) {
				echo "<footer>
			<div class='footer text-light'>
			<h5>Estudio de Fotografía</h5>
			<div style='display:flex;justify-content:space-between;'>
			<ul>
				<li><a href=\"index.php\" class=' text-warning'>Inicio</a></li>
				<li><a href=\"php/noticias/noticias.php\" class=' text-warning'>Noticias</a></li>
				<li><a href=\"php/clientes/clientes.php\" class=' text-warning'>Clientes</a></li>
				<li><a href=\"php/trabajos/trabajos.php\" class=' text-warning'>Trabajos</a></li>
				<li><a href=\"php/citas/citas.php\" class=' text-warning'>Citas</a></li>
			</ul>
			<p class='footer-details'>
				FOTOS Y OBJETIVOS, S.L. con domicilio en la Calle Gran Vía de Colón, 23, 18001, Granada, Granada; CIF, B56363626 y nº de inscripción en el Registro Mercantil de Granada, Tomo 5743, Folio 298, SECCION  3,  Hoja número F-49643, inscripción 3º,es titular de esta web.
				Para ver más información sobre el sitio pulsar <a href='./info_page.php' class=' text-warning'>aquí</a>.
			</p>
			</div>
			</div>
			</footer>";
			}else{
				#Footer cliente
				echo "<footer>
			<div class='footer text-light'>
			<h5>Estudio de Fotografía</h5>
			<div style='display:flex;justify-content:space-between;'>
			<ul>
				<li><a href=\"index.php\" class='text-warning'>Inicio</a></li>
				<li><a href=\"php/utils/datos.php\" class='text-warning'>Mis Datos</a></li>
				<li><a href=\"php/trabajos/trabajos.php?c=true\" class='text-warning'>Mis Trabajos</a></li>
				<li><a href=\"php/citas/citas.php?c=true\" class='text-warning'>Mis Citas</a></li>
				<li><a href=\"php/trabajos/trabajos.php\" class='text-warning'>Trabajos Disponibles</a></li>
			</ul>
			<p class='footer-details'>
				FOTOS Y OBJETIVOS, S.L. con domicilio en la Calle Gran Vía de Colón, 23, 18001, Granada, Granada; CIF, B56363626 y nº de inscripción en el Registro Mercantil de Granada, Tomo 5743, Folio 298, SECCION  3,  Hoja número F-49643, inscripción 3º,es titular de esta web.
				Para ver más información sobre el sitio pulsar <a href='./info_page.php' class='text-warning'>aquí</a>.
			</p>
			</div>
			</div>
			</footer>";
			}
			
		}else{
			if ($id == 0) {
				echo "<div class='footer text-light'>
			<h5>Estudio de Fotografía</h5>
			<div style='display:flex;justify-content:space-between;'>
			<ul>
				<li><a href=\"../../index.php\" class='text-warning'>Inicio</a></li>
				<li><a href=\"../noticias/noticias.php\" class='text-warning'>Noticias</a></li>
				<li><a href=\"../clientes/clientes.php\" class='text-warning'>Clientes</a></li>
				<li><a href=\"../trabajos/trabajos.php\" class='text-warning'>Trabajos</a></li>
				<li><a href=\"../citas/citas.php\" class='text-warning'>Citas</a></li>
			</ul>
			<p class='footer-details'>
				FOTOS Y OBJETIVOS, S.L. con domicilio en la Calle Gran Vía de Colón, 23, 18001, Granada, Granada; CIF, B56363626 y nº de inscripción en el Registro Mercantil de Granada, Tomo 5743, Folio 298, SECCION  3,  Hoja número F-49643, inscripción 3º,es titular de esta web.
				Para ver más información sobre el sitio pulsar <a href='../../info_page.php' class='text-warning'>aquí</a>.
			</p>
			</div>
			</div>";
			}else{
				#footer cliente
					echo "<div class='footer text-light'>
			<h5>Estudio de Fotografía</h5>
			<div style='display:flex;justify-content:space-between;'>
			<ul>
				<li><a href=\"../../index.php\" class='text-warning'>Inicio</a></li>
				<li><a href=\"../utils/datos.php\" class='text-warning'>Mis Datos</a></li>
				<li><a href=\"../trabajos/trabajos.php?c=true\" class='text-warning'>Mis Trabajos</a></li>
				<li><a href=\"../citas/citas.php?c=true\" class='text-warning'>Mis Citas</a></li>
				<li><a href=\"../trabajos/trabajos.php\" class='text-warning'>Trabajos Disponibles</a></li>
				
			</ul>
			<p class='footer-details'>
				FOTOS Y OBJETIVOS, S.L. con domicilio en la Calle Gran Vía de Colón, 23, 18001, Granada, Granada; CIF, B56363626 y nº de inscripción en el Registro Mercantil de Granada, Tomo 5743, Folio 298, SECCION  3,  Hoja número F-49643, inscripción 3º,es titular de esta web.
				Para ver más información sobre el sitio pulsar <a href='../../info_page.php' class='text-warning'>aquí</a>.
			</p>
			</div>
			</div>";
			}
			
		}
	}
	/**
	 * [comprobarNickValido Comprueba si un nick existe ya en la base de datos para que no se repita]
	 * @param  [string] $nick [El nick a comprobar]
	 * @return [boolean]       [true si es válido y false si no lo es]
	 */
	function comprobarNickValido($nick){
		$conector = conectarServer();

		$consulta = "SELECT nick from clientes;";

		$datos = mysqli_query($conector,$consulta);

		$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);

		while(!is_null($resultado)){
			if($resultado["nick"]==$nick){
				mysqli_close($conector);
				return false;
			}else{
				$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
			}
		}
		mysqli_close($conector);
		return true;
	}

	function busca_citas ($fecha)
	{
		$cone = conectarServer();
		$consulta = "select id_cliente from citas where fecha = '$fecha'";
		$datos = mysqli_query($cone, $consulta);

		if(mysqli_num_rows($datos)>0)
			return true;
		else
			return false;
	}

	function busca_citas_id ($fecha,$id)
	{
		$cone = conectarServer();
		$consulta = "select id_cliente from citas where fecha = '$fecha' and id_cliente = '$id'";
		$datos = mysqli_query($cone, $consulta);

		if(mysqli_num_rows($datos)>0)
			return true;
		else
			return false;
	}

	function archivo_id($archivo){
		$nombrearchivo = explode(".",$archivo);

		return $nombrearchivo[0];
	}

	function num_citas ($fecha){
		$conector = conectarServer();
		$consulta = "SELECT COUNT(id) citas from citas where fecha = '$fecha'";
		$datos = mysqli_query($conector,$consulta);
		$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
		return $resultado["citas"];
	}

	function num_citas_id ($fecha,$id){
		$conector = conectarServer();
		$consulta = "SELECT COUNT(id) citas from citas where fecha = '$fecha' and id_cliente = $id";
		$datos = mysqli_query($conector,$consulta);
		$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
		return $resultado["citas"];
	}

	function getId(){
		if (isset($_SESSION["id"])) {
			return $_SESSION["id"];
		}else if (isset($_COOKIE["idsession"])) {
				session_decode($_COOKIE["idsession"]);
				return $_SESSION["id"];
		}else{
			return -1;
		}
	}
?>