$( document ).ready(function() {



	$(".navbar .navbar-nav a.nav-item").click(function (e) {
		//e.preventDefault();
		$(".navbar .navbar-nav a.nav-item").removeClass("active");
		$(this).addClass("active");
        if($(this).data('var0')!='' && $(this).data('var0')!=undefined){
            link($(this).data('var0'), $(this).data('var1'), $(this).data('var2'));
        }
	});
	
	$("#loader").fadeOut("fast");

	eventosFormulario();
		
});


function link(var0, var1='', var2=''){
	var formData = new FormData();
	formData.append("var0", var0);
	formData.append("var1", var1);
	formData.append("var2", var2);
	$.ajax({
		url: "consulta",
		type: "POST",
		dataType: "json",
		data: formData,
		contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
		processData: false, // NEEDED, DON'T OMIT THIS
		beforeSend: function(){
			$("#loader").fadeIn("fast");
		},
		success: function(resultado){
			if(resultado.status == "session_error"){
				sesion_cerrada();
			}else if(resultado.status == "ERROR"){
				$('main').html('');
			}else if(resultado.status == "SUCCESS"){
				if(resultado.html){
					$('main').html(resultado.html);
				}
				if(resultado.modal){
					openModal('modal_cal', resultado.size, resultado.modal);
				}
			}
			if(resultado.message) {
				notificacion(resultado.message, resultado.status);
			}
			eventosFormulario(resultado);
			$("#loader").fadeOut("fast");
		},
		error: function(){
			$("#loader").fadeOut("fast");
			notificacion('Hubo un error al atender su solicitud, intente nuevamente. Si el problema persiste, favor comunicarse con la unidad de informática.','danger');
		}
	});
}

function cargaUrl(url){
	if(url!=''){
		openModal('modal_link', 'xl', '<iframe src="'+url+'" class="h-100"></iframe>');
	}
}

function eventosFormulario(response=''){
	carga_datatable(response);

	if($('.link').length>0){
		$('.link').off('click');
		$('.link').click(function(){
			if($(this).data('var0')!=''){
				link($(this).data('var0'), $(this).data('var1'), $(this).data('var2'));
			}
		});
	}

	if($("input[name='fechaini']").length>0){
		$("input[name='fechaini']").change(function(){
			if($(this).val()!=''){
				if($("input[name='fechafin']").val()<$(this).val()){
					$("input[name='fechafin']").val('');
				}
				$("input[name='fechafin']").attr('min', $(this).val());
			}
		});
	}


	if($(".busca").length>0 && $("#modal").length>0) {
		$(".busca").off('select2:select');
		$(".busca").select2({
			//minimumInputLength: 3,
			dropdownParent: $('#modal'),
			width: 'auto',
			language: "es",
			theme: 'bootstrap4',
		});
	}else{
		$(".busca").off('select2:select');
		$(".busca").select2({
			//minimumInputLength: 3,
			width: 'auto',
			language: "es",
			theme: 'bootstrap4',
		});
	}

	if($('#editor').length>0) {
		tinymce.remove('#editor');
		tinymce.init({
			selector: 'textarea#editor',
			branding: false,
			skin: 'tinymce-5',
			plugins: 'lists wordcount',
			toolbar: 'bold italic undo redo wordcount',
			menubar: false,
			//entity_encoding : "raw",
			language: "es",
			height: 700,
			format_empty_lines: true,
			content_css: 'document',
			allow_unsafe_link_target: true,
			valid_children: '+body[style],-body[div],p[strong|a|#text]'
		});
	}

	if($('#ckeditor').length>0) {
		CKEDITOR.replace('ckeditor', {
			language: 'es',
			toolbarGroups: [
				{name: 'document', groups: ['mode', 'document', 'doctools']},
				{name: 'clipboard', groups: ['clipboard', 'undo']},
				//{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
				{name: 'forms', groups: ['forms']},
				//{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
				{name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']},
				//'/',
				{name: 'styles', groups: ['styles']},
				{name: 'links', groups: ['links']},
				//{ name: 'insert', groups: [ 'insert' ] },
				{name: 'colors', groups: ['colors']},
				{name: 'tools', groups: ['tools']},
				//'/',
				{name: 'others', groups: ['others']},
				{name: 'about', groups: ['about']}
			],
			removeButtons: 'Save,NewPage,Preview,Print,Templates,Form,Checkbox,TextField,Textarea,Select,Button,ImageButton,HiddenField,Radio,BidiLtr,BidiRtl,Language,CreateDiv,Blockquote,Anchor,Flash,PageBreak,Iframe,About,ShowBlocks',
			setData: ``

		});
	}


	if($('#summer').length>0){
		if($('#summer').prop('readOnly')==true){
			$('#summer').summernote({
				placeholder: '',
				height: 550,
				toolbar: false,
				lang: 'es-ES' // default: 'en-US'
			});
			$('#summer').summernote("disable");
		}else{
			$("#summer").summernote({
				placeholder: '',
				height: 550,
				lang: 'es-ES' // default: 'en-US'
			});
		}
	}



}

function enviaFormulario(ele_form, var0){
	ele_form=$(ele_form).attr('id');

	var f=$("#"+ele_form)[0];
	if(f.checkValidity()){
		$(".form-control").each(function(){
			$(this).removeClass('is-invalid');
		});
		bootbox.confirm({
			size: "large",
			title: "<i class='fas fa-exclamation-triangle fa-lg text-danger'></i> Estimado usuario",
			message:"¿Está seguro de enviar los datos ingresados? Favor verificar que todos los datos ingresados estén correctos",
			buttons: {
				confirm: {
					label: '<i class="fas fa-save"></i> Guardar',
					className: 'btn-primary'
				},
				cancel: {
					label: '<i class="fas fa-times"></i> Cancelar',
					className: 'btn-secondary'
				}
			},
			callback: function(result){ /* result is a boolean; true = OK, false = Cancel*/
				if(result){

					//var form = $('#dnc_form');
					var form = $('#'+ele_form)[0];
					//var data = $(form).serializeArray();
					var formData = new FormData(form);

					//data.push({name: "var0", value: var0});
					formData.append("var0", var0);

					$.ajax({
						url: "consulta",
						type: "POST",
						dataType: "json",
						//data: $.param(data),
						data: formData,
						contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
						processData: false, // NEEDED, DON'T OMIT THIS
						beforeSend: function(){
							$("#loader").fadeIn("fast");
						},
						success: function(resultado){
							$("#loader").fadeOut("fast");
							if(resultado.status == "session_error"){
								sesion_cerrada();
							}else if(resultado.status == "ERROR"){
								$('#nuevo_html').html('');
							}else if(resultado.status == "SUCCESS"){
								if(resultado.back!=''){
									if($("#modal_cal").length>0){
										$("#modal_cal").modal("hide");
									}
									link(resultado.back);
								}
							}
							if(resultado.message) {
								notificacion(resultado.message, resultado.status);
							}

						},
						error: function(){
							$("#loader").fadeOut("fast");
							notificacion('Hubo un error al atender su solicitud, intente nuevamente. Si el problema persiste, favor comunicarse con la unidad de informática.','danger');
						}
					});
				}
			}
		});
	}else{
		$(".form-control").each(function(){
			if($(this).val()==""){
				$(this).addClass('is-invalid');
			}else{
				$(this).removeClass('is-invalid');
			}
		});
	}


}

function sesion_cerrada(){
	if($("#loader").is(":visible")){
		$("#loader").fadeOut("fast");
	}
	bootbox.alert({ 
		size: "large",
		title: "<i class='fas fa-exclamation-triangle fa-lg text-danger'></i> Estimado usuario",
		message: "Se ha cerrado su sesión. Debe iniciar sesión para continuar utilizando el sistema.", 
		buttons: {
			ok: {
				label: '<i class="fas fa-paper-plane"></i> Iniciar sesión',
				className: 'btn-primary'
			}
		},
		callback: function(){ /* result is a boolean; true = OK, false = Cancel*/ 
			window.location.href = 'httpS://campus.unap.cl';
		}
	});
}