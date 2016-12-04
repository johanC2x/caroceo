var res = 0;


/* METODOS POST */
function validar(id){
	$(".validate").each(function() {
		if($(this).val() == ''){
			res = 1;
		}
	}); 
	if(res == 1){
		var resp = obtenerAlert("Existen campos requeridos!...");
		$("#postMess").html(resp);
	}else{	
		if(id == null){
			insertarPost();
		}else{
			editarPost(id);
		}
	}
}

function insertarPost(){
	var resp = "";
	var inputFileImage = document.getElementById("file");
	var file = inputFileImage.files[0];
	var data = new FormData();
	data.append('idmarca', idmarca);	
	data.append('modelo', modelo);
	data.append('anio', anio);
	data.append('titulo', titulo);
	data.append('precio', precio);
	data.append('nropuertas', nropuertas);
	data.append('color', color);
	data.append('idtipotransmision', idtipotransmision);
	data.append('idtipotimon', idtipotimon);
	data.append('idtipocombustible', idtipocombustible);
	data.append('descripcion', descripcion); 
	/*data.append('file', file);*/
	$.ajax({
		url: path+'post/insert',
		type: 'POST',
		data: data,
		contentType: false,
        processData: false,
        cache: false,
		success:function(msg){
			console.log(msg);
			if(msg == 1){
				resp = obtenerAlert("Operación realizada con exito...");
				$("#postMess").html(resp);
				resetear("frmPost");
			}else{
				resp = obtenerAlert("Ocurrio un error...");
				$("#postMess").html(resp);
			}
		}
	}); 
}

function editarPost(id){
	var resp = "";  
	$.ajax({
		url: path+'post/update',
		type: 'POST',
		data: $("#frmPost").serialize(), 
		success:function(msg){
			console.log(msg);
			if(msg == 1){
				resp = obtenerAlert("Operación realizada con exito...");
				$("#postMess").html(resp);
				location.reload();
			}else{
				resp = obtenerAlert("Ocurrio un error...");
				$("#postMess").html(resp);
			}
		}
	}); 
}

function obtenerPostId(idauto){
	$.ajax({
		url: path+'post/postId',
		type: 'POST',
		data:{
			idauto:idauto
		},
        success:function(msg){
        	console.log(msg);        	
        }
	});
}

function obtenerEstado1(){
	if($("#estado1").is(':checked')) { 
		$("#estado1").prop("checked", "checked");
		$("#estado2").attr("disabled",true);
	}else{
		$("#estado2").attr("disabled",false);
	} 
}

function obtenerEstado2(){
	if($("#estado2").is(':checked')) { 
		$("#estado2").prop("checked", "checked");
		$("#estado1").attr("disabled",true);
	}else{
		$("#estado1").attr("disabled",false);
	} 
}

/* METODOS COMENTARIO */
function publicarComentario(objForm){
	res = validarForm("Comment");
	var comentario = $("#comentario").val();
	if(res == 1){
		var resp = obtenerAlert("Existen campos requeridos!...");
		$("#commentMess").html(resp);
	}else if(res == 0){
		$.ajax({
			url: path+'post/insertComment',
			type: 'POST',
			data: $("#"+objForm).serialize(),
			success:function(msg){
				console.log(msg);
				if(msg == 1){
					resp = obtenerAlert("Publicación exitosa...");
					$("#commentMess").html(resp);
					resetear("frmComment");
					location.reload();
				}else{
					resp = obtenerAlert("Ocurrio un error...");
					$("#commentMess").html(resp);
				}
			}
		});
	}
}

/* METODOS WEB SERVICE */
function OceoService(){
	var op = 1;
	var nroDoc = $("#nroDoc").val();
	$.ajax({
		url: '../../../../oceoService/ServiceController.php',
		type: 'POST',
		data: {
			op: op,
			nroDoc:nroDoc
		},
		success:function(msg){
			console.log(msg);
		}
	});
}


