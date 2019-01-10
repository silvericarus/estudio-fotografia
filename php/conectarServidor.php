<?php 
	function conectarServer(){
		$conector = mysqli_connect("localhost","root","","estudio");
		mysqli_set_charset($conector,"utf8");
		return $conector;
	}

	function menu($ruta){
		if($ruta == "/"){
			echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\" style=\"width:100%;\">
					<a class=\"navbar-brand\" href=\"index.php\"><img src=\"img/logo.png\" alt=\"Logo de la empresa\" width=\"50px\" id=\"logoEmpresa\"></a>
					<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    					<span class=\"navbar-toggler-icon\"></span>
  					</button>
  					<div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
    					<ul class=\"navbar-nav\">
    						<li class=\"nav-item\">
      							<a class=\"nav-item nav-link\" href=\"php/noticias/noticias.php\">Noticias</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link\" href=\"php/clientes/clientes.php\">Clientes</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link\" href=\"php/trabajos/trabajos.php\">Trabajos</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link\" href=\"php/citas/citas.php\">Citas</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link disabled\" href=\"#\">Contacto</a>
      						</li>
    					</ul>
  					</div>
  					<form class=\"form-inline\">
  					<div class=\"input-group my-2\">
  						<div class=\"input-group-prepend\">
    						<span class=\"input-group-text\" id=\"basic-addon1\"><i class=\"fas fa-user\"></i></span>
  						</div>
  						<input class=\"form-control mr-sm-2\" type=\"text\" placeholder=\"Usuario\" aria-label=\"Usuario\">
  					</div>
  					<div class=\"input-group my-2\">
  						<div class=\"input-group-prepend\">
    						<span class=\"input-group-text\" id=\"basic-addon2\"><i class=\"fas fa-key\"></i></span>
  						</div>
  						<input class=\"form-control mr-sm-2\" type=\"password\" placeholder=\"Contraseña\" aria-label=\"Contraseña\">
  					</div>
  					<div class=\"form-check form-check-inline\">
  						<input class=\"form-check-input\" type=\"checkbox\" id=\"recordarCheck\" value=\"recordar\" name=\"recordarCheck\">
  						<label class=\"form-check-label\" for=\"recordarCheck\">Recordarme</label>
					</div>
  					<button class=\"btn btn-outline-success my-2\" type=\"submit\">Iniciar Sesión</button>
  					</form>
				</nav>";
		}else{
						echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\" style=\"width:100%;\">
					<a class=\"navbar-brand\" href=\"../../index.php\"><img src=\"../../img/logo.png\" alt=\"Logo de la empresa\" width=\"50px\" id=\"logoEmpresa\"></a>
					<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    					<span class=\"navbar-toggler-icon\"></span>
  					</button>
  					<div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
    					<ul class=\"navbar-nav\">
    						<li class=\"nav-item\">
      							<a class=\"nav-item nav-link\" href=\"../noticias/noticias.php\">Noticias</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link\" href=\"../clientes/clientes.php\">Clientes</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link\" href=\"../trabajos/trabajos.php\">Trabajos</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link\" href=\"../citas/citas.php\">Citas</a>
      						</li>
      						<li class=\"nav-item\">
      						<a class=\"nav-item nav-link disabled\" href=\"#\">Contacto</a>
      						</li>
    					</ul>
  					</div>
  					<form class=\"form-inline\">
  					<div class=\"input-group my-2\">
  						<div class=\"input-group-prepend\">
    						<span class=\"input-group-text\" id=\"basic-addon1\"><i class=\"fas fa-user\"></i></span>
  						</div>
  						<input class=\"form-control mr-sm-2\" type=\"text\" placeholder=\"Usuario\" aria-label=\"Usuario\">
  					</div>
  					<div class=\"input-group my-2\">
  						<div class=\"input-group-prepend\">
    						<span class=\"input-group-text\" id=\"basic-addon2\"><i class=\"fas fa-key\"></i></span>
  						</div>
  						<input class=\"form-control mr-sm-2\" type=\"password\" placeholder=\"Contraseña\" aria-label=\"Contraseña\">
  					</div>
  					<div class=\"form-check form-check-inline\">
  						<input class=\"form-check-input\" type=\"checkbox\" id=\"recordarCheck\" value=\"recordar\" name=\"recordarCheck\">
  						<label class=\"form-check-label\" for=\"recordarCheck\">Recordarme</label>
					</div>
  					<button class=\"btn btn-outline-success my-2\" type=\"submit\">Iniciar Sesión</button>
  					</form>
				</nav>";
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

	function footer($ubicacion){
		if ($ubicacion=="/") {
			echo "<footer>
			<div class='footer'>
			<h5>Estudio de Fotografía</h5>
			<div style='display:flex;justify-content:space-between;'>
			<ul>
				<li><a href=\"index.php\">Inicio</a></li>
				<li><a href=\"php/noticias/noticias.php\">Noticias</a></li>
				<li><a href=\"php/clientes/clientes.php\">Clientes</a></li>
				<li><a href=\"php/trabajos/trabajos.php\">Trabajos</a></li>
				<li><a href=\"php/citas/citas.php\">Citas</a></li>
			</ul>
			<p class='footer-details'>
				FOTOS Y OBJETIVOS, S.L. con domicilio en la Calle Gran Vía de Colón, 23, 18001, Granada, Granada; CIF, B56363626 y nº de inscripción en el Registro Mercantil de Granada, Tomo 5743, Folio 298, SECCION  3,  Hoja número F-49643, inscripción 3º,es titular de esta web.
				Para ver más información sobre el sitio pulsar <a href='./info_page.php'>aquí</a>.
			</p>
			</div>
			</div>
			</footer>";
		}else{
			echo "<div class='footer'>
			<h5>Estudio de Fotografía</h5>
			<div style='display:flex;justify-content:space-between;'>
			<ul>
				<li><a href=\"../../index.php\">Inicio</a></li>
				<li><a href=\"../noticias/noticias.php\">Noticias</a></li>
				<li><a href=\"../clientes/clientes.php\">Clientes</a></li>
				<li><a href=\"../trabajos/trabajos.php\">Trabajos</a></li>
				<li><a href=\"../citas/citas.php\">Citas</a></li>
			</ul>
			<p class='footer-details'>
				FOTOS Y OBJETIVOS, S.L. con domicilio en la Calle Gran Vía de Colón, 23, 18001, Granada, Granada; CIF, B56363626 y nº de inscripción en el Registro Mercantil de Granada, Tomo 5743, Folio 298, SECCION  3,  Hoja número F-49643, inscripción 3º,es titular de esta web.
				Para ver más información sobre el sitio pulsar <a href='../../info_page.php'>aquí</a>.
			</p>
			</div>
			</div>";
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
?>