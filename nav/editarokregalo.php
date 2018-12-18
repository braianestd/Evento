<?php
	include_once("../class/Carregar.class.php");
	include_once("topo.php");
	$objregalos = New Regalos();
	$objregalos->nome = $_POST["nome"];
	$objregalos->ID = $_POST["ID"];
	$retorno = $objregalos->editar();
	if ($retorno)
    header("location:listaRegalo.php");
	else
		echo "não editado";
	
?>
<?php
include_once("rodape.php");
?>