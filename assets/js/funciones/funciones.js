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

