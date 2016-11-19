<?php $this->load->view("partial/header"); ?>
<?php $this->load->view("partial/nav"); ?>
<section>
    <div class="container">
    	<div class="row">
            <div class="col-sm-12">
            	<div class="blog-post-area">
            		<h2 class="title text-center">Publicaciones</h2>
            		<?php 
            			foreach($post as $fila):
            		?>
            			<div class="single-blog-post">
							<h3><?= $fila->titulo ?></h3>
							<div class="post-meta"> 
								<ul>
									<li><i class="fa fa-user"></i><?=$fila->usuario?></li>
									<li><i class="fa fa-calendar"></i><?=$fila->creafecha?></li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="<?php echo base_url();?>assets/img/app/default.png" alt=""
								height="350px">
							</a>
							<p><?=$fila->descripcion?></p>
							<a  class="btn btn-primary" 
								href="<?php echo base_url();?>index.php/post/postId/<?=$fila->idauto?>">Leer Más</a>
						</div>
	            	<?php 
	            		endforeach;
	            	 ?> 
            	</div>
            </div>
        </div>
    </div>
</section>
<!-- FALTA PIE DE PAGINA -->
<?php $this->load->view("partial/footer"); ?>