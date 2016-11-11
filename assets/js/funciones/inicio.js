//variables globales
var base_url = window.location.origin;
var host = window.location.host;
var pathArray = window.location.pathname.split( '/' );

function login_modal(){
    limpiar();
    $("#myModalLogin").modal("show");
}

function limpiar(){
    $('#usuario').val('');
    $('#passw').val('');
}

function validar_login(){
    var usuario = $('#usuario').val();
    var passw = $('#passw').val();
    if(usuario === ''){
        alertas('INFO','ATENCIÓN','Debe ingresar el usuario.');
        return false;
    }
    if(passw === ''){
        alertas('INFO','ATENCIÓN','Debe ingresar su contraseña.');
        return false;
    }
}

function modal_registro(){
    alert('hola');
}

function limpiar_modal_registro(){
    
}