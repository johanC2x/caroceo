//VARIABLES LOCALES
var path = "http://localhost/oceo2/index.php/";
var preloader = "<left><img src='../../../../assets/img/loading.gif'/></left>";

/*ALERTAS UTILIZANDO BOOTSTRAP*/
function alertas(TipoAlerta,Titulo,Mensaje){
    switch (TipoAlerta){
        case 'INFO':
            TipoAlerta = BootstrapDialog.TYPE_INFO;
            break;
        case 'PRYMARY':
            TipoAlerta = BootstrapDialog.TYPE_PRIMARY;
            break;
        case 'SUCCESS':
            TipoAlerta = BootstrapDialog.TYPE_SUCCESS;
            break;
        case 'WARNING':
            TipoAlerta = BootstrapDialog.TYPE_WARNING;
            break;
        case 'DANGER':
            TipoAlerta = BootstrapDialog.TYPE_DANGER;
            break;
        default :
            TipoAlerta = BootstrapDialog.TYPE_DEFAULT;
            break;
    }      
    BootstrapDialog.show({
        title: '<b>'+Titulo+'</b>',
        type: TipoAlerta,
        message: '<div style="text-align: justify;">'+Mensaje+'</div>',
        cssClass: 'alerta-dialog',
        buttons: [{
            id: 'btn-ok',   
            icon: 'glyphicon glyphicon-check',       
            label: 'OK',
            cssClass: 'btn-primary btn-sm', 
            autospin: false,
            action: function(dialogRef){    
                dialogRef.close();
            }
        }]
    });
}

//MENSAJES DE BOOSTRAP
function obtenerAlert(msg) {
    var alert = "";
    alert += '<div class="alert alert-info">';
    alert += '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + msg;
    alert += '</div>';
    return alert;
}

function resetear(objForm){
    $('#'+objForm)[0].reset();
}


function validarForm(objform){
    res = 0;
    $(".validate"+objform).each(function() {
        if($(this).val() == ''){
            res = 1;
        }
    }); 
    return res;
}

