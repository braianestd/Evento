<?php 
	include_once("../class/Carregar.class.php");
	$objUsuarios = new Loja();
	$objUsuarios->Nome= $_POST["Nome"];
	$retorno = $objUsuarios->inserir();
	if ($retorno)
		header("Location:index.php");
	else
		echo "Vish errou"; 
	?>