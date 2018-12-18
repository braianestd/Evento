<?php
session_start();
if(!isset($_SESSION['Administrador'])){
	header ("Location:../loginuser/loginus.php");
}
	include_once("../class/Carregar.class.php");
	include_once ("topo.php");
	$objRegalo = new Regalos();
    //$id = $objRegalo->id_loja;

    $regalo = $objRegalo->listar();
    $objLoja = new Loja();
    //$objLoja->ID = $id;
    $loja = $objLoja->listar();
    $objevento = new Eventos();
    $evento = $objevento->listar();
    $array2[] = NULL;
    foreach($evento as $r){
        $array2[$r->ID] = $r->Nome;
    }
    $array[] = NULL;
    foreach($loja as $lo){
        $array [$lo->ID] = $lo->Nome;
    }
    //var_dump($loja);die;
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
<!--page title section end-->

<!--about section -->
<section class="pt100 pb100">
    <div class="container">
                <div class="contact_form">
                <h1 align="center"> Lista de Regalos</h1>
<div class="widget-box">
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
            <thead>  
            <tr class="odd gradeX">
			<th>Regalo</th>
            <th>Loja</th>
            <th>Evento</th>
			<th colspan="4"> Accion</th>
                </tr></thead>
				<tbody>
<?php
		foreach($regalo as $local):?>
			<tr>
                      <td><?php echo $local->nome;?></td>
                      <td><?php echo $local->id_loja; ?></td>
                      <td><?php echo $local->id_evento; ?></td>
					  <td><a href='editaregalo.php?id=<?php echo $local->ID;?>'>Editar</a></td>
					  <td><a href='excluirregalo.php?id=<?php echo $local->ID;?>'>Eliminar</a></td>
				</tr>
              </tbody>
              <?php endforeach?>
              </table>
          </div>
        </div>
            <div class="col-12 mt70">
                <!--map -->
                <!--map end-->
            </div>
        </div>

    </div>
</section>
<!--contact section end -->



<!--get tickets section -->
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
<!--footer end -->

<?php
   include_once("rodape.php")
?>
</body>
</html>