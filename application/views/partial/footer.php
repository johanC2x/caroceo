<script src="<?php echo base_url();?>assets/js/jquery.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/js/html5shiv.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/js/jquery.prettyPhoto.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/js/jquery.scrollUp.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/js/price-range.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/js/funciones/inicio.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>assets/js/funciones/funciones.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/js/bootstrap-dialog.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var alerta = '<?php echo $alerta;?>';
    console.log(alerta);
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