<?php
	include ("conexion.php");
	include("session.php");
	if (!isset($_GET["respuesta"]) && !isset($_GET["idComentario"]) ) {
		header("Location:home.php");
		
	}

	//chequear que el comentario pasado como parámetro es válido y que todavia no haya sido respondido
	$comentario=  mysqli_query ($link, "SELECT * FROM Comentario WHERE idComentario='".$_GET["idComentario"]."' and respuesta is null") or die (mysqli_error($link));
	if (mysqli_num_rows($comentario)>0) {
		$result= mysqli_query ($link, "UPDATE Comentario 
		SET respuesta='".$_GET["respuesta"]."' WHERE idComentario='".$_GET["idComentario"]."' ");
		$datosComentario=mysqli_fetch_array($comentario);
		header("Location: verSubasta.php?idSubasta=".$datosComentario["idSubasta"]."");
	}
	else {
		header("Location: home.php");
	}
?>