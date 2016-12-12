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
                    	<form id="frmPost" role="form" name="frmPost" >
							<?php 
								$id = null; 
								if(isset($post)){
									if(sizeof($post) != 0){  
							?>
								<?php foreach($post as $pub): ?>
								<?php $id = $pub->idauto; ?>
									<div class="form-group">
										<label>Título <span style="color:red;">(*)</span>:</label>
										<input type="text" id="titulo" name="titulo" class="form-control validate"
										value="<?=$pub->titulo?>"/>
										<input id="idauto" type="hidden" value="<?=$pub->idauto?>" name="idauto"/>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label>Marca <span style="color:red;">(*)</span>:</label>
												<select id="idmarca" name="idmarca" class="form-control validate">
													<option value="0">Seleccionar</option>
													<?php 
														foreach($brands as $fila):
													?>
														<option value="<?=$fila->idmarca?>" <?php if($fila->idmarca == $pub->idmarca){ ?>selected="selected"<?php } ?>>
															<?=$fila->nombre?>
														</option>
													<?php 
														endforeach;
													?>
												</select>
											</div>
											<div class="col-md-6">
												<label>Modelo</label>
												<input type="text" id="modelo" name="modelo" class="form-control validate"
												value="<?= $pub->modelo ?>" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label>Año</label>
												<input type="text" id="anio" name="anio" class="form-control validate"
													   value="<?= $pub->anio ?>"/>
											</div>
											<div class="col-md-6">
												<label>Transmisión <span style="color:red;">(*)</span>:</label>
												<select id="idtipotransmision" name="idtipotransmision" class="form-control validate" 
												        value="<?= $pub->idtipotransmision ?>">
													<option value="0">Seleccionar</option>
													<?php 
														foreach($codeTransmision as $fila):
													?>
														<option value="<?=$fila->idcodigo?>" <?php if($fila->idcodigo == $pub->idtipotransmision){ ?>selected="selected"<?php } ?>>
															<?=$fila->codigo?>
														</option>
													<?php 
														endforeach;
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label>Combustible <span style="color:red;">(*)</span>:</label>
												<select id="idtipocombustible" name="idtipocombustible" class="form-control validate" 
														value="<?= $pub->idtipocombustible ?>">
													<option value="0">Seleccionar</option>
													<?php 
														foreach($codeCombustible as $fila):
													?>
														<option value="<?=$fila->idcodigo?>" <?php if($fila->idcodigo == $pub->idtipocombustible){?>selected="selected"<?php } ?>>
															<?=$fila->codigo?>
														</option>
													<?php 
														endforeach;
													?>
												</select>
											</div>
											<div class="col-md-6">
												<label>Motor <span style="color:red;">(*)</span>:</label>
												<input type="text" id="motor" name="motor" class="form-control validate"
													   value="<?= $pub->motor ?>" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-3">
												<label>Timón <span style="color:red;">(*)</span>:</label>
												<select id="idtipotimon" name="idtipotimon" class="form-control validate" 
													    value="<?= $pub->idtipotimon ?>">
													<option value="0">Seleccionar</option>
													<?php 
														foreach($codeTimon as $fila):
													?> 
														<option value="<?=$fila->idcodigo?>" <?php if($fila->idcodigo == $pub->idtipotimon){?>selected="selected"<?php } ?>>
															<?=$fila->codigo?>
														</option>
													<?php 
														endforeach;
													?>
												</select>
											</div>
											<div class="col-md-3">
												<label>Num. Puertas: <span style="color:red;">(*)</span>:</label>
												<input type="text" id="nropuertas" name="nropuertas" class="form-control validate"
												       value="<?= $pub->nropuertas ?>"/>
											</div>
											<div class="col-md-3">
												<label>Color: <span style="color:red;">(*)</span>:</label>
												<input type="text" id="color" name="color" class="form-control validate"
												       value="<?= $pub->color ?>"/>
											</div>
											<div class="col-md-3">
												<label style="color:red;" >Precio: <i class="fa fa-usd" aria-hidden="true"></i></label>
												<input type="text" id="precio" name="precio" class="form-control validate" placeholder="Ingrese un precio"
												       value="<?= $pub->precio ?>"/>
											</div>
										</div>
									</div> 
									<div class="form-group">
										<label><b>Seleccionar Estado: </b></label>
										<label class="checkbox-inline"><input id="estado1" name="estado" type="checkbox" 
											<?php if($pub->estado == 0){?> disabled <?php } ?>
											<?php if($pub->estado == 1){?> checked = "checked" <?php } ?>
											value="1" 
											onclick="obtenerEstado1()" >
											<b>Activo</b>
										</label>
										<label class="checkbox-inline"><input id="estado2" name="estado" type="checkbox" 
											<?php if($pub->estado == 1){?> disabled <?php } ?>
											<?php if($pub->estado == 0){?> checked = "checked" <?php } ?>
											value="0" 
											onclick="obtenerEstado2()">
											<b>Inactivo</b>
										</label>
									</div>
									<div class="form-group">
										<textarea id="descripcion" name="descripcion" class="form-control validate" rows="5" 
										placeholder="Ingrese una descripción" style="text-align:justify;" >
											<?= $pub->descripcion ?>
										</textarea>
									</div>
								<?php endforeach; ?>
							<?php 
									}
								}else{ 
							?>
								<div class="form-group">
									<label>Título <span style="color:red;">(*)</span>:</label>
									<input type="text" id="titulo" name="titulo" class="form-control validate"/>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
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
										</div>
										<div class="col-md-6">
											<label>Modelo</label>
											<input type="text" id="modelo" name="modelo" class="form-control validate"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label>Año</label>
											<input type="text" id="anio" name="anio" class="form-control validate"/>
										</div>
										<div class="col-md-6">
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
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
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
										</div>
										<div class="col-md-6">
											<label>Motor <span style="color:red;">(*)</span>:</label>
											<input type="text" id="motor" name="motor" class="form-control validate"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
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
										</div>
										<div class="col-md-3">
											<label>Num. Puertas: <span style="color:red;">(*)</span>:</label>
											<input type="text" id="nropuertas" name="nropuertas" class="form-control validate"/>
										</div>
										<div class="col-md-3">
											<label>Color: <span style="color:red;">(*)</span>:</label>
											<input type="text" id="color" name="color" class="form-control validate"/>
										</div>
										<div class="col-md-3">
											<label style="color:red;" >Precio: <i class="fa fa-usd" aria-hidden="true"></i></label>
											<input type="text" id="precio" name="precio" class="form-control validate" placeholder="Ingrese un precio"/>
										</div>
									</div>
								</div> 
								<div class="form-group">
									<textarea id="descripcion" name="descripcion" class="form-control validate" rows="5" 
									placeholder="Ingrese una descripción"></textarea>
								</div>
							<?php 
								} 
							?>
							<br/>
						<!--
							<div id="form-group">
								<label>Seleccione una imagen:</label>
								<input id="file" type="file" class="file" data-preview-file-type="text" name="file" onclick="validar()" >
							</div> 
						-->
							<input type="button" onclick="validar(<?php echo $id; ?>)" value="Publicar" class="btn btn-primary" />
							<input type="button" onclick="volver(1)" value="Regresar" class="btn btn-primary" />
						</form>
                    	<form id="frmPost" role="form" >
                            <?php 
                                    if(isset($post)){
                                            print_r($post);
                                            if(sizeof($post) != 0){  
                            ?>
                            <?php foreach($post as $fila): ?>
                                <div class="form-group">
                                    <label>Título <span style="color:red;">(*)</span>:</label>
                                    <input type="text" id="titulo" name="titulo" class="form-control validate"/>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Marca <span style="color:red;">(*)</span>:</label>
                                            <select id="idmarca" name="idmarca" class="form-control validate">
                                                <option value="0">Seleccionar</option>
                                                <?php 
                                                        foreach($brands as $fila):
                                                ?>
                                                        <option value="<?=$fila->idmarca?>" ><?=$fila->nombre?></option>
                                                <?php 
                                                        endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Modelo</label>
                                            <input type="text" id="modelo" name="modelo" class="form-control validate"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Año</label>
                                            <input type="text" id="anio" name="anio" class="form-control validate"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Transmisión <span style="color:red;">(*)</span>:</label>
                                            <select id="idtipotransmision" name="idtipotransmision" class="form-control validate">
                                                <option value="0">Seleccionar</option>
                                                <?php 
                                                        foreach($codeTransmision as $fila):
                                                ?>
                                                        <option value="<?=$fila->idcodigo?>" ><?=$fila->codigo?></option>
                                                <?php 
                                                        endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Combustible <span style="color:red;">(*)</span>:</label>
                                            <select id="idtipocombustible" name="idtipocombustible" class="form-control validate">
                                                <option value="0">Seleccionar</option>
                                                <?php 
                                                    foreach($codeCombustible as $fila):
                                                ?>
                                                   <option value="<?=$fila->idcodigo?>" ><?=$fila->codigo?></option>
                                                <?php 
                                                   endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Motor <span style="color:red;">(*)</span>:</label>
                                            <input type="text" id="motor" name="motor" class="form-control validate" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Timón <span style="color:red;">(*)</span>:</label>
                                            <select id="idtipotimon" name="idtipotimon" class="form-control validate">
                                                <option value="0">Seleccionar</option>
                                                <?php 
                                                    foreach($codeTimon as $fila):
                                                ?>
                                                    <option value="<?=$fila->idcodigo?>" ><?=$fila->codigo?></option>
                                                <?php 
                                                    endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Num. Puertas: <span style="color:red;">(*)</span>:</label>
                                            <input type="text" id="nropuertas" name="nropuertas" class="form-control validate" />
                                        </div>
                                        <div class="col-md-3">
                                            <label>Color: <span style="color:red;">(*)</span>:</label>
                                            <input type="text" id="color" name="color" class="form-control validate" />
                                        </div>
                                        <div class="col-md-3">
                                            <label style="color:red;" >Precio: <i class="fa fa-usd" aria-hidden="true"></i></label>
                                            <input type="text" id="precio" name="precio" class="form-control validate" placeholder="Ingrese un precio" />
                                        </div>
                                    </div>
                                </div>
                                <div id="form-group">
                                    <textarea id="descripcion" name="descripcion" class="form-control validate" rows="5" placeholder="Ingrese una descripción" ></textarea>
                                </div>
				<?php endforeach; ?>
                                <?php 
                                        }
                                    }else{ 
                                ?>
                                <div class="form-group">
                                    <label>Título <span style="color:red;">(*)</span>:</label>
                                    <input type="text" id="titulo" name="titulo" class="form-control validate"/>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
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
                                        </div>
                                        <div class="col-md-6">
                                            <label>Modelo</label>
                                            <input type="text" id="modelo" name="modelo" class="form-control validate"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Año</label>
                                            <input type="text" id="anio" name="anio" class="form-control validate" />
                                        </div>
                                        <div class="col-md-6">
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
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
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
                                        </div>
                                        <div class="col-md-6">
                                            <label>Motor <span style="color:red;">(*)</span>:</label>
                                            <input type="text" id="motor" name="motor" class="form-control validate" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
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
                                        </div>
                                        <div class="col-md-3">
                                            <label>Num. Puertas: <span style="color:red;">(*)</span>:</label>
                                            <input type="text" id="nropuertas" name="nropuertas" class="form-control validate"/>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Color: <span style="color:red;">(*)</span>:</label>
                                            <input type="text" id="color" name="color" class="form-control validate"/>
                                        </div>
                                        <div class="col-md-3">
                                            <label style="color:red;" >Precio: <i class="fa fa-usd" aria-hidden="true"></i></label>
                                            <input type="text" id="precio" name="precio" class="form-control validate" placeholder="Ingrese un precio"/>
                                        </div>
                                    </div>
                                </div>
                                <div id="form-group">
                                    <textarea id="descripcion" name="descripcion" class="form-control validate" rows="5" placeholder="Ingrese una descripción"></textarea>
                                </div>
                                <?php 
                                    } 
                                ?>
                                <br/>
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
<?php $this->load->view("partial/modales"); ?>
