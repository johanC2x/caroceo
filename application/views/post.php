<?php $this->load->view("partial/header"); ?>
<?php $this->load->view("partial/nav"); ?>
<div class="container">
	<div class="row">
		<div class="panel-group" id="accordion">
            <div class="panel panel-default">
        		<div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" class="pointer">
                            <b>Datos del Vehículo</b>
                        </a><i class="indicator fa fa-car  pull-right"></i>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                    	<form id="frmPost" role="form" >
							<div id="form-group">
								<table class="table">
									<tr>
										<label>Título <span style="color:red;">(*)</span>:</label>
										<input type="text" id="titulo" name="titulo" class="form-control validate"/>
									</tr>	
									<tr> 
										<td style="border-style: none;width: 250px;padding-right: 5px;">
											<label>Marca <span style="color:red;">(*)</span>:</label>
											<select id="idmarca" name="idmarca" class="form-control validate" >
												<option value="0">Seleccionar</option>
												<?php 
													foreach($brands as $fila):
												?>
													<option value="<?=$fila->idmarca?>" ><?=$fila->nombre?></option>
												<?php 
													endforeach;
												?>
											</select>
										</td>
										<td style="width: 320px;border-style: none;" >
											<label>Modelo</label>
											<input type="text" id="modelo" name="modelo" class="form-control validate"/>
										</td>
									</tr>
									<tr>
										<td style="border-style: none;width: 250px;padding-right: 5px;">
											<label>Año</label>
											<input type="text" id="anio" name="anio" class="form-control validate"/>
										</td>
										<td style="width: 320px;border-style: none;" >
											<label>Transmisión <span style="color:red;">(*)</span>:</label>
											<select id="idtipotransmision" name="idtipotransmision" class="form-control validate" >
												<option value="0">Seleccionar</option>
												<?php 
													foreach($codeTransmision as $fila):
												?>
													<option value="<?=$fila->idcodigo?>" ><?=$fila->codigo?></option>
												<?php 
													endforeach;
												?>
											</select>
										</td>
									</tr>
									<tr>
										<td style="border-style: none;width: 250px;padding-right: 5px;">
											<label>Combustible <span style="color:red;">(*)</span>:</label>
											<select id="idtipocombustible" name="idtipocombustible" class="form-control validate" >
												<option value="0">Seleccionar</option>
												<?php 
													foreach($codeCombustible as $fila):
												?>
													<option value="<?=$fila->idcodigo?>" ><?=$fila->codigo?></option>
												<?php 
													endforeach;
												?>
											</select>
										</td>
										<td style="border-style: none;">
											<label>Motor <span style="color:red;">(*)</span>:</label>
											<input type="text" id="motor" name="motor" class="form-control validate"/>
										</td>
									</tr>
									<tr>
										<td style="border-style: none;">
                                            <label>Timón <span style="color:red;">(*)</span>:</label>
											<select id="idtipotimon" name="idtipotimon" class="form-control validate" >
												<option value="0">Seleccionar</option>
												<?php 
													foreach($codeTimon as $fila):
												?>
													<option value="<?=$fila->idcodigo?>" ><?=$fila->codigo?></option>
												<?php 
													endforeach;
												?>
											</select>
										</td>
										<td colspan="2" style="border-style: none;">
											<table>
												<tr>
													<td style="width: 250px;padding-right: 5px;" >
														<label>Num. Puertas: <span style="color:red;">(*)</span>:</label>
											<input type="text" id="nropuertas" name="nropuertas" class="form-control validate"/>
													</td>
													<td style="width: 250px;padding-right: 5px;">
														<label>Color: <span style="color:red;">(*)</span>:</label>
											<input type="text" id="color" name="color" class="form-control validate"/>
													</td>
													<td>
                                                      <label style="color:red;" >Precio: <i class="fa fa-usd" aria-hidden="true"></i></label>
                                                      <input type="text" id="precio" name="precio"
                                                      class="form-control validate" placeholder="Ingrese un precio"/>
													</td>
												</tr>
											</table>
										</td>										
									</tr>
								</table>
							</div>
							<div id="form-group">
								<textarea id="descripcion" name="descripcion" class="form-control validate" rows="5" 
								placeholder="Ingrese una descripción"></textarea>
							</div>	
							<br/>
						<!--
							<div id="form-group">
								<label>Seleccione una imagen:</label>
								<input id="file" type="file" class="file" data-preview-file-type="text" name="file" onclick="validar()" >
							</div> 
						-->
							<input type="button" onclick="validar()" value="Publicar" class="btn btn-primary" />
						</form>
                    </div>
                </div>
            </div>
		</div> 
		<div id="postMess"></div>
    </div>
</div>
<?php $this->load->view("partial/footer"); ?>