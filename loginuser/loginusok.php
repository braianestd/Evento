<?php
include_once("../class/Carregar.class.php");
	$msg = "";
	$objeto = new Usuarios();
	$retorno = $objeto->loginadm();
	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', '', 'Evento');

		$Email = $con->real_escape_string($_POST['Email']);
		$Senha = $con->real_escape_string($_POST['Senha']);

		if ($Email == "" || $Senha == "")
			$msg = "Please check your inputs!";
		else {
			$sql = $con->query("SELECT id, Senha, emailconfirm FROM Usuarios WHERE Email='$Email'");
			if ($sql->num_rows > 0) {
                $data = $sql->fetch_array();
                if (password_verify($Senha, $data['Senha'])) {
                    if ($data['emailconfirm'] == 0)
	                    $msg = "Please verify your Email!";
                    else{							                    
					session_start();
					$_SESSION["ID"] = $retorno->ID;
					$_SESSION["Administrador"] = true;
					header("Location:../nav/index.php");
											}
                    
                } else
	                $msg = "Please check your inputs!";
			} else {
				$msg = "Please check your inputs!";
			}
		}
	}
?>