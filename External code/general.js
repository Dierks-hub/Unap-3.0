//Validar: Input numérico
function validaNumerico(e){
	var key = window.Event ? e.which : e.keyCode;
	return (key >= 48 && key <= 57)
}

window.mobilecheck = function() {
	var check = false;
	(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)) || $(window).width() < 765) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
	return check;
};

//Validar: Input RUT
function validaInputRut(e){
	var key = window.Event ? e.which : e.keyCode;
	return ((key >= 48 && key <= 57) || (key==8) || (key == 13) || (key == 45) || (key == 46) || (key == 107) )
}
function notificacion(mensaje,tipo='info',icono='',elemento='body'){
	switch(tipo.toUpperCase()){
		case 'SESSION_ERROR':
		case 'ERROR':
		case 'DANGER':
			tipo='danger';
			icono=(icono==='')?'fas fa-exclamation-circle':icono;
			break;
		case 'SUCCESS':
		case 'EXITO':
			tipo='success';
			icono=(icono==='')?'fas fa-check':icono;
			break;
		case 'WARNING':
			tipo='warning';
			icono=(icono==='')?'fas fa-exclamation-triangle':icono;
			break;
		case 'INFO':
			tipo='info';
			icono=(icono==='')?'fas fa-info-circle':icono;
			break;
		default:
			tipo='info';
			icono=(icono==='')?'fas fa-question-circle':icono;
	}
	if(mensaje!='' && mensaje!=undefined) {
		$.notify({
			// options
			icon: icono,
			message: mensaje,
			target: '_blank',
		}, {
			// settings
			element: elemento,
			position: null,
			type: tipo,
			allow_dismiss: true,
			newest_on_top: false,
			showProgressbar: false,
			placement: {
				from: "top",
				align: "right"
			},
			offset: 20,
			spacing: 10,
			z_index: 99999,
			delay: 5000,
			timer: 1000,
			url_target: '_blank',
			mouse_over: null,
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			}
		});
	}
}

function setCalendario(procesos, eventos){
if($('#calendario').length>0){
	var f = new Date();
	var dia_actual=f.getDate();
	var mes_actual=f.getMonth()+1;
	if(mes_actual<10){
		mes_actual='0'+mes_actual;
	}
	if(dia_actual<10){
		dia_actual='0'+dia_actual;
	}
	var anho_actual=f.getFullYear();
	var anho_anterior=f.getFullYear()-1;
	var anho_proximo=f.getFullYear()+1;
	fecha_inicial=anho_actual+'-'+mes_actual+'-'+dia_actual;
	console.log(fecha_inicial);
	var calendarEl = $('#calendario')[0];
	var calendar = new FullCalendar.Calendar(calendarEl, {
		height: 'auto',
		dayMaxEvents: false,
		//initialView: window.mobilecheck() ? "listWeek" : "multiMonthYear",
		initialView: window.mobilecheck() ? "listWeek" : "dayGridMonth",
		//initialView: "dayGridMonth",
		initialDate: fecha_inicial,
		slotMinTime: '07:00',
		slotMaxTime: '18:00',
		validRange: {
			start: anho_anterior+'-01-01',
			end: anho_proximo+'-12-31'
		},
		// headerToolbar: { center: 'resourceTimeGridDay,timeGridWeek,dayGridMonth' },
		headerToolbar: {
			left: 'prev,next today',
			center: 'title',
			//right: 'multiMonthYear,dayGridMonth,timeGridWeek'
			right: 'dayGridMonth,listWeek,multiMonthYear'
		},
		businessHours: [ // specify an array instead
			{
				daysOfWeek: [ 1, 2, 3, 4, 5], //
				startTime: '08:00', // 8am
				endTime: '17:00' // 6pm
			},
			{
				daysOfWeek: [ 6, 7 ], //
				startTime: '10:00', // 10am
				endTime: '16:00' // 4pm
			},

		],
		//hiddenDays: [6,7],
		//weekends: false,
		eventDidMount: function (info) {
			if(info.event.extendedProps.description) {
				$(info.el).popover({
					title: info.event.extendedProps.process+' - '+info.event.title,
					placement: 'top',
					trigger: 'hover',
					content: info.event.extendedProps.description,
					container: 'body'
				});
			}
		},
		// dateClick: function(info) {
		//     alert('Clicked on: ' + info.dateStr);
		//     //alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
		//     //alert('Current view: ' + info.view.type);
		//     // change the day's background color just for fun
		//     //info.dayEl.style.backgroundColor = 'red';
		// },
		resourceAreaHeaderContent: 'Procesos/Servicios',
		resourceOrder: 'title',
		resourceAreaWidth: window.mobilecheck() ? "50%" : "30%",
		resources: procesos,
		events: eventos,
		eventClick: function(info) {
			info.jsEvent.preventDefault(); // don't let the browser navigate
			if((info.event.extendedProps.modal_act!='' && info.event.extendedProps.modal_act!=null && info.event.extendedProps.modal_act!=undefined) && (info.event.extendedProps.id_act!='' && info.event.extendedProps.id_act!=null && info.event.extendedProps.id_act!=undefined)) {
				link(info.event.extendedProps.modal_act, info.event.extendedProps.id_act, info.event.extendedProps.anho);
			}
		},
	});
	calendar.render();
	calendar.setOption('locale', 'es');
	$('.fc-toolbar.fc-header-toolbar').addClass('row col-lg-12');
}
}

function carga_datatable(resultado=''){
	if($('.tablita').length>0){
		$('.tablita').each(function(){
			//$.fn.dataTable.moment( 'DD/MM/YYYY HH:mm:ss' );
			var columnas=[0];
			var quitar='';
			var oculta=[];
			var titulo_seccion=$(this).data('titulo');
			var tabla_id=$(this).attr('id');
			var paginacion=$(this).data('paginacion');
			var ocultar=$(this).data('oculta');
			var boton=$(this).data('boton');

			if(paginacion=='' || paginacion==undefined){
				paginacion=40;
			}
			if(titulo_seccion=='' || titulo_seccion==undefined){
				titulo_seccion='Reporte';
			}
			if(tabla_id=='' || tabla_id==undefined){
				tabla_id='tabla_'+Math.random();
			}
			if(ocultar!=''){
				var ocultos=ocultar.toString().split(',');
				ocultos.map(function(d){
					oculta.push(parseInt(d)-1);
				});
			}
			if(boton != ''){
				var btns=boton.toString().split(',');
				btns.map(function(d){
					columnas.push(parseInt(d)-1);
				});
				if(ocultar!='' && ocultar>0) {
					quitar = ':not(:eq(' + boton + '), :eq(' + (ocultar-1) + '))';
				}else{
					quitar = ':not(:eq(' + boton + '))';
				}
			}else{
				quitar='';
			}


			$('#'+tabla_id).DataTable({
				//dom: 'Bfrtip',
				dom: '<"row d-flex justify-content-between mx-0"<"col-xs-12"B><"col-xs-12"f>>rtip',
				'responsive': true,
				'retrieve': true,
				'pageLength': paginacion,
				'columnDefs': [
					{
						"targets": oculta,//ocultando nombres estados (columna 2)
						"visible": false,
						"searchable": false
					},
					{ targets:columnas, className: "desktop" },
					{ targets:columnas, className: "tablet" },
					{ targets:columnas, className: "mobile" }
				],
				buttons: [
					//'copy', 'csv', 'excel', 'pdf', 'print'
					{
						extend: 'excel', text: '<i title="Exportar a Excel" class="fa fa-file-excel m-1"></i>',
						title: titulo_seccion,
						className: 'btn-success btn-xs',
						exportOptions: {/*mostrando todos menos el icono del estado0*/
							columns: quitar
						}
					},
					{
						extend: 'pdf', text: '<i title="Exportar a PDF" class="fa fa-file-pdf m-1"></i>',
						title: titulo_seccion,
						className: 'btn-success btn-xs',
						orientation: 'landscape', pageSize: 'letter',
						exportOptions: {/*No mostrar las siguientes*/
							columns: quitar
						}
					},
					{
						extend: 'print', text: '<i title="Imprimir" class="fa fa-print m-1"></i>',
						title: titulo_seccion,
						className: 'btn-success btn-xs',
						exportOptions:{/*mostrando todos menos el icono del estado0*/
							columns: quitar
						}
					}
				],
				'paging':   true,
				'ordering': true,
				'order': [],
				'searching': true,
				'info':     true,
				'colReorder': true,
				'language': {'url': 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'},
			});
		});
	}
}
function openModal(id,size,content,centered){
    var modalSize = '';
    var modalSizePx = '';
	var modalCentered = '';
    if(size=='sm' || size=='md' || size=='lg' || size=='xl'){
        modalSize = "modal-"+size;
    }else{
        if(size!=''){ 
            if(size.indexOf('px')!=-1){
                modalSizePx = "width:"+size;
            }
        }
    }
	if(centered==1){
		modalCentered = "modal-dialog-centered";
	}else{
		modalCentered = "";
	}
	
    var modal='';
    modal+='    <div class="modal fade" id='+id+' tabindex="-1" role="dialog" aria-labelledby="'+id+'Label" data-keyboard="true" data-backdrop="true">';
    modal+='      <div class="modal-dialog '+modalCentered+' '+modalSize+'" role="document" style="'+modalSizePx+'">';
    modal+='        <div class="modal-content">';
	modal+=			content;
    modal+='        </div>';
    modal+='      </div>';
    modal+='    </div>';        
    $('body').append(modal);
    var modals = $('.modal').length;
    var zindexModal = 1050+((10*(parseInt(modals)-1)));
    var newmodal = $('#'+id).css("z-index",zindexModal);
   // console.log(zindexModal);
    $('.modal').unbind('shown.bs.modal');
    $('.modal').unbind('hidden.bs.modal');
    $('.modal').on('shown.bs.modal', function() {
        $('body').css('padding-right','-17px');
        var backdrops = $('.modal-backdrop ').length;
        var className = $('.modal-backdrop').attr('class');
        $("[class='modal-backdrop fade in']").addClass("backdrop_"+backdrops);
        var zindex = $("[class='modal-backdrop fade in backdrop_"+backdrops+"']").css("z-index");
        var modal = $("[class='modal fade in']").css("z-index");
        var zindexNumber = (parseInt(zindex))+((10*(parseInt(backdrops)-1)+1));
        $("[class='modal fade in']").addClass("modal_"+backdrops);
        //console.log(zindexNumber);
        $("[class='modal-backdrop fade in backdrop_"+backdrops+"']").css("cssText", "opacity: 0.5 !important; z-index:"+zindexNumber);
    });
    $('.modal').on('hide.bs.modal', function() {
       var backdrops = $('.modal-backdrop ').length;
       $("[class='modal-backdrop fade in backdrop_"+backdrops+"']").css("cssText", "opacity: 0 !important;"); 
    });
    $('.modal').on('hidden.bs.modal', function() {
       var className = $(this).attr('class');
       var nextIndex = className.slice(-1)-1;
       $(this).remove();    
       if($('.modal').length>0){
           $('body').addClass('modal-open');
       }
       if(nextIndex>0){
           $("[class='modal fade in modal_"+nextIndex+"']").attr("tabindex","-1");
       }
    });
    $('#'+id).modal('show');
}

function valida_rut(elemento) {
	var texto = elemento.value;
	var tmpstr = "";
	for (i = 0; i < texto.length; i++)
		if (texto.charAt(i) != ' ' && texto.charAt(i) != '.'
				&& texto.charAt(i) != '-')
			tmpstr = tmpstr + texto.charAt(i);
	texto = tmpstr;
	largo = texto.length;
	if (texto != '') {
		if (largo < 8) { 
			//return "Debe ingresar el rut completo.-";
			return false;
		}
	}

	for (i = 0; i < largo; i++) {
		if (texto.charAt(i) != "0" && texto.charAt(i) != "1"
				&& texto.charAt(i) != "2" && texto.charAt(i) != "3"
				&& texto.charAt(i) != "4" && texto.charAt(i) != "5"
				&& texto.charAt(i) != "6" && texto.charAt(i) != "7"
				&& texto.charAt(i) != "8" && texto.charAt(i) != "9"
				&& texto.charAt(i) != "k" && texto.charAt(i) != "K") { 
			elemento.focus();
			elemento.select();
			//return "El valor ingresado no corresponde a un R.U.T valido.";
			return false;
		}
	}

	var invertido = "";
	for (i = (largo - 1), j = 0; i >= 0; i--, j++)
		invertido = invertido + texto.charAt(i);
	var dtexto = "";
	dtexto = dtexto + invertido.charAt(0);
	dtexto = dtexto + '-';
	cnt = 0;

	for (i = 1, j = 2; i < largo; i++, j++) {
		// alert("i=[" + i + "] j=[" + j +"]" );
		if (cnt == 3) {
			dtexto = dtexto + '.';
			j++;
			dtexto = dtexto + invertido.charAt(i);
			cnt = 1;
		} else {
			dtexto = dtexto + invertido.charAt(i);
			cnt++;
		}
	}

	invertido = "";
	for (i = (dtexto.length - 1), j = 0; i >= 0; i--, j++)
		invertido = invertido + dtexto.charAt(i);

	elemento.value = invertido.toUpperCase();
	
	var resp = revisar_digito(elemento, texto);
	return resp;

}

function revisar_digito(elemento, crut) {
	if(elemento.value == '-'){
		elemento.value = '';	
	}
	var largo, rut, dv;
	largo = crut.length;
	if (largo < 8 && largo > 3) {
		//return "Debe ingresar el rut completo";
		return false;
	}
	if (largo > 2)
		rut = crut.substring(0, largo - 1);
	else
		rut = crut.charAt(0);
	dv = crut.charAt(largo - 1);
	//revisarDigito(elemento, dv);
	if (rut == null || dv == null)
		return true
	if (rut == '' || dv == '')
		return true
	var dvr = '0'
	suma = 0
	mul = 2
	for (i = rut.length - 1; i >= 0; i--) {
		suma = suma + rut.charAt(i) * mul
		if (mul == 7)
			mul = 2
		else
			mul++
	}
	res = suma % 11
	if (res == 1)
		dvr = 'k'
	else if (res == 0)
		dvr = '0'
	else {
		dvi = 11 - res
		dvr = dvi + ""
	}
	if (dvr != dv.toLowerCase()) {
		//alert("El rut es incorrecto");
		return false;
	}
	//alert("El rut es correcto");
	return true;
}

function buscarPersona(p_apaterno, p_amaterno, p_nombres, p_tipo, objeto){
	//Limpiar el contenedor del resultado de búsqueda 
	$('#resultado-busqueda').html('');
	
	var tipopersona = p_tipo; // 1-Estudiante, 2-Personal, 3-Todos
	var parametros = p_apaterno + '@' + p_amaterno + '@' + p_nombres + '@' + tipopersona;
	
	//TODO Cambiar ruta al pasar a producción
	var url = 'busca_personal_bt/presentacion/rrhh_consultas.php';
    $.ajax({
        type: "POST",
        url:  url,
        data:({
            bandera:'general',
      	  	tipo : 'personal',
      	  	paramet: parametros
        }),
        dataType: "xml",
        beforeSend: function() {
        	$("#loader").fadeIn("fast");
	    },
        success: function(xml){
        	if($(xml).find('personal').length == 0){
        		armarPersonasEncontradas(0);
				$("#loader").fadeOut("fast");
        		return;
        	}
        	
            $(xml).find('personal').each(function(el){

				var rut 			= $(this).find('KNUMERUT').text();
				var rut_completo 	= $(this).find('RUTCOMPL').text();
				var rut_encodeado 	= $(this).find('RUTENCOD').text();
                var nombres 		= $(this).find('NOMBRESS').text().toLowerCase().replace(/(^|\s)\S/g, l => l.toUpperCase());
				var apaterno 		= $(this).find('APATERNO').text().toLowerCase().replace(/(^|\s)\S/g, l => l.toUpperCase());
				var amaterno 		= $(this).find('AMATERNO').text().toLowerCase().replace(/(^|\s)\S/g, l => l.toUpperCase());
				var foto 			= $(this).find('FOTO').text();
				var nombre_completo = nombres + ' ' + apaterno + ' ' + amaterno;
				
				//if(foto.indexOf("noimgfunc.JPG")!=-1){
					foto = "img/nofoto.jpg";
				//}
				
				var persona = {
					rut: rut,
					rut_completo: rut_completo,
					rut_encodeado: rut_encodeado,
					nombre_completo: nombre_completo,
					nombres: nombres,
					apaterno: apaterno,
					amaterno: amaterno,
					foto: foto
				};
				
				armarPersonasEncontradas(persona,objeto,el);
            });
			
			$("#loader").fadeOut("fast");
        }
    });
}


/* Función para armar cada persona */
function armarPersonasEncontradas(persona,objeto,el){
	if(persona == 0){
	$('#resultado-busqueda').html('<div class="col"><p class="text-center">No se han encontrado personas</p></div>');
		return;
	}
	
	var html = 	'<div class="col-xs-12 col-sm-12 col-md-6">';
	html += '		<div class="card" style="margin-bottom:15px;">';
	html += '			<div class="card-body">';
	html += '				<div class="row">';
	html += '					<div class="col-xs-5 col-md-4">';
	html += '						<img class="" src="' + persona.foto + '" alt="">';
	html += '					</div>';
	html += '					<div class="col-xs-7 col-md-8">';
	html += '						<h6 class="card-title">' + persona.nombre_completo + '</h6>';
	html += '						<p class="card-text">Rut: ' + persona.rut_completo + '</p>';
	html += '						<a href="#" id="btnAgregar'+el+'" class="btn btn-primary" ><i class="fas fa-user-plus"></i> Agregar</a>';	
	html += '					</div>';
	html += '				</div>';
	html += '			</div>';
	html += '		</div>';
	html += '	</div>';
	
	$('#resultado-busqueda').append(html);
	$("#btnAgregar"+el).click(function(e){
		e.preventDefault();
		$("#modalBuscaPersona").modal("hide");
		objeto.funcion(objeto,persona);
	});
}
