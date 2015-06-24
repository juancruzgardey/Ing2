<?php include("session.php"); ?>
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

		<script src="Bootstrap/js/jquery.js"></script>
		<script src="Bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php 
			//chequeo de parametros
			if (!isset($_POST["idSubasta"]) || !isset($_POST["texto"])) {
				header("Location: home.php");
			}
			
			if ($_SESSION["admin"]==true) {
				include ("navbarAdmin.html"); 
			}
			else {
				include ("navbar.html"); 
			}
		?>
		<section class="main container-fluid">
			<div class="main row">
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
				<div class="col-md-9">
					<div class="row well well-lg">
						<?php
	                    	include ("conexion.php");
	                    	$result = mysqli_query ($link,"SELECT * FROM Subasta INNER JOIN Producto ON  
	                    		Subasta.idProducto = Producto.idProducto WHERE 
	                    		Subasta.idSubasta='".$_POST["idSubasta"]."' ");
	                     	$row= mysqli_fetch_array ($result);
	                    ?>
	                    <div class="col-md-3">
							<h2>Finaliza tu Comentario</h2>
						</div>
						<div class="col-md-6">
							<h3>Nombre del Producto:</h3>
							<p class='lead'><?php echo $row["nombre"]; ?></p>
							<h3>Descripci&oacute;n del Producto:</h3>
							<p class='lead'><?php echo $row["descripcion"]; ?></p>
							<h3>Comentario:</h3>
							<p class='lead'><?php echo $_POST["texto"]; ?></p>

							<a class="btn btn-lg btn-danger" href="<?php echo "altaComentarioBD.php?"."texto=".$_POST["texto"]."
							&idSubasta=".$_POST["idSubasta"]." "; ?>" >Finalizar</a>
							<a class="btn btn-lg btn-default" href=<?php echo "altaComentario.php?idSubasta=".$_POST["idSubasta"]." ";?> >Reiniciar</a>
						</div>
						<div class="col-md-3">
							<img src='<?php echo $row["imagen"]; ?>' style=" max width:300px; max height:200px;" class="img-responsive" alt="imagen" />
						</div>
					</div>
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
							<li><a href="#">Ayuda</a></li>
							<li><a href="acercaBestnid.php">Acerca de Bestnid</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>