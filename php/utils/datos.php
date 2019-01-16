<?php 
session_start();

include '../conectarServidor.php';

$userId = getId();

$conector = conectarServer();

$consulta1 = "SELECT nombre,apellidos, apellidos, direccion, telefono1, telefono2, nick FROM clientes WHERE id = '$userId'";

$datos = mysqli_query($conector,$consulta1);

$resul = mysqli_fetch_assoc($datos);


 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo "Perfil de $resul[nombre] $resul[apellidos] | Estudio de Fotografía"; ?></title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../js/scroll.js"></script>
	<script type="text/javascript" src="../../js/mostrarAyuda.js"></script>
	<link rel="stylesheet" href="../../css/main.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
				<?php
					/**
					 * Se llama a la función que crea el menú con php como parámetro 'ruta'
					 */
					menu("php",$userId);
				?>
		</div>
	</div>
		<?php 
		if(isset($_GET["edit"])&&$_GET["edit"]==0){
			echo "<div class=\"alert alert-danger\" role=\"alert\">
  		Los datos no se han posido actualizar de forma correcta. Intentalo de nuevo.
	</div>";
		}else if(isset($_GET["edit"])&&$_GET["edit"]==1){
			echo "<div class=\"alert alert-success\" role=\"alert\">
  		Los datos se han actualizado de forma correcta.
	</div>";
		}
		
	 ?>
	<div class="container">
		<div class="row">
			<div class="col-8 offset-2 border mt-5 bg-secondary">
				<div style="display: flex;justify-content: space-around;">
					<div style="
    					width: 200px;
    					height: 91px;
    					margin-top: -10px;">
					<img src="../../img/stock.jpg" style="object-fit: scale-down; object-position: center; 
						width: inherit;">
					</div>
					<div style="display: flex; flex-direction: column; justify-content: center;align-items: center;">
						<span class="badge badge-success">Cliente</span>
					<form action="editarDatosCliente.php" method="post" name="editarDatosCliente">
					<button type="submit" name="editarDatosCliente" class="btn btn-light">
						<i class="fas fa-user-edit"></i>
						<span class="text-dark">Editar Datos</span>
					</button>
					</form>
					</div>
					
				</div>
				
				<div style="margin-top: 53px;">
					<form>
  						<fieldset disabled>
    						<div class="form-group">
      							<label for="nombre">Nombre</label>
      							<?php echo "<input type=\"text\" id=\"nombre\" class=\"form-control\" value=\"$resul[nombre]\">"; ?>
      							<label for="apellidos">Apellidos</label>
      							<?php echo "<input type=\"text\" id=\"apellidos\" class=\"form-control\" value=\"$resul[apellidos]\">"; ?>
      							<label for="direccion">Dirección</label>
      							<?php echo "<input type=\"text\" id=\"direccion\" class=\"form-control\" value=\"$resul[direccion]\">"; ?>
      							<label for="telefono1">Teléfono 1</label>
      							<?php echo "<input type=\"text\" id=\"telefono1\" class=\"form-control\" value=\"$resul[telefono1]\">"; ?>
      							<label for="telefono2">Teléfono 2 (Opcional)</label>
      							<?php echo "<input type=\"text\" id=\"telefono2\" class=\"form-control\" value=\"$resul[telefono2]\">"; ?>
      							<label for="nick">Nombre de Usuario</label>
      							<?php echo "<input type=\"text\" id=\"nick\" class=\"form-control\" value=\"$resul[nick]\">"; ?>
  						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
});
</script>
</html>