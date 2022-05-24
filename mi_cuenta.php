<?php 
    include 'conector/config.php';
    
    include 'conector/conectorCart.php';
    
    
    include 'conector/accesoBD.php';


    $conexionAbierta = Iniciar();
    
    $queryProvincia = "call ConsultarProvincia()";
    $resultadoProvincia = $conexionAbierta -> query($queryProvincia);
    $conexionAbierta -> next_result();

    $ced = $_SESSION["cedu"];


    $queryConsulUsuario = "call ConsultarUsuario($ced)";
    $resultadoConsulUsuario = $conexionAbierta -> query($queryConsulUsuario);
    $UsuEncontrada = mysqli_fetch_array($resultadoConsulUsuario);
    $conexionAbierta -> next_result();

    //print_r($resultadoConsulUsuario);


    if(isset($_POST['btnActualizarUsuario']))
    {
        $cedula = $_POST['InputCedula'];
        $nombre = $_POST['InputName'];
        $apellido1 = $_POST['inputPrimerApellido'];
        $apellido2 = $_POST['inputSegundoApellido'];
        $correo = $_POST['InputEmail1'];
        $direccion=$_POST['address'];
        $telefono = $_POST['InputTelefono'];
        $rol = $UsuEncontrada['IdRol'] ;
        $provincia = $_POST['InputProvincia'];
        $contraseña =$_POST['InputPassword1'];
        


        


        $queryActualizar = "call ActualizarUsuario('$cedula','$nombre','$apellido1',
        '$correo','$direccion','$contraseña',$rol,$provincia,$telefono,'$apellido2')";

        if($conexionAbierta -> query($queryActualizar))
        {
          

        }
        else
        {
          echo $conexionAbierta -> error;      
        }
     
        

        
        



    }


    Finalizar($conexionAbierta);

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover.css"/>

    <style>  
    body {
    align: center;
    }
    form {
    display: inline-block;
    }
    </style>

</head>



<body text-align:center>
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
                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge"><?php
                                echo(empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                            ?></span>
							<p>Mi Carrito</p>
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
                <input type="text" class="form-control" placeholder="Search">
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
                    <h2>Mi Cuenta</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Comprar</a></li>
                        <li class="breadcrumb-item active">Mi Perfil</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start My Account  -->
    <div class="col-sm-6 col-lg-6 mb-3">
                    <br>
                    <div class="checkout-address">
                        <div class="title-center">
                            <h3>Datos de Mi Cuenta</h3>
                        </div>
                        
                        <form class="needs-validation" method ="post"  >
                            
                            <div class="row">
                            <div class="form-group col-md-6">
                                <label for="InputName" class="mb-0">Cédula *</label>
                                <input type="text" class="form-control" id="InputCedula" name="InputCedula"   maxlength="12" placeholder="Cedula" required value="<?php echo $UsuEncontrada['Cedula'] ?>"> 
                                <div class="invalid-feedback"> ¡Cédula es un campo requerido!</div>

                            </div>




                            <div class="form-group col-md-6">
                                <label for="InputName" class="mb-0">Nombre *</label>
                                <input type="text" class="form-control" id="InputName" name="InputName" placeholder="Primer Nombre" required value="<?php echo $UsuEncontrada['Nombre'] ?>"> 
                                <div class="invalid-feedback"> ¡Nombre es un campo requerido!</div>
                                </div>
                            <div class="form-group col-md-6">
                                <label for="inputPrimerApellido" class="mb-0">Primer Apellido *</label>
                                <input type="text" class="form-control" id="inputPrimerApellido" name="inputPrimerApellido" placeholder="Primer Apellido" value="<?php echo $UsuEncontrada['PrimerApellido'] ?>" > 
                                
                                </div>

                                
                            <div class="form-group col-md-6">
                                <label for="inputSegundoApellido" class="mb-0">Segundo Apellido </label>
                                <input type="text" class="form-control" id="inputSegundoApellido" name="inputSegundoApellido" placeholder="Segundo Apellido" value="<?php echo $UsuEncontrada['SegundoApellido'] ?>"> 
                                
                                </div>

                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Email *</label>
                                <input type="email" class="form-control" id="InputEmail1" name="InputEmail1" placeholder="Digite su correo" required value="<?php echo $UsuEncontrada['Correo'] ?>"> 
                                <div class="invalid-feedback"> Ingrese una dirección de correo electrónico valida</div>
                                </div>
                            
                            <div class="form-group col-md-6">
                                <label for="address">Dirección *</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Digite la dirección" value="<?php echo $UsuEncontrada['Direccion'] ?>">
                                
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="InputTelefono">Telefono</label>
                                <input type="text" class="form-control" id="InputTelefono" name="InputTelefono" placeholder="Digite el numero de telefono" value="<?php echo $UsuEncontrada['Telefono'] ?>">
                                
                            </div>

                            <div class="col-md-6 mb-3">
                                    <label for="state">Provincia </label>
                                    <select class="wide w-100" id="InputProvincia" name="InputProvincia">
                                    <?php

                                echo '<option value="">Seleccione</option>';
                                if(!empty($resultadoProvincia))
                                {
                                    While($fila = mysqli_fetch_array($resultadoProvincia))
                                    {
                                    if($UsuEncontrada['idProvincia'] == $fila["idProvincia"])
                                    {
                                        echo '<option value=' . $fila["idProvincia"] . ' selected>' . $fila["DescripcionP"] . '</option>';
                                    }
                                    else
                                    {
                                        echo '<option value=' . $fila["idProvincia"] . '>' . $fila["DescripcionP"] . '</option>';
                                    }
                                    }
                                }

                                ?>

									
									
								</select>
                                    
                                </div>

                                <div class="form-group col-md-6">
                                <label for="InputPassword1" class="mb-0">Contraseña *</label>
                                <input type="password" class="form-control" id="InputPassword1" name= "InputPassword1"placeholder="Contraseña" required value="<?php echo $UsuEncontrada['Contraseña'] ?>"> </div>

                                
                                <div class="form-group col-md-6">
                                <br>
                                <button type="submit" class="btn hvr-hover btn-block" name="btnActualizarUsuario" id="btnActualizarUsuario"><a style="color: aliceblue;" >Actualizar</a></button>
                                </div>
                                
                </div>


                

               

                            
                            
                            </form>
                    </div>
                </div>
    <!-- End My Account -->

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
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>