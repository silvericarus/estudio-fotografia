<?php 
session_start();
include '../conectarServidor.php'; 
$userId = getId();

if (checkID($userId,"admin")==-1) {
	header("Location:../../login.php");
}elseif (checkID($userId,"admin")==0) {
	header("Location:../../index.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Trabajo | Estudio de Fotografía</title>
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

		$id=$_POST["t"];

		$conector = conectarServer();

		$consulta = "SELECT t.titulo from trabajos t where t.id = $id;";
		$consulta2 = "SELECT id,nombre from clientes;";

		$datos = mysqli_query($conector,$consulta);
		$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);

		$datos2 = mysqli_query($conector,$consulta2);
		$resultado2 = mysqli_fetch_array($datos2,MYSQLI_ASSOC);
		echo "<div class=\"container\">
		<div class=\"row\">
			<div class=\"col-6 offset-3 bg-dark text-light\">";
		echo "<form action=\"actualizarTrabajo.php\" method=\"post\"><input type='hidden' name='t' value='$id'>";
		echo "<div class='form-row'><div class='form-group col-12'><label for=\"propietario\">Cliente al que se ha vendido el trabajo $resultado[titulo]</label><select name=\"propietario\">";
		while(!is_null($resultado2)){
			echo "<option value=\"$resultado2[id]\">$resultado2[nombre]</option>";
			$resultado2 = mysqli_fetch_array($datos2,MYSQLI_ASSOC);
		}
		echo "</select></div></div>";
		echo "<div class='form-row'><div class='form-group col-12'><input type=\"submit\" class='btn btn-light btn-block' value=\"Modificar\"></div></div>";
		echo "</form>";
		echo "</div>";
		mysqli_close($conector);
	?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>