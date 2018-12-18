


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
		$cPassword = $con->real_escape_string($_POST['cPassword']);

		if ($Nome == "" || $Email == "" || $Senha != $cPassword)
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

				$con->query("INSERT INTO Usuarios (Nome,Email,Senha,emailconfirm,token)
					VALUES ('$Nome', '$Email', '$hashedPassword', '0', '$token');
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Evento -Event Html Template">
    <meta name="keywords" content="Evento , Event , Html, Template">
    <meta name="author" content="ColorLib">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title> Evento</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/et-line.css" rel="stylesheet">
    <link href="../assets/css/ionicons.min.css" rel="stylesheet">
    <link href="../assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/css/owl.theme.default.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link href="../assets/css/main.css" rel="stylesheet">
</head>
<body>
<div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>
<header class="header navbar fixed-top navbar-expand-md">
    <div class="container">
        <a class="navbar-brand logo" href="#">
            <img src="../assets/img/logo.png" alt="Evento"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headernav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-text-align-right"></span>
        </button>
        <div class="collapse navbar-collapse flex-sm-row-reverse" id="headernav">
            <ul class=" nav navbar-nav menu">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../loginuser/loginus.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="registrar.php">Registrar</a>
                </li>
                               <li class="nav-item">
                    <a class="nav-link " href="regevento.php">Crear Evento</a>
                </li>
				                               <li class="nav-item">
                    <a class="nav-link " href="regalo.php">Crear Regalos</a>
                </li>
				                <li class="nav-item">
                    <a class="nav-link " href="../loginuser/sair.php">Sair</a>
                </li>
                <li class="login_btn">
                    <a  href="#">
                       <i class="ion-ios-search"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
    <title>Register</title>
<!--get tickets section -->
<section class="bg-img pt100 pb100" style="background-image: url('../assets/img/bg/tickets.png');">
    <div class="container">
        <div class="section_title mb30">
<form  method="POST" action="registrar.php">
<script>
var onloadCallback = function() {
    grecaptcha.execute();
};

function setResponse(response) { 
    document.getElementById('captcha-response').value = response; 
}
</script>
  <div class="form-group">
  <?php if ($msg != "") echo $msg . "<br><br>" ?>
    <label >Nome</label>
    <input type="text" name="Nome" class="form-control"  placeholder="Nome">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="Email" class="form-control"  placeholder="Email">
  </div>
   <div class="form-group">
    <label>Senha</label>
    <input type="password"  name="Senha" class="form-control"  placeholder="Ingrese una Contraseña">
  </div>
  <div class="form-group">
    <label>Confirme Senha</label>
    <input type="password"  name="cPassword" class="form-control"  placeholder="Confirme Contraseña">
  </div>
  <div class="g-recaptcha" data-sitekey="6Ld2nn4UAAAAAIkJAHcIyroS15nptod8Q-dOCa-X"></div>
  <input type="submit" name="submit" value="Register" class="btn btn-rounded btn-primary" >
</form>
        </div>
    </div>

</section>
<!--get tickets section end-->

<!--footer start -->
<footer>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4 col-12">
                <div class="footer_box">
                    <div class="footer_header">
                        <div class="footer_logo">
                            <img src="../assets/img/logo.png" alt="evento">
                        </div>
                    </div>
                    <div class="footer_box_body">
                        <p>
Todos los derechos reservados por Braian Ramos.                        </p>
                        <ul class="footer_social">
                            <li>
                                <a href="#"><i class="ion-social-pinterest"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="ion-social-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="ion-social-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="ion-social-dribbble"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="ion-social-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="footer_box">
                    <div class="footer_header">
                        <h4 class="footer_title">
                            instagram
                        </h4>
                    </div>
                    <div class="footer_box_body">
                        <ul class="instagram_list">
                            <li>
                                <a href="#">
                                    <img src="../assets/img/cleander/c1.png" alt="instagram">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../assets/img/cleander/c2.png" alt="instagram">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../assets/img/cleander/c3.png" alt="instagram">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../assets/img/cleander/c3.png" alt="instagram">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../assets/img/cleander/c2.png" alt="instagram">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../assets/img/cleander/c1.png" alt="instagram">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="footer_box">
                    <div class="footer_header">
                        <h4 class="footer_title">
No te pierdas nada!!                   </h4>
                    </div>
                    <div class="footer_box_body">
                        <div class="newsletter_form">
                            <input type="email" class="form-control" placeholder="E-Mail here">
                            <button class="btn btn-rounded btn-block btn-primary">SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright_footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Andres Carballo</a>
</p>
            </div>
            <div class="col-12 col-md-6 ">
                <ul class="footer_menu">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Speakers</a>
                    </li>
                    <li>
                        <a href="#">Events</a>
                    </li>
                    <li>
                        <a href="#">News</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
<?php
   include_once("rodape.php")
?>

</html>