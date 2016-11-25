<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6"> 
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
	
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/home/logo.png" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <!-- PREGUNTAR -->
                            <?php if(isset($login)){ ?>
                                    <?php if($login == 'Si'){ ?>
                                    <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                    <li><a href="<?= site_url('inicio/perfil') ?>"><i class="fa fa-user"></i> <?php echo $nombre;?></a></li>
                                    <li><a href="<?= site_url('inicio/cerrarsession') ?>"><i class="fa fa-sign-out"></i> Cerrar Sessión</a></li>
                                    <?php }else {?>
                                    <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                    <li><a href="#" onclick="login_modal();"><i class="fa fa-lock"></i> Login</a></li>
                                    <?php } ?>
                                <?php } else if (isset($_SESSION['idusuario'])){ ?>
                                    <?php if($_SESSION['idusuario'] != null){ ?>
                                    <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                    <li><a href="<?= site_url('inicio/perfil') ?>"><i class="fa fa-user"></i> <?php echo $_SESSION['nombre'];?></a></li>
                                    <li><a href="<?= site_url('inicio/cerrarsession') ?>"><i class="fa fa-sign-out"></i> Cerrar Sessión</a></li>
                                    <?php }else {?>
                                    <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                    <li><a href="#" onclick="login_modal();"><i class="fa fa-lock"></i> Login</a></li>
                                    <?php } ?>
                                <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
	<div class="container">
            <div class="row">
		<div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.html" class="active">Home</a></li>
                            <li> <a href="#">Vehículos Nuevos</a></li>
                            <li> <a href="#">Vehículos Usados</a></li>
                            <li> <a href="<?= site_url('post/index') ?>">Publica</a></li>
                        </ul>
                    </div>
		</div>
                <div class="col-sm-3">
                        <div class="search_box pull-right">
                                <input type="text" placeholder="Search"/>
                        </div>
                </div>
            </div>
	</div>
    </div><!--/header-bottom-->
</header><!--/header-->