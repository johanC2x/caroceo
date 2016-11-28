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