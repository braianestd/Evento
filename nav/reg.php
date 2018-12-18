


<?php
	$msg = "";
    $secretKey = '6Ld2nn4UAAAAAKdhzrHQq_rQj-PTx_3Zz8xu_VVN';
    $statusMsg = '';

	if (isset($_POST['submit'])) {

        if(isset($_POST['captcha-response']) && !empty($_POST['captcha-response'])){
            // Get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['captcha-response']);
            $responseData = json_decode($verifyResponse);
            if($responseData->success){
                //Contact form submission code goes here ...
      
                $statusMsg = 'Your contact request have submitted successfully.';
            }else{
                $statusMsg = 'Robot verification failed, please try again.';
            }
        }else{
            $statusMsg = 'Robot verification failed, please try again.';
        }
    


		$con = new mysqli('localhost', 'root', '', 'Evento');

		$Nome = $con->real_escape_string($_POST['Nome']);
		$Email = $con->real_escape_string($_POST['Email']);
		$Senha = $con->real_escape_string($_POST['Senha']);
		$tipo = $con->real_escape_string($_POST['tipo']);
		$cPassword = $con->real_escape_string($_POST['cPassword']);
		if ($_FILES["Imagem"]){
		
		$diretorio ="../assets/img/speakers/";
		$Nome = $_FILES["Imagem"]["name"];
		$nomeTemporario = $_FILES["Imagem"]["tmp_name"];
		move_uploaded_file($nomeTemporario, $diretorio.$Nome);
	}
	$Imagem= $con->Imagem= $Nome;
		if ($Nome == "" || $Email == "" || $Senha != $cPassword )
			$msg = "Please check your inputs!";
		else {
			$sql = $con->query("SELECT ID FROM Usuarios WHERE Email='$Email'");
			if ($sql->num_rows > 0) {
				$msg = "Email already exists in the database!";
			} else {
				$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
				$token = str_shuffle($token);
				$token = substr($token, 0, 10);

				$hashedPassword = password_hash($Senha, PASSWORD_BCRYPT);

				$con->query("INSERT INTO Usuarios (Nome,Email,Senha,emailconfirm,token,Imagem,tipo)
					VALUES ('$Nome', '$Email', '$hashedPassword', '0', '$token','$Imagem','$tipo');
				");

/*

include_once "PHPMailer/PHPMailer.php";

$mail = new PHPMailer();
$mail->setFrom('hello@codingpassiveincome.com');
$mail->addAddress($email, $name);
$mail->Subject = "Please verify email!";
$mail->isHTML(true);
$mail->Body = "
    Please click on the link below:<br><br>
    
    <a href='http://localhost.com/PHPEmailConfirmation/confirm.php?email=$email&token=$token'>Click Here</a>
";

if ($mail->send())
    $msg = "You have been registered! Please verify your email!";
else
    $msg = "Something wrong happened! Please try again!";
*/
                
		    }
	    }
    }
?>