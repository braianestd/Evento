<?php
include_once("../class/Carregar.class.php");
include_once("topo.php");

	$obj = new Eventos();
	$obj->Nome = $_POST["Nome"];
	$obj->Detalhe = $_POST["Detalhe"];
	$obj->DataeHora = $_POST["DataeHora"];
	$obj->local = $_POST["local"];
	$retorno = $obj->inserir();
	
	
	if ($retorno)
		header("Location:index.php");
	else
		print_r($obj);
	include_once("rodape.php");
	?>