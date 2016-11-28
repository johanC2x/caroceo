<!-- Modal Login -->
<div id="myModalLogin" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h4 class="modal-title">LOGIN</h4></center>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" onsubmit="return validar_login()">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Usuario: </label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" id="usuario" placeholder="Ingrese su usuario" name="usuario" maxlength='30' />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Contraseña: </label>
                        <div class="col-lg-7">
                            <input type="password" class="form-control" id="passw" placeholder="Ingrese su contraseña" name="passw" maxlength='30' />
                        </div>
                    </div>
                    <input class="btn btn-sm btn-primary btn-block btn-signin" type="submit" value="LOGIN"/><br/>
                    <a href="#" onclick="modal_recuperar_pass();" class="pull-right need-help">¿Olvide mi contraseña? </a><span class="clearfix"></span>
                    <a href="#" onclick="modal_registro();" class="pull-right need-help">Crear cuenta </a><span class="clearfix"></span>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Login -->

<!-- Modal Recuperar Password -->
<div id="myModalRecuperarPass" class="modal fade bd-example-modal-sm" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Restablece tu contraseña</h4>
                <span class="textoaliniado">Ingresa el correo electrónico con el que te registraste.</span>
            </div>
            <div class="modal-body">
                <form method="post" class="form-signin">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="email" id="inputEmail1" name="inputEmail1" class="form-control" placeholder="Correo Electrínico" maxlength="50" /><br/>
                    <input class="btn btn-sm btn-warning btn-block btn-signin" onclick="enviar_pass();" type="button" value="ENVIAR"/><br/>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Recuperar Password-->

<!-- Modal Registro-->
<div id="myModalRegistro" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">CREA TU CUENTA EN DESCUBRE AUTOS</h4>
            </div>
            <div class="modal-body">
                <form id="frmregistro" method="post" name="frmregistro">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="mensaje"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6" role="form">
                            <div class="form-group">
                                <label for="email" class="control-label">Nombres</label>
                                <input type="text" class="form-control" id="nombres" maxlength="100" name="nombres" placeholder="Ingrese sus nombres" />
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" maxlength="100" name="apellidos" placeholder="Ingrese sus apellidos" />
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="text" class="form-control" id="email" maxlength="50" name="email" placeholder="Ingrese su Email" />
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Contraseña</label>
                                <input type="password" class="form-control" id="passw" maxlength="30" name="passw" placeholder="Ingrese su contraseña" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email" class="control-label">Numero de documento</label>
                                <input type="text" class="form-control" id="nrodoc" maxlength="10" name="nrodoc" placeholder="Ingrese su DNI" onkeypress="return validarNumeros(event)" />
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Sexo</label>
                                <select class="form-control" id="sexo" name="sexo">
                                    <option value="">Seleccione</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Fecha de Nacimiento:</label>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <select name="dia" id="dia" class="form-control" style="padding: 6px 5px;">
                                            <?php
                                            echo '<option value="" selected>Día</option>';
                                            for ($i=1; $i<=31; $i++) {
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select name="mes" id="mes" class="form-control" style="padding: 6px 5px;">
                                            <?php
                                            echo '<option value="" selected>Mes</option>';
                                            for ($i=1; $i<=12; $i++) {
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select name="ano" id="ano" class="form-control" style="padding: 6px 5px;">
                                            <?php
                                            echo '<option value="" selected>Año</option>';
                                            for($i=date('o'); $i>=1910; $i--){
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <div class="checkbox">
                                <label><input type="checkbox" id="terminos" name="terminos">Acepto las Políticas de privacidad, los Términos y condiciones de DescubreAutos.com</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-sm btn-warning" value="Registrarme" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal -->

