<?php $this->load->view("partial/header"); ?>
<?php $this->load->view("partial/nav"); ?>
<section id="slider"><!--slider-->
    <div class="container">
	<div class="row">
            <div class="col-sm-12">
            <div class="col-sm-12">
		<div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>	
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-sm-6">
                            <h1><span>D</span>-SCUBREAUTOS</h1>
                            <h4><span style="color:red;">O</span>-CEO</h4>
                        </div>
                        <div class="col-sm-6">
                            <img src="<?php echo base_url();?>assets/img/app/oceo_banner_4.jpg" class="girl img-responsive" alt="#" style="height: 350px;" />
                            <!--<img src="<?php echo base_url();?>assets/img/home/pricing.png"  class="pricing" alt="" />-->
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-6">
                            <h1><span>D</span>-SCUBREAUTOS</h1>
                            <h4><span style="color:red;">O</span>-CEO</h4>
                        </div>
                        <div class="col-sm-6">
                            <img src="<?php echo base_url();?>assets/img/app/oceo_banner_1.jpg" class="girl img-responsive" alt="#" style="height: 350px;" />
                            <!--<img src="<?php echo base_url();?>assets/img/home/pricing.png"  class="pricing" alt="" />-->
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-6">
                            <h1><span>D</span>-SCUBREAUTOS</h1>
                            <h4><span style="color:red;">O</span>-CEO</h4>
                        </div>
                        <div class="col-sm-6">
                            <img src="<?php echo base_url();?>assets/img/app/oceo_banner_3.jpg" class="girl img-responsive" alt="#" style="height: 350px;" />
                            <!--<img src="<?php echo base_url();?>assets/img/home/pricing.png" class="pricing" alt="" />-->
                        </div>
                    </div>
                </div>	
                <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
		</div>
            </div>
	</div>
	</div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
	<div class="row">
            <div class="col-sm-3">
		<div class="left-sidebar">
                    <h2>Año</h2>
			        <div class="input-group">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default" data-value="decrease" data-target="#spinner" data-toggle="spinner">
                                <span class="glyphicon glyphicon-minus"></span>
                            </button>
                        </span>
                        <form id="frmSpinnerAnio" method="POST" action="<?php echo base_url();?>index.php/post/filtrarPorAnio" >
                            <input type="text" data-ride="spinner" id="spinnerAnio" name="spinnerAnio" class="form-control input-number" value="<?php echo date("Y");; ?>">
                        </form>                        
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default" data-value="increase" data-target="#spinner" data-toggle="spinner">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </span>                        
                    </div> 
                    <center>
                        <input type="button" value="Buscar" class="btn btn-primary" onclick="filtrarPorAnio()" >
                    </center>
                    <br/><br/>
                    <div class="brands_products"><!--brands_products-->
                        <h2>Marcas</h2> 
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <?php foreach($brands as $fila): ?>
                                <li><a href="<?php echo base_url();?>index.php/post/filtrarPorMarca/<?=$fila->idmarca?>"  ><span class="pull-right">(0)</span><?=$fila->nombre?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div><!--/brands_products-->
                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                            <form id="frmPrecioFiltro" role="form" method="POST" action="<?php echo base_url();?>index.php/post/filtrarPorPrecio" >
                                <input id="txtPrecioFiltro" name="txtPrecioFiltro" type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                <input type="submit" value="Buscar" class="btn btn-primary" >
                            </form>
                        <!--  
                            <a href="#" title="Buscar" onclick="document.getElementById('frmPrecioFiltro').submit()" >
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </a>
                        -->
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->
                     
		</div>
            </div>
            <div class="col-sm-9 padding-right">
            <!--  LISTA  -->
            <?php 
                if(sizeof($products) != 0){
            ?>
            <div class="features_items"><!--features_items-->
		<h2 class="title text-center">Features Items</h2>
                <?php 
                    foreach($products as $fila): 
                ?>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <?php if($fila->file != ''){ ?>
                                    <img src="<?php echo base_url();?>assets/img/app/user/<?=$fila->file?>" alt="img"  class="img-responsive"/>
                                <?php }else{ ?>
                                    <img src="<?php echo base_url();?>assets/img/app/default.png" alt="img"  class="img-responsive"/>
                                <?php } ?>
                                <!--<img src="<?php echo base_url();?>assets/img/home/product1.jpg" alt="" />-->
                                <h2><?=$fila->precio?></h2>
                                <p><?=$fila->modelo?></p>
                                <a  href="<?php echo base_url();?>index.php/post/postId/<?=$fila->idauto?>" 
                                        class="btn btn-default add-to-cart"><i class="fa fa-search"></i>Ver más</a>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2><?=$fila->precio?></h2>
                                    <p><?=$fila->modelo?></p>
                                    <a  href="<?php echo base_url();?>index.php/post/postId/<?=$fila->idauto?>" 
                                        class="btn btn-default add-to-cart"><i class="fa fa-search"></i>Ver más</a>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;
                ?>
            </div>	
            <?php
                }
            ?>	
            <div class="category-tab"><!--category-tab-->
            </div><!--/category-tab-->		
	</div>
    </div>
</div>
</section>
<?php $this->load->view("partial/footer"); ?>
<?php $this->load->view("partial/modales"); ?>
