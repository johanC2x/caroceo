//variables globales
var base_url = window.location.origin;
var host = window.location.host;
var pathArray = window.location.pathname.split( '/' );

function login_modal(){
    $("#myModalLogin").modal("show");
    limpiar();
}

function limpiar(){
    $('#usuario').val('');
    $('#passw').val('');
}
function validar_login(){
    var usuario = $('#usuario').val();
    var passw = $('#passw').val();
    var url = base_url + '/' + pathArray[1] + '/index.php/inicio/json/validausu';
    if(usuario === ''){
        alertas('INFO','ATENCIÓN','Debe ingresar el usuario.');
        return false;
    }
    if(passw === ''){
        alertas('INFO','ATENCIÓN','Debe ingresar su contraseña.');
        return false;
    }
}