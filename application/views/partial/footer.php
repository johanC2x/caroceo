<br/><br/>
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="<?php echo base_url();?>assets/img/home/iframe1.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="<?php echo base_url();?>assets/img/home/iframe2.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="<?php echo base_url();?>assets/img/home/iframe3.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="<?php echo base_url();?>assets/img/home/iframe4.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="<?php echo base_url();?>assets/img/home/map.png" alt="" />
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2016 OCEO Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>
</footer>
<script src="<?php echo base_url();?>assets/js/jquery.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/js/html5shiv.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/js/jquery.prettyPhoto.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/js/jquery.scrollUp.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/js/price-range.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/js/fileinput.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/js/funciones/funciones.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/js/funciones/<?php echo $nomfuncion;?>" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/validator/js/bootstrapValidator.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/js/bootstrap-dialog.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var alerta = '<?php echo $alerta;?>';
    if(alerta === 'Si'){
        $("#myModalLogin").modal("show");
        $('#usuario').val('<?php echo $usuario; ?>');
        $('#passw').val('<?php echo $passw; ?>');
        alertas('DANGER','ATENCIÓN','El usuario o contraseña incorrecto.');
        return false;
    }
});    
$("#lk1").hover(function(){
    $("#d1").css("display", "block");
}, function(){
    $("#d1").css("display", "none");
});
</script>
</body>
</html>