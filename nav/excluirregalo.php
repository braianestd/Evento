<?php
	 include_once("../class/Carregar.class.php");
	 include_once("topo.php");
	 if(!$_GET ['id']){
		 header ("location:listaRegalo.php");
		 }
		 else {
			 $id=$_GET["id"];
			 $objeto = new Regalos();
			 $objeto->ID=$id;
			 $retorno = $objeto->excluir();
		 if($retorno)
         header ("location:listaRegalo.php");
		 else
			 echo "Erro 404";
		 
		 }
	 ?>
	 <?php
	 include_once("rodape.php");
	 ?>