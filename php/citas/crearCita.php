<?php 
session_start();
include '../conectarServidor.php'; 
$userId = getId();

if (checkID($userId,"cliente")==-1) {
	header("Location:../../login.php");
}elseif (checkID($userId,"cliente")==0) {
	header("Location:../../index.php");
}

?>
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
			menu("trabajos",$userId);
		?>
	
	<?php 
		/**
		 * Si hay algún dato que llegue desde el formulario, 
		 * se ejecuta todo, si no, se reenvía al usuario a citas.php
		 * para evitar crear una cita con datos en blanco por error.
		 */
		if (isset($_POST["motivo"])) {

			$codigo     = $_POST["c"];
			$motivo     = $_POST["motivo"];
			$lugar  = $_POST["lugar"];
			$fecha  = $_POST["fecha"];
			$hora  = $_POST["hora"];
			$id_cliente  = $_POST["id_cliente"];
			
			

			$conector = conectarServer();

			
			$consulta = "INSERT into citas VALUES (NULL,'$fecha','$hora','$motivo','$lugar','$id_cliente');";
			
			
			if ($conector->query($consulta) === TRUE) {
			    echo "<h2 class=\"mensaje correcto\"><span>Cita creada con éxito!</span></h2>";
			} else {
			    echo "<h2 class=\"mensaje error\"><span>Error al crear la cita: " . $conector->error."</span></h2>";
			}
			
			

			/**
			 * Luego de ejecutarlo, se esperan 5 segundos
			 * y se manda al usuario de nuevo a citas.php.
			 */
			mysqli_close($conector);
			header("Refresh:5; url=citas.php");
		}else{
			header("Location: citas.php");
		}
		


	?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>