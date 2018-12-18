<?php
include_once("../class/Carregar.class.php");
include_once("topo.php");

$obj = new Eventos();
$eventos = $obj->listar();
$obj2 =new Usuarios();
$usuarios = $obj2->listar();
?>


<section id="home" class="home-cover">
<?php foreach($eventos as $row): ?>
    <div class="cover_slider owl-carousel owl-theme">
        <div class="cover_item" style="background: url('../assets/img/bg/slider.png');">
             <div class="slider_content">
                <div class="slider-content-inner">
                    <div class="container">
                        <div class="slider-content-center">
                            <h2 class="cover-title">
                            EL DÌA <br>
                            <?php echo $row->DataeHora; ?><br>
                            HAY UN EVENTO
                            </h2>
                            <strong class="cover-xl-text"><?php echo $row->Nome; ?></strong><br>
                            <a href="#" class=" btn btn-primary btn-rounded" >
                                Ver evento!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php endforeach ?>
    
</section>
<section class="pt100 pb100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-calendar-outline"></i>
                    <div class="content">
                        <h5 class="box_title">
                           
                        </h5>
                        <p>
                           
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-location-outline"></i>
                    <div class="content">
                        <h5 class="box_title">
                            
                        </h5>
                        <p>
                            
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-person-outline"></i>
                    <div class="content">
                        <h5 class="box_title">
                            
                        </h5>
                        <p>
                            
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-pricetag-outline"></i>
                    <div class="content">
                        <h5 class="box_title">
                            
                        </h5>
                        <p>
                            
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="pb100">
    <div class="container">
        <div class="section_title mb50">
            <h3 class="title">
               USUARIOS MAS POPULARES
            </h3>
        </div>
    </div>
    <div class="row justify-content-center no-gutters">
        

    <?php foreach($usuarios as $user): ?>
        <div class="col-md-3 col-sm-6">
            <div class="speaker_box">
                <div class="speaker_img">
                    <img <?php  echo "src='../assets/img/speakers/".$user->Imagem."'";?> alt="speaker name">
                    <div class="info_box">
                        <h5 class="name"><?php echo $user->Nome; ?></h5>
                        <p class="position"><?php echo $user->Email; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

<!--
        <div class="col-md-3 col-sm-6">
            <div class="speaker_box">
                <div class="speaker_img">
                    <img src="../assets/img/speakers/s2.png" alt="speaker name">
                    <div class="info_box">
                        <h5 class="name">James Oliver</h5>
                        <p class="position">CEO Company</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3 col-sm-6">
            <div class="speaker_box">
                <div class="speaker_img">
                    <img src="../assets/img/speakers/s3.png" alt="speaker name">
                    <div class="info_box">
                        <h5 class="name">Carla Banks</h5>
                        <p class="position">CEO Company</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="speaker_box">
                <div class="speaker_img">
                    <img src="../assets/img/speakers/s4.png" alt="speaker name">
                    <div class="info_box">
                        <h5 class="name">William Smith</h5>
                        <p class="position">CEO Company</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="speaker_box">
                <div class="speaker_img">
                    <img src="../assets/img/speakers/s5.png" alt="speaker name">
                    <div class="info_box">
                        <h5 class="name">Jessica Black</h5>
                        <p class="position">CEO Company</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="speaker_box">
                <div class="speaker_img">
                    <img src="../assets/img/speakers/s6.png" alt="speaker name">
                    <div class="info_box">
                        <h5 class="name">Patricia Stone</h5>
                        <p class="position">CEO Company</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="speaker_box">
                <div class="speaker_img">
                    <img src="../assets/img/speakers/s7.png" alt="speaker name">
                    <div class="info_box">
                        <h5 class="name">Duncan Stan</h5>
                        <p class="position">CEO Company</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="speaker_box">
                <div class="speaker_img">
                    <img src="../assets/img/speakers/s8.png" alt="speaker name">
                    <div class="info_box">
                        <h5 class="name">Patricia Stone</h5>
                        <p class="position">CEO Company</p>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
</section>



<section class="pb100">
    <div class="container">
        <div class="table-responsive">
            <table class="event_calender table">
                <thead class="event_title">
                <tr>
                    <th>
                        <i class="ion-ios-calendar-outline"></i>
                        <span>Proximos Eventos</span>
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <img src="../assets/img/cleander/c1.png" alt="event">
                    </td>
                    <td class="event_date">
                        14
                        <span>Febrero</span>
                    </td>
                    <td>
                        <div class="event_place">
                            <h5>Conferencia</h5>
                            <h6><?php echo $row->DataeHora; ?><br></h6>
                            <p>Coordenador: Daniel Hill</p>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-rounded">Mas informacion</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="../assets/img/cleander/c2.png" alt="event">
                    </td>
                    <td class="event_date">
                        18
                        <span>Febrero</span>
                    </td>
                    <td>
                        <div class="event_place">
                            <h5>Cumpleaños Melany</h5>
                            <h6>08 AM - 04 PM</h6>
                            <p>Local: Bulevard</p>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-rounded">Mas informacion</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="../assets/img/cleander/c3.png" alt="event">
                    </td>
                    <td class="event_date">
                        22
                        <span>Marzo</span>
                    </td>
                    <td>
                        <div class="event_place">
                            <h5>Casamiento Brucely</h5>
                            <h6>08 AM - 04 PM</h6>
                            <p>Local: Palacio las Estrellas</p>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-rounded">Mas Informacion</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<section class="bg-gray pt100 pb100">
    <div class="container">
        <div class="section_title mb50">
            <h3 class="title">
                Patrocinadores
            </h3>
        </div>
        <div class="brand_carousel owl-carousel">
            <div class="brand_item text-center">
                <img src="../assets/img/brands/b1.png" alt="brand">
            </div>
            <div class="brand_item text-center">
                <img src="../assets/img/brands/b2.png" alt="brand">
            </div>

            <div class="brand_item text-center">
                <img src="../assets/img/brands/b3.png" alt="brand">
            </div>
            <div class="brand_item text-center">
                <img src="../assets/img/brands/b4.png" alt="brand">
            </div>
            <div class="brand_item text-center">
                <img src="../assets/img/brands/b5.png" alt="brand">
            </div>
        </div>
    </div>
</section>
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
                          Una Empresa Dedicada a la creacion de eventos
						  </p>
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
                            Suscribete y mantente actualizado
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

<?php
   include_once("rodape.php")
?>