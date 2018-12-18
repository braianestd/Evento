<?php
	include_once("../class/Carregar.class.php");
	include_once("topo.php");
	$objEventos = New Eventos();
    $objEventos->Nome = $_POST["Nome"];
    $objEventos->Detalhe = $_POST["Detalhe"];
    $objEventos->DataeHora = $_POST["DataeHora"];
    $objEventos->local = $_POST["local"];
	$objEventos->ID = $_POST["ID"];
	$retorno = $objEventos->editar();
	if ($retorno)
    header("location:listaevento.php");
	else
		echo "não editado";
	
?>
<?php
include_once("rodape.php");
?>