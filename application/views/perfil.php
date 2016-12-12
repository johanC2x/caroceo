<?php $this->load->view("partial/header"); ?>
<?php $this->load->view("partial/nav"); ?>
<section>
    <div class="container">
    	<div class="row">
            <div class="col-sm-12">
            	<div class="col-sm-4">
            		<?php if(sizeof($postCount) != 0){ ?>
            			<h2 class="title text-center">Detalles</h2>
						<table class="table table-striped table-bordered table-hover" >
							<?php foreach($postCount as $con): ?>
								<tr>
									<?php if($con->tipo == 1){ ?>
										<td><b>N° Publicaciones</b></td>
									<?php } ?>
									<?php if($con->tipo == 2){ ?>
										<td><b>N° Respuestas</b></td>
									<?php } ?>
									<?php if($con->tipo == 3){ ?>
										<td><b>N° Preguntas</b></td>
									<?php } ?>
									<td><center><?= $con->contador ?></center></td>
								</tr> 
							<?php endforeach; ?>
						</table>
            		<?php } ?>
            	</div>
            	<div class="col-sm-8">
	            	<div class="blog-post-area">
	            		<?php 
	            			if(sizeof($post) != 0){
	            		?>
	            			<h2 class="title text-center">Publicaciones</h2>
	            		<?php 
	            			$idauto = 0;
	            			foreach($post as $fila):
	            				$idusuario = $_SESSION['idusuario'];
	            		?>
	            			<div class="single-blog-post">
								<h3><?= $fila->titulo ?></h3>
								<div class="post-meta"> 
									<ul>
										<li><i class="fa fa-user"></i><?=$fila->usuario?></li>
										<li><i class="fa fa-calendar"></i><?=$fila->creafecha?></li>
										<li><b><i class="fa fa-flag"
											<?php if($fila->estado == 0){?> style="color:red;" <?php } ?>
											<?php if($fila->estado == 1){?> style="color:green;" <?php } ?>
											></i></b></li>
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
									<?php if($fila->file != '' and $fila->file != null){ ?>
										<img src="<?php echo base_url();?>assets/img/app/user/<?=$fila->file?>" alt="img" height="350px">
									<?php }else{ ?>
										<img src="<?php echo base_url();?>assets/img/app/default.png" alt="img" height="350px">
									<?php } ?>
								</a>
								<p><?=$fila->descripcion?></p>
								<a  class="btn btn-primary" href="<?php echo base_url();?>index.php/post/postId/<?=$fila->idauto?>">Leer Más</a>
								<?php 
									if($_SESSION['idusuario'] != null){
								?>
								<a  class="btn btn-primary" href="<?php echo base_url();?>index.php/post/index/<?=$fila->idauto?>">Editar</a>
								<?php 
								 	}
								?>
								<?php if($_SESSION['idusuario'] != null and $fila->file == null){ ?>
								<a  class="btn btn-primary" href="#" data-toggle="modal" data-target="#modalFileInput" onclick="obtenerModalFile(<?=$fila->idauto?>)">
									Agregar Foto
								</a>
								<?php } ?>
							</div>
		            	<?php 
		            		endforeach;
		            	 ?> 
						<?php 
							}
						 ?>
	            	</div>
				</div>
            </div>
        </div>
    </div>
</section>
<!-- FALTA PIE DE PAGINA -->
<?php $this->load->view("partial/footer"); ?>
<!-- Modal -->
<div class="modal fade" id="modalFileInput" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Subir Imagen</h4>
      </div>
      <div class="modal-body">
        	<form id="frmFileInput" name="frmFileInput" role="form" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>/index.php/post/subirFile">
        		<div class="form-group">
        			<input type="hidden" name="idusuario" id="idusuario" value="<?php echo $idusuario; ?>" >
        			<input type="hidden" name="idauto" id="idauto" >
        			<input class="form-control" id="file" name="file" type="file">
        		</div>
        		<button type="submit" class="btn btn-info">Grabar</button>
        		<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
        	</form>
      </div> 
    </div>
  </div>
</div>