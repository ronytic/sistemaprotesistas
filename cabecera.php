
</head>

<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>

<body>


<div id="sb-site">
<div class="boxed">

<header id="header-full-top" class="header-full">
    <div class="container">
        <div class="header-full-title col-lg-7">
           <img src="<?php echo $folder?>imagenes/logos/logodental.png" width="100" class="pull-left">
            <h1 class="animated fadeInRight"><a href="index.php">Sistema de Laboratoristas  <span>Dentales</span></a></h1>
            <p class="animated fadeInRight">Arte - <span>Ciencia</span> - Tecnología</p>
        </div>
        <nav class="top-nav">
            <ul class="top-nav-social hidden-xs">
                <li><a href="#" class="animated fadeIn animation-delay-8 facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="animated fadeIn animation-delay-7 twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="animated fadeIn animation-delay-9 instagram"><i class="fa fa-instagram"></i></a></li>

            </ul>
            <div class="dropdown animated fadeInDown animation-delay-11">
               <a href="" id="abrir" class="btn btn-primary" rel="cerrado"><i class="glyphicon glyphicon-list"></i></a>
                <?php
                if($_SESSION['LoginSistema']==""){
                ?>
                <!-- Inicio Login-->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Administración</a>
                <br>
                <?php if(isset($_GET['error'])){
				?>
                <div class="alert alert-warning">Error al Ingresar</div>
                <?php	
				}?>
                <div class="dropdown-menu dropdown-menu-right dropdown-login-box animated fadeInUp">
                    <form role="form" action="<?php echo $folder?>login/login.php" method="post">
                        <h4>Administración</h4>

                        <div class="form-group">
                            <div class="input-group login-input">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Usuario" name="usuario" required>
                            </div>
                            <br>
                            <div class="input-group login-input">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Contraseña" name="pass" required>
                            </div>
                            <button type="submit" class="btn btn-ar btn-primary pull-right">Ingresar</button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
                <!--Fin Login-->
                <?php }else{
                    include_once("class/usuario.php");
                    $datosu=new usuario;
                    $dus=$datosu->mostrarDatos($_SESSION['CodUsuarioLog']);
                    $dus=array_shift($dus);
                ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $dus['nombre']?> <?php echo $dus['paterno']?> <?php echo $dus['materno']?></a>
                <div class="dropdown-menu dropdown-menu-right dropdown-login-box animated fadeInUp">
                <a href="<?php echo $folder?>login/logout.php" class="btn btn-danger">Salir del Sistema</a>
                </div>
                <?php   
                }                
                ?>
            </div> <!-- dropdown -->
        </nav>
    </div> <!-- container -->
</header> <!-- header-full -->
<nav class="navbar navbar-default navbar-header-full navbar-dark yamm navbar-static-top" role="navigation" id="header">
    <div class="container">

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo $folder?>index.php">Inicio</a></li>
                <li><a href="<?php echo $folder?>nosotros.php">Nosotros</a></li>
                <li><a href="<?php echo $folder?>comision-directiva.php">Comisión Directiva</a></li>
                <li><a href="<?php echo $folder?>historia.php">Historia</a></li>
                <li><a href="<?php echo $folder?>cursos.php">Cursos</a></li>
                <li><a href="<?php echo $folder?>eventos.php">Eventos</a></li>
                <li><a href="<?php echo $folder?>beneficios.php">Beneficios</a></li>
                <li><a href="<?php echo $folder?>contactos.php">Contactos</a></li>
                <li class="divider"></li>
                <?php
                if($_SESSION['LoginSistema']=="1"){
                    include_once("class/menu.php");
                    include_once("class/submenu.php");
                    $menu=new menu;
                    $submenu=new submenu;

                    foreach($menu->mostrar($_SESSION['Nivel']) as $m){
                    ?>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"><?php echo $m['nombre']?></a>
                         <ul class="dropdown-menu dropdown-menu-left">
                            <?php foreach($submenu->mostrar($_SESSION['Nivel'],$m['codmenu']) as $sm){?>
                            <li><a href="<?php echo $folder;?><?php echo $m['url']?><?php echo $sm['url']?>"><?php echo $sm['nombre']?></a></li>
                    
                    <?php
                    }?>        
                            <!--<li class="divider"></li>-->
                        </ul>
                    </li>
                    <?php
                    }
                }?>
             </ul>
        </div><!-- navbar-collapse -->
    </div><!-- container -->
</nav>

<section class="carousel-section">
    <div id="carousel-example-generic" class="carousel carousel-razon slide " data-ride="carousel" data-interval="5000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-7">
                            <div class="carousel-caption">
                                <div class="carousel-text">
                                   <h1 class="animated fadeInDownBig animation-delay-7 carousel-title">Titulo 1</h1>
                                   <h2 class="animated fadeInDownBig animation-delay-5  crousel-subtitle">Subtitulo</h2>
                                   <ul class="list-unstyled carousel-list">
                                       <li class="animated bounceInLeft animation-delay-11"><i class="fa fa-check"></i>Proceso 1</li>
                                       <li class="animated bounceInLeft animation-delay-13"><i class="fa fa-check"></i>Proceso 2</li>
                                       <li class="animated bounceInLeft animation-delay-15"><i class="fa fa-check"></i>Proceso 3</li>
                                   </ul>
                                   <p class="animated fadeInUpBig animation-delay-17">Lorem ipsum dolor sit amet consectetur adipisicing elit. In rerum maxime quis tenetur dolor qui enim dolorem.</p>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-5 hidden-xs carousel-img-wrap">
                            <div class="carousel-img">
                                <img src="<?php echo $folder?>imagenes/banner/1.jpg" class=" animated bounceInUp animation-delay-3 img-rounded" alt="Image" height="350">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-8">
                            <div class="carousel-caption">
                                <div class="carousel-text">
                                   <h1 class="animated fadeInDownBig animation-delay-7 carousel-title">Titulo 1</h1>
                                   <h2 class="animated fadeInDownBig animation-delay-5  crousel-subtitle">Subtitulo</h2>
                                   <ul class="list-unstyled carousel-list">
                                       <li class="animated bounceInLeft animation-delay-11"><i class="fa fa-check"></i>Proceso 1</li>
                                       <li class="animated bounceInLeft animation-delay-13"><i class="fa fa-check"></i>Proceso 2</li>
                                       <li class="animated bounceInLeft animation-delay-15"><i class="fa fa-check"></i>Proceso 3</li>
                                   </ul>
                                   <p class="animated fadeInUpBig animation-delay-17">Lorem ipsum dolor sit amet consectetur adipisicing elit. In rerum maxime quis tenetur dolor qui enim dolorem.</p>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-4 hidden-xs carousel-img-wrap">
                            <div class="carousel-img">
                                <img src="<?php echo $folder?>imagenes/banner/2.jpg" class="animated bounceInUp animation-delay-3 img-rounded" alt="Image" height="350">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Fin Item-->
            <div class="item">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-8">
                            <div class="carousel-caption">
                                <div class="carousel-text">
                                   <h1 class="animated fadeInDownBig animation-delay-7 carousel-title">Titulo 1</h1>
                                   <h2 class="animated fadeInDownBig animation-delay-5  crousel-subtitle">Subtitulo</h2>
                                   <ul class="list-unstyled carousel-list">
                                       <li class="animated bounceInLeft animation-delay-11"><i class="fa fa-check"></i>Proceso 1</li>
                                       <li class="animated bounceInLeft animation-delay-13"><i class="fa fa-check"></i>Proceso 2</li>
                                       <li class="animated bounceInLeft animation-delay-15"><i class="fa fa-check"></i>Proceso 3</li>
                                   </ul>
                                   <p class="animated fadeInUpBig animation-delay-17">Lorem ipsum dolor sit amet consectetur adipisicing elit. In rerum maxime quis tenetur dolor qui enim dolorem.</p>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-4 hidden-xs carousel-img-wrap">
                            <div class="carousel-img">
                                <img src="<?php echo $folder?>imagenes/banner/3.jpg" class="animated bounceInUp animation-delay-3 img-rounded" alt="Image" height="350">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Fin Item-->
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</section> <!-- carousel -->