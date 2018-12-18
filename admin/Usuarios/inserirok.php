<?php 
	include_once ("../../class/Usuarios.class.php");
	include_once ("../../nav/topo.php");
	$objUsuarios = new Usuarios();
	$objUsuarios->Nome= $_POST["Nome"];
	$objUsuarios->Email= $_POST["Email"];
	$objUsuarios->Senha= $_POST["Senha"];
if ($_FILES["Imagem"]){
		
		$diretorio ="../../img/";
		$Nome = $_FILES["Imagem"]["name"];
		$nomeTemporario = $_FILES["Imagem"]["tmp_name"];
		move_uploaded_file($nomeTemporario, $diretorio.$Nome);
	}
	$objUsuarios->Imagem= $Nome;
	$retorno = $objUsuarios->inserir();
	if ($retorno)
		echo "Incluido con Exito";
	else
		echo "Vish errou";
	?>
 <html>
<head></head>
<body>
<div align="center">
<a class="btn btn-primary" href="http://localhost/anjo/admin/Usuarios/Usuarios.php">Volver</a>
 </div>                    
</form>
</body>
</html>	
	
<?php
include_once ("../../nav/rodape.php");
?>	