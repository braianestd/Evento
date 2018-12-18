<?php
	include_once("../class/Carregar.class.php");
	include_once("topo.php");
	$objCategorias = New Loja();
	$objCategorias->Nome = $_POST["Nome"];
	$objCategorias->ID = $_POST["ID"];
	$retorno = $objCategorias->editar();
	if ($retorno)
    header("location:listloja.php");
	else
		echo "não editado";
	
?>
<?php
include_once("rodape.php");
?>