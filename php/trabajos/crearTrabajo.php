<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Creando trabajo | Estudio de Fotografía</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/main.css">
</head>
<body>
	
		<?php 
			include '../conectarServidor.php';
			menu("trabajos");
		?>
	
	<?php 
		/**
		 * Si hay algún dato que llegue desde el formulario, 
		 * se ejecuta todo, si no, se reenvía al usuario a trabajos.php
		 * para evitar crear un trabajo con datos en blanco por error.
		 */
		if (isset($_POST["titulo"])) {

			$codigo     = $_POST["t"];
			$titulo     = $_POST["titulo"];
			$descripcion  = $_POST["descripcion"];
			$precio  = $_POST["precio"];
			$id_cliente  = $_POST["id_cliente"];
			$dir_subida = "../../img/trabajos";
			$formato = $_FILES["imagen"]["type"];
			if($formato =="image/png"){
				$nombrefinal = $dir_subida."/".$codigo.".png";
				$archivo = $codigo.".png";
			}else{
				$nombrefinal = $dir_subida."/".$codigo.".jpg";
				$archivo = $codigo.".jpg";
			}
			
			if(!file_exists($dir_subida)){
				mkdir($dir_subida);
			}

			$conector = conectarServer();

			
			$consulta = "INSERT into trabajos VALUES (NULL,'$titulo','$descripcion','$precio','$id_cliente','$archivo');";
			
			if(move_uploaded_file($_FILES['imagen']['tmp_name'],$nombrefinal)){
					if ($conector->query($consulta) === TRUE) {
				    echo "<h2 class=\"mensaje correcto\"><span>Trabajo creado con éxito!</span></h2>";
				} else {
				    echo "<h2 class=\"mensaje error\"><span>Error al crear el trabajo: " . $conector->error."</span></h2>";
				}
			}else{
				echo "<h2 class=\"mensaje error\"><span>Error al crear el trabajo: Fallo de subida de imagen</span></h2>";
			}
			

			/**
			 * Luego de ejecutarlo, se esperan 5 segundos
			 * y se manda al usuario de nuevo a trabajos.php.
			 */
			mysqli_close($conector);
			header("Refresh:5; url=trabajos.php");
		}else{
			header("Location: trabajos.php");
		}
		


	?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>