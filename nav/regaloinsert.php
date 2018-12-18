<?php 
	include_once("../class/Carregar.class.php");
	$objUsuarios = new Regalos();
	$objUsuarios->id_loja= $_POST["id_loja"];
	$objUsuarios->nome= $_POST["nome"];
	$objUsuarios->id_evento= $_POST["id_evento"];
	
	if ($_FILES["Imagem"]){
		
		$diretorio ="../img/";
		$Nome = $_FILES["Imagem"]["name"];
		$nomeTemporario = $_FILES["Imagem"]["tmp_name"];
		move_uploaded_file($nomeTemporario, $diretorio.$Nome);
	}
	$objUsuarios->Imagem= $Nome;
	
	$retorno = $objUsuarios->inserir();
	if ($retorno)
		header("Location:index.php");
	else
		echo "Vish errou"; 
	?>