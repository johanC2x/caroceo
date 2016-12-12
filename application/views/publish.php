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
									<?php if($fila->file != '' and $fila->file != null){ ?>
										<img src="<?php echo base_url();?>assets/img/app/user/<?=$fila->file?>" alt="img" height="350px">
									<?php }else{ ?>
										<img src="<?php echo base_url();?>assets/img/app/default.png" alt="img" height="350px">
									<?php } ?>	
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
        	<h2>  <?php echo sizeof($comment);?> PREGUNTA</h2>
        	<ul class="media-list">
        		<li class="media" >
        		<?php 
        			foreach($comment as $fila):
        			$idauto = $fila->idauto;
        			$idcomentario = $fila->idcomentario;
        		?>
        			<?php if($fila->idcomentariopadre == 0){ ?>
						<?php //echo "PADRE"; ?>
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
							<a class="btn btn-primary" data-toggle="modal" data-target="#modalComment">
								<i class="fa fa-reply"></i> Responder
							</a>
						</div>
        			<?php }else if($fila->idcomentariopadre != 0){ ?>
						<?php //echo "HIJO"; ?>
						<div class="media-body" style="float:right;" >
							<ul class="sinlge-post-meta">
								<li><i class="fa fa-user"></i><?= $fila->nombre." ".$fila->apepat." ".$fila->apemat ?></li>
								<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
								<li><i class="fa fa-calendar"></i><?=$fila->creaComment?></li> 
							</ul>
							<p>
							<span><b>Comento:</b></span>
							<span style="color:red;font-size:15px;"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> 
							<?=$fila->comentario?>
							</p>
							<a class="btn btn-primary" data-toggle="modal" data-target="#modalComment">
								<i class="fa fa-reply"></i> Responder
							</a>
						</div> 
        			<?php } ?> 
					<br/>
				<?php 
            		endforeach;
            	?>
            	</li>
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

<!-- MODAL REPLAY -->
<div class="modal fade" id="modalComment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Publica tu Respuesta</h4>
      </div>
      <div class="modal-body">
		<form role="form" >
			<div class="text-area">
				<textarea class="form-control" rows="5" id="txtaresComment">
				</textarea>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick="insertarCommentPadre(<?php echo $idcomentario; ?>,<?php echo $idauto; ?>)" 
        	type="button" class="btn btn-secondary">Responder</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END -->

<!-- FALTA PIE DE PAGINA -->
<?php $this->load->view("partial/footer"); ?>