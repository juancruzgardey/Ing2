<?php include("sessionAdmin.php"); ?>
<DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Bestnid</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="Bootstrap/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="estilopropio.css">

		<link rel="stylesheet" href="Bootstrap/css/jquery-ui.css" />

		<script src="Bootstrap/js/jquery-1.11.3.js"></script>
		<script src="Bootstrap/js/jquery-ui.js"></script>

		<script src="Bootstrap/js/bootstrap.js"></script>
		<script src="Bootstrap/js/validarCategoria.js"></script>
	</head>
	<script>
		window.onload = function () {
			document.getElementById("b_ingresar").onclick = validarInsercionCategoria;
		}
	</script>
	<body>
		<?php 
			include ("navbarAdmin.html"); 
		?>
		<section class="main container-fluid">
			<div class="row">	
				<div class="col-sm-3 col-md-2 sidebar">
		        	<ul class="nav nav-sidebar"> 	
			            <li class="active"><a class="text-danger" href="home.php"><strong>Categorias</strong></a></li>
			            <?php			          
							include("conexion.php");
							$result = mysqli_query ($link, "SELECT * FROM Categoria");
							while ($row=mysqli_fetch_array($result) ) {
								echo "<li><a class='text-danger' href='listadoProductosPorCategoria.php?idCategoria=".$row["idCategoria"]." '>".$row["nombre"]."</a></li>";
							}
						?>
			        </ul>
		        </div>
		        <div class="col-md-3">
		        	<h2>Ingresar una categor&iacute;a</h2>
		        </div>
		        <div class="col-md-7">
		        	<form name="frm-altaCategoria" id="f_altaCategoria" action="insertarCategoria.php" method="POST">
						<div class="form-group">
							<label for="inputNombre">Nombre<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="nombreCategoria" id="inputNombre">
							<?php
								if ( (isset($_GET["error"]) ) && ($_GET["error"]=="si") ) { ?>
									<p class="text-danger">Existe una categoria con ese nombre</p>
							<?php } ?>
							<div id="campoNombreCategoria">
							</div>
						</div>
						<div class="form-group">
							<label for="inputDescripcion">Descripcion<span class="text-danger">*</span></label>
							<textarea class="form-control" name="descripcionCategoria" id="inputDescripcion" rows="5"></textarea>
							<div id="campoDescripcionCategoria">
							</div>
						</div>
						<button class="btn btn-danger" type="button" id="b_ingresar">Ingresar</button>
					</form>
		        </div>
		     </div>
		</section>
		<footer class="btn-danger">
			<div class="container">
				<div class="row">
					<h4 class="text-center">Sistema de Subastas Bestnid</h4>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p>Luca Cucchetti - Juan Cruz Gardey - Brian C&eacute;spedes </p>
					</div>
					<div class="col-md-6">
						<ul class="list-inline text-right">
							<li><a href="home.php">Home</a></li>
							<li><a href="Ayuda.pdf">Ayuda</a></li>
							<li><a href="acercaBestnid.php">Acerca de Bestnid</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>