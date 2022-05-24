<?php 
    include 'conector/config.php';
    
    include 'conector/conectorCart.php';

?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Granja Avícola 1926</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/iconopag.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- íconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
							<option>¢ CRC</option>
							<option>$ USD</option>
							
						</select>
                    </div>
                    <div class="right-phone-box">
                        <p>Llamenos :- <a href="#"> (+506) 2573 7306</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="my-account.php"><i class="fa fa-user s_color"></i> Mi Cuenta</a></li>
                            <li><a href="about.php"><i class="fas fa-map-marked-alt"></i> ¿Dónde estamos?</a></li>
                            <li><a href="contact-us.php"><i class="fas fa-headset"></i> Contáctanos</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> ¡26% de Descuento! Digitá el código: nina1926
                                </li>
                                
                                <li>
                                    <i class="fab fa-opencart"></i> ¡Descuentos del 10%! 
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> ¡Te ofrecemos diferentes presentaciones de huevos!
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> ¡30% de Descuento! Digitá el código: offT30
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logoGranja.jpg" class="logo" alt="Granja Avícola 1926"  width=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">Sobre Nosotros</a></li>
                        <li class="dropdown">
                           
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-chevron-down"></i> Comprar</a>
                            
                            <ul class="dropdown-menu">
                            <?php
                            include 'menu.php';
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="gallery.php">Galería de Imágenes</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contáctanos</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
							<a href="#">
								<i class="fa fa-shopping-bag"></i>
								<span class="badge"><?php
                                echo(empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                            ?></span>
								<p>Mi Carrito</p>
							</a>
						</li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
           <div class="side">
            <?php 
                    
                    if(!empty($_SESSION['CARRITO'])){
                
                ?>
                    <?php $totalFinal=0;?>
                             <?php foreach($_SESSION['CARRITO'] as $indice=>$compras){ ?>
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <h6><a href="#"> <?php echo $compras['NOMBRE'] ?></a></h6>
                            <p><?php echo $compras['CANTIDAD'] ?> - <span class="price"> ₡<?php echo $compras['PRECIO'] ?></span></p>
                        </li>
                        
                        <li class="total">
                            <a href="cart.php" class="btn btn-default hvr-hover btn-cart">Ver Carrito</a>
                            <!--<span class="float-right"><strong>Total</strong>: <php $totalFinal=$totalFinal+($compras['PRECIO'] * $compras['CANTIDAD']); ?>
                            ₡<php echo number_format($totalFinal,2);?></span>-->
                        </li>
                    </ul>
                </li>
                        <?php $totalFinal=$totalFinal+($compras['PRECIO'] * $compras['CANTIDAD']); ?>
                             <?php }?> 
                <?php }else{ ?>
                        <div class = "alert alert-warning"> No has comprado nada aún </div>
                     <?php }?>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="images/gallinasComiendo.JPG" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bienvenido a la<br> Granja Avícola 1926</strong></h1>
                            <p class="m-b-40">Somos una micro empresa cartaginesa <br> ubicada en la zona de el Tablón de El Guarco.</p>
                            <p><a class="btn hvr-hover" href="about.php">¡Conócenos!</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/huevitosPrin.JPG" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Huevos <br> de Consumo y de Calidad.</strong></h1>
                            <p class="m-b-40">Nuestros clientes adoran nuestro producto. <br> ¡Compruebelo usted también!</p>
                            <p><a class="btn hvr-hover" href="shop.php">Comprar Huevos</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/gallina.JPG" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Gallinas <br> Bien Cuidadas</strong></h1>
                            <p class="m-b-40">Nuestras gallinitas son alimentadas <br> y cuidadas con los mejores productos.</p>
                            <p><a class="btn hvr-hover" href="gallery.php">¿No nos crees? Ve las imágenes.</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/FGallina.png" alt="" />
                        <a class="btn hvr-hover" href="#">Gallinas ISA Brown</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/AlimentacionG.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Alimentación y Cuidados de los mejores.</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/huevitosConsumo.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Huevos de Consumo.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories -->
	<!--
	<div class="box-add-products">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="images/add-img-01.jpg" alt="" />
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="images/add-img-02.jpg" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>
    -->
    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Nuestros Productos</h1>
                        <p>Te ofrecemos las siguientes presentaciones de huevos.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">Todas</button>
                            <button data-filter=".top-featured">Las más buscadas</button>
                            <button data-filter=".best-seller">Presentación Preferida </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                
                            </div>
                            <img src="images/UnidadHuevo.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                              
                                <button  class="btn hvr-hover" href="checkout.php" name="compra"><a style="color: aliceblue;" href="checkout.php">Añadir al Carrito</a></button>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Unidad de huevo</h4> <!--Esta es la más buscada-->
                            <h5> ¢100</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="new">Nuevo</p>
                            </div>
                            <img src="images/10huevos.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                
                                <button  class="btn hvr-hover" href="checkout.php" name="compra"><a style="color: aliceblue;" href="checkout.php">Añadir al Carrito</a></button>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Cartón de 10 unidades</h4>
                            <h5> ¢1000</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                
                            </div>
                            <img src="images/huevosDemo.png" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                               
                                <button  class="btn hvr-hover"  name="compra"><a style="color: aliceblue;" href="checkout.php">Añadir al Carrito</a></button>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Medio Cartón</h4>
                            <h5> ¢1500</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                
                            </div>
                            <img src="images/huevosDemo.png" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                
                                <button  class="btn hvr-hover"  name="compra"><a style="color: aliceblue;" href="checkout.php" >Añadir al Carrito</a></button>
                            </div>
                        </div>
                        
                        <div class="why-text">
                            <h4>Cartón Entero</h4>
                            <h5> ¢3000</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Products  -->

    <!-- Start Blog  -->
    <div class="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Importancia de los Huevos</h1>
                        <p>Acá podés encontrar datos y blogs interesantes sobre los huevos.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="images/huevosCora.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Comer huevos NO es malo para tu corazón.</h3>
                                <p>El huevo es un alimento completo de alta densidad nutricional, con fuentes importantes de proteína, grasas saludables, vitaminas y minerales.  
                                 En épocas pasadas, la recomendación general se basaba en restringir el consumo de huevo debido a su contenido de colesterol.
                                 No obstante, los recientes estudios han demostrado que el consumo de huevo es saludable y necesario para promover una adecuada salud tanto cardiovascular, como nutricional.  
                                 </p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="https://www.haceloconhuevos.com/a-comer-huevos-para-tener-un-corazon-fuerte/" target="_blank" title="Ver más"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="images/huevosDesayuno.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Huevo; vital en las meriendas saludables de nuestros hijos.</h3>
                                <p>Siempre queremos lo mejor para nuestros hijos.
                                    Una de las mejores maneras de demostrarles nuestro amor es mediante la alimentación que les brindamos, procurando que sea una alimentación saludable, balanceada y deliciosa. 
                                    El consumo de huevo juega un rol indispensable en la alimentación de nuestros hijos, 
                                    no solamente por su contenido nutricional, sino también por su gran contenido energético, lo que lo hace
                                    vital en la etapa de crecimiento. 
                                </p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="https://www.haceloconhuevos.com/el-huevo-el-aliado-de-las-meriendas-escolares/" target="_blank" title="Ver más"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="images/huevos.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Alimento muy completo.</h3>
                                <p>El huevo es un alimento completo, que le aporta vitaminas, minerales, ácidos grasos Omega 3, y la mejor proteína.
                                    Además, Comer 2 huevos al día le dan energía y lo hacen sentir satisfecho saciedad por más tiempo.
                                </p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-eye" title="Ver más"></i></a></li>
                                <li><a href="#"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog  -->


    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/Gallinas1 .jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/gallinas2.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/huevos1.png" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instaHuevos.jpg" alt="" /> 
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instaISA.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instaISAB.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instaGallinas.jpg" alt="" /> 
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instaGComiendo.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/gallinitasComiendo.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instaGranja.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Horario de Atención:</h3>
							<ul class="list-time">
                            <li>Lunes - Viernes: 06.00am a 06.00pm</li> 
                                <li>Sábado: 06.00am a 06.00pm</li> <li>Domingo: <span>06.00 a 12.00md</span></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>¿Quiere recibir notificaciones o blogs de huevos?</h3>
							<form class="newsletter-box">
								<div class="form-group">
									<input class="" type="email" name="Email" placeholder="Digte acá su e-mail*" />
									<i class="fa fa-envelope"></i>
								</div>
								<button class="btn hvr-hover" type="submit">Suscribirme</button>
							</form>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Contáctenos en Redes Sociales</h3>
							<p>Encuentrenos en:</p>
							<ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
						</div>
					</div>
				</div>
				<hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>Sobre Nosotros</h4>
                            <p>Granja Avícola 1926; somos cartagineses.</p> 
							<p> Siempre buscamos ofrecerle lo mejor en huevos, le ofrecemos de todas las presentaciones de huevos para todos sus gustos.</p> 							
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Información</h4>
                            <ul>
                                <li><a href="#">Sobre Nosotros</a></li>
                                <li><a href="#">Servicio al Cliente</a></li>
                                
                                <li><a href="#">Terminos &amp; Condiciones</a></li>
                                <li><a href="#">Políticas de Privacidad.</a></li>
                                <li><a href="#">Información de Entregas</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contáctenos</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Dirección: Costado Sureste, <br>Iglesia de Tablón de El Guarco.<br></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Teléfono: <a href="">(+506) 2573 7306</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="">yarielamo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">Derechos Reservados. &copy; 2021 <a href="#">Granja Avícola 1926</a> Proyecto hecho por : Grupo 5 - Ambiente Web.
            <a href="https://html.design/">html design</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>