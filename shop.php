<!DOCTYPE html>
<html lang="en">
<?php 
include 'conector/config.php';
include 'conector/conexion.php';
include 'conector/conectorCart.php';

//Esta sección del código trae todos los datos de los huevos en venta por medio de un procedimiento almacenado.
$consulta = $pdo -> prepare("CALL ConsultaProductos()");
$consulta -> execute();
$resultadoProducto = $consulta->fetchAll(PDO::FETCH_ASSOC);

//print_r($resultadoProducto);



?>
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
                <div class="login-box">
                    <a style="color:white; border: 0px solid white; background-color:#b0b435; padding: 10px; padding-right: 20px; padding-left: 20px;margin: 10px;
                    " href="Cerrar.php">Salir      <span class="sr-only">(current)</span><i class="fas fa-sign-out-alt"></i></a>
				</div>
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
                    <a class="navbar-brand" href="index.php"><img src="images/logoGranja.jpg" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item "><a class="nav-link" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">Sobre Nosotros</a></li>
                        <li class="dropdown active">
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
                        <li class="side-menu"><a href="">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge"><?php
                                echo(empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                            ?></span>
							<p href="cart.php">Mi Carrito</p>
					</a></li>
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
                <input type="text" class="form-control" placeholder="Buscar">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Comprar Huevos</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Comprar Huevos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Inicio de la presentación de los productos a la venta  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class = "alert " style="background-color:#b0b435"> 
            <?php echo $datos;?>
                <a href = "cart.php" class = "badge badge-success" style="background-color:black" > Finalizar Compra</a>
            </div>
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sortear por </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
									<option data-display="Select">Nada</option>
									<option value="1">Más Populares</option>
									<option value="2">Precio Alto → Precio Bajo</option>
									<option value="3">Precio Bajo → Precio Alto</option>
									<option value="4">Preferido</option>
								</select>
                                </div>
                                <p>Mostrando todos los resultados</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php foreach($resultadoProducto as $huevos){ ?>
                    <div class="product-categorie-box">
                        <div class="tab-content">
                             <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                             
                                    <div class="row">
                                       
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb"></div>
                                                    <img src="<?php echo $huevos['IMAGEN'];?>" class="img-fluid" alt="Huevo">
                                                    <div class="mask-icon">
                                                        <p style="color: aliceblue;"><?php echo $huevos['DES_PRESEN'];?></p>
                                                      <form action="" method="post">                                                
                                                        <input type="hidden" name="id" id="id"value="<?php echo openssl_encrypt($huevos['IDPRESEN'],METODO,KEY);?>">
                                                        <input type="hidden" name="nombre" id="nombre" value="<?php echo  openssl_encrypt($huevos['NOM_PRESEN'],METODO,KEY);?>">
                                                        <input type="hidden" name="precio" id="precio" value="<?php echo  openssl_encrypt($huevos['PRECIO'],METODO,KEY);?>">
                                                        <input type="hidden" name="cantidad" id="cantidad"value="<?php echo openssl_encrypt(1,METODO,KEY);?>">>
                                                        <button class="cart" href="" name="compra" type="submit" value='Agregar'>Añadir al Carrito</button>
                                                      </form> 
                                                        <!--<button class="btn btn-success" type = "button" class="cart">Comprar</button>-->
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4><?php echo $huevos['NOM_PRESEN'];?></h4>
                                                    <h5>₡<?php echo $huevos['PRECIO'];?></h5>
                                                </div>
                                            </div>
                                        </div> 
                                        
                                    </div>
                                
                            </div>     
                        </div>
                    </div>
                    <?php } ?>
                    
                    </div>
                </div>
				<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Buscar..." type="text" >
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categorias</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">Huevos & Presentaciones <small class="text-muted">(4)</small>
								</a>
                                    <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">Unidades <small class="text-muted"></small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Cartón 1o Huevos <small class="text-muted"></small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Medio Cartón <small class="text-muted"></small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Cartón Completo <small class="text-muted"></small></a>
                                            
                                        </div>
                                    </div>
                                </div>
                              
                                
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->

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
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
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
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>