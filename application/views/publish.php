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
            				$idauto = $fila->idauto;
            				$idusuario = $fila->idusuario;
            		?>
            			<div class="single-blog-post">
							<h3><b><?= $fila->titulo ?></b></h3>
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
							<div class="row">
								<div class="col-md-8">
									<img src="<?php echo base_url();?>assets/img/app/default.png" alt=""
										 height="350px" class="img-thumbnail">	
								</div>
								<div class="col-md-4">
									<div class="table-responsive">
									  <table class="table table-striped table-bordered table-hover">
									    <thead>
									    	<tr>
									    		<td colspan="2" ><center>DATOS</center></td>
									    	</tr>
									    </thead>
									    <tbody>
									    	<tr>
									    		<td><b>Modelo: </b></td>
									    		<td><?=$fila->modelo?></td>
									    	</tr>
									    	<tr>
									    		<td><b>Marca: </b></td>
									    		<td><?=$fila->nonmarca?></td>
									    	</tr>
									    	<tr>
									    		<td><b>Anio: </b></td>
									    		<td><?=$fila->anio?></td>
									    	</tr>
									    	<tr>
									    		<td><b>Precio: </b></td>
									    		<td><?=$fila->precio?></td>
									    	</tr>
									    </tbody>
									  </table>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-12">
									<p><?=$fila->descripcion?></p>
								</div>
							</div>	
						</div>
	            	<?php 
	            		endforeach;
	            	 ?> 
            	</div>
            </div>
        </div>
        <br/><br/>

        <!-- LISTA DE COMENTARIOS -->
        <div class="response-area">
        	<?php 
        		if(sizeof($comment) != 0){
        	?>
        	<h2>  <?php echo sizeof($comment);?> REPUESTAS</h2>
        	<ul class="media-list">
        		<?php 
        			foreach($comment as $fila):
        		?>
        		<li class="media">
					<a class="pull-left" href="#">
						<img class="media-object" src="<?php echo base_url();?>assets/img/blog/man-two.jpg" alt="">
					</a>
					<div class="media-body">
						<ul class="sinlge-post-meta">
							<li><i class="fa fa-user"></i><?= $fila->nombre." ".$fila->apepat." ".$fila->apemat ?></li>
							<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
							<li><i class="fa fa-calendar"></i><?=$fila->creaComment?></li> 
						</ul>
						<p><?=$fila->comentario?></p>
						<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
					</div>
				</li>
				<?php 
            		endforeach;
            	?>
            	<?php 
            		}
            	?>
        	</ul>
        </div>

        <!-- FORMULARIO DE PUBLICACIONES -->
        <div class="row">
        	<div class="replay-box">
				<div class="row">
					<div class="col-sm-12">
						<h2><b>Deja una pregunta</b></h2>
						<form id="frmComment" role="form" >
							<input type="hidden" id="idusuario" name="idusuario" value="<?php echo $idusuario ?>" />
							<input type="hidden" id="idauto" name="idauto" value="<?php echo $idauto; ?>" />
							<div class="text-area">
								<div class="blank-arrow">
									<label>Tu pregunta</label>
								</div>
								<textarea id="comentario" name="comentario" class="validateComment" rows="5"></textarea>
								<a class="btn btn-primary " onclick="publicarComentario('frmComment')">
									Publicar pregunta</a>
								<a class="btn btn-primary " onclick="volver(1)">
									Regresar</a>
							</div>
						</form>
						<br/><br/>
						<div id="commentMess"></div>
					</div>  
				</div>
			</div>
        </div>	
    </div>
</section>
<!-- FALTA PIE DE PAGINA -->
<?php $this->load->view("partial/footer"); ?>