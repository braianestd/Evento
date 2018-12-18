<?php

   include_once ("../class/Carregar.class.php");
   include_once("topo.php");
   if(!$_GET["id"]){
	header("location:listaevento.php");
   }
   else{
	   $ID = $_GET["id"];
	   $objeto = new Eventos();
	   $objeto->ID = $ID;
	   $variavel = $objeto->retornarUnico();
   }
   
?>


<section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="../assets/img/bg/inner_cover.png">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                    <h3>
                       
                    </h3>
                </div>
            </div>
        </div>

        <div class="breadcrumbs">
   
        </div>
    </div>
</section>




   <title>Editar Evento</title>
<!--get tickets section -->
<section class="bg-img pt100 pb100">
<div class="container">
<div class="section_title mb30">
<form  method="POST" action="editarokevento.php" >
  <div class="form-group">
    <label>Nome</label>
    <input type="text" name="Nome" class="form-control"  value="<?php echo $variavel->Nome;?>">
	</div>
    <div class="form-group">
    <label>Detalhe</label>
    <input type="text" name="Detalhe" class="form-control"  value="<?php echo $variavel->Detalhe;?>">
	</div>
    <div class="form-group">
    <label>Data e Hora</label>
    <input type="datetime" name="DataeHora" class="form-control"  value="<?php echo $variavel->DataeHora;?>">
	</div>
    <div class="form-group">
    <label>Local</label>
    <input type="text" name="local" class="form-control"  value="<?php echo $variavel->local;?>">
	</div>
   <div class="form-group">
    <input type="hidden"  name="ID" value="<?php echo $variavel->ID;?>">
  </div> 
  <input type="submit" name="submit" class="btn btn-rounded btn-primary" >
</form>
        </div>
    </div>
</section>





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
                            Vamoooooos </p>
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
                            subscribe to our newsletter
                        </h4>
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
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
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
</html>
<?php
		include_once("rodape.php");
		?>