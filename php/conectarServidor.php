<?php 
	function conectarServer(){
		$conector = mysqli_connect("localhost","root","","estudio");
		mysqli_set_charset($conector,"utf8");
		return $conector;
	}

	function menu($ruta){
		if($ruta == "/"){
			echo "<div id=\"navbar\">
			<ul>
				<li><img src=\"img/logo.png\" alt=\"Logo de la empresa\" width=\"50px\" id=\"logoEmpresa\"></li>
				<li><a href=\"index.php\">Inicio</a></li>
				<li><a href=\"php/noticias/noticias.php\">Noticias</a></li>
				<li><a href=\"php/clientes/clientes.php\">Clientes</a></li>
				<li><a href=\"php/trabajos/trabajos.php\">Trabajos</a></li>
				<li><a href=\"php/citas/citas.php\">Citas</a></li>
				<li><a href=\"#\">Contacto</a></li>
			</ul>
			<a href=\"#\"><i class=\"fas fa-sign-in-alt\"></i></a>
			</div>";
		
		}else{
			echo "<div id=\"navbar\">
			<ul>
				<li><img src=\"../../img/logo.png\" alt=\"Logo de la empresa\" width=\"50px\" id=\"logoEmpresa\"></li>
				<li><a href=\"../../index.php\">Inicio</a></li>
				<li><a href=\"../noticias/noticias.php\">Noticias</a></li>
				<li><a href=\"../clientes/clientes.php\">Clientes</a></li>
				<li><a href=\"../trabajos/trabajos.php\">Trabajos</a></li>
				<li><a href=\"../citas/citas.php\">Citas</a></li>
				<li><a href=\"#\">Contacto</a></li>
			</ul>
			<a href=\"#\"><i class=\"fas fa-sign-in-alt\"></i></a>
			</div>";
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
			<img src='img/logo.png' alt='Logo Empresa' width='150px'>
			<ul>
				<li><a href=\"index.php\">Inicio</a></li>
				<li><a href=\"php/noticias/noticias.php\">Noticias</a></li>
				<li><a href=\"php/clientes/clientes.php\">Clientes</a></li>
				<li><a href=\"php/trabajos/trabajos.php\">Trabajos</a></li>
				<li><a href=\"php/citas/citas.php\">Citas</a></li>
			</ul>
			</div>
			</footer>";
		}else{
			echo "<div class='footer'>
			<img src='../../img/logo.png' alt='Logo Empresa' width='150px'>
			<ul>
				<li><a href=\"../../index.php\">Inicio</a></li>
				<li><a href=\"../noticias/noticias.php\">Noticias</a></li>
				<li><a href=\"../clientes/clientes.php\">Clientes</a></li>
				<li><a href=\"../trabajos/trabajos.php\">Trabajos</a></li>
				<li><a href=\"../citas/citas.php\">Citas</a></li>
			</ul>
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
?>