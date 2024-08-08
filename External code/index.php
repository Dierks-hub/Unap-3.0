<?php
session_start();
include_once("funciones.php");
include_once("../variables_globales.php"); // Genericas
include_once(SEGURIDAD);
include_once(SEGURIDAD_CAMPUS);
include_once(FUNCIONES);
include_once(POST);
include_once(GET);

include_once(CAPA_NEG . "/persona_neg.php");
include_once(CAPA_NEG . "/proceso_neg.php");
include_once(CAPA_NEG . "/actividad_neg.php");
include_once(CAPA_NEG . "/responsable_neg.php");
include_once(CAPA_NEG . "/php-html-css-js-minifier.php");

$seguridad       = new seguridad();
$seguridad_campus = new seguridad_campus();
//header('Content-Type: text/html; charset=UTF-8');
if (!isset($_SESSION["pid_APP_CALANUAL"])) {
    if ($seguridad_campus->val_session()) {
        $auth            = $seguridad->genera();
        $_SESSION['pid_APP_CALANUAL'] = $_SESSION['uol_pid'];
        $_SESSION['tid_APP_CALANUAL'] = $_SESSION['uol_tid'];
    } else {
        header("Location: " . REDIRIGE);
        die('OFF!');
    }
}

$seguridad         = new seguridad();
$rut_usuario = $seguridad->decode($_SESSION["pid_APP_CALANUAL"]);
$v_tip_user  = strtolower($seguridad->decode($_SESSION['tid_APP_CALANUAL'])); //estudiante  / funcionario

$persona = new persona_neg(USERCON);
$persona->obtienePermisoAcceso(CODAPP, $rut_usuario);
$persona->getSet(0);
if ($persona->PERMISO == 0) {
    header("Location: " . ACCESO);
    die();
}

$persona = new persona_neg(USERCON);
$persona->ObtenerDatosPersonaXRut($rut_usuario);
$persona->getSet(0);

$nombress     = utf8_encode($persona->NOMBRESS);
$apaterno     = utf8_encode($persona->APATERNO);
$amaterno     = utf8_encode($persona->AMATERNO);

$rut_completo = ObtieneRutFormateado($rut_usuario);
$nombre_completo = $nombress . " " . $apaterno . " " . $amaterno;
$_SESSION['USER_NAME'] = $seguridad->encode($nombre_completo);

$result_m = $persona->ObtenerMailFuncEstXRutYTipo($rut_usuario, 2);
$_SESSION["USER_MAIL"] = $result_m[0]['MAIL'];

$responsable = new responsable_neg(USERCON);
$responsable->ObtieneResponsable($rut_usuario);
$responsable->getSet(0);
$rol_usuario = $responsable->ROL_RESPONSABLE;
$permiso_admin = 'd-none';
$permiso_user = 'd-none';
switch ($rol_usuario) {
    case 2:
        $permiso_admin = 'd-block';
    case 1:
        $permiso_user = 'd-block';
        break;
}

$proceso = new proceso_neg(USERCON);
$proceso->ObtieneProcesos();
$filas = $proceso->getFilas();
$procesos = [];
for ($i = 0; $i < $filas; $i++) {
    $proceso->getSet($i);

    $lista_procesos .= '<a href="#" title="Proceso de ' . $proceso->NOMBRE_PROCESO . ', actualmente con ' . $proceso->ACTIVIDADES . ' actividad/es registrada/s" class="d-inline-flex"><span class="m-3 link" data-var0="' . $seguridad->encode(1005) . '" data-var1="' . $seguridad->encode($proceso->ID_PROCESO) . '"><i style="color: ' . $proceso->COLOR_PROCESO . '" class="fa fa-square"></i> ' . $proceso->NOMBRE_PROCESO . ' (' . $proceso->ACTIVIDADES . ')</span></a>';
    $reg = array(
        'title' => $proceso->NOMBRE_PROCESO,
        'id' => $proceso->ID_PROCESO,
    );
    array_push($procesos, $reg);
}

$actividades = new actividad_neg(USERCON);
$responsables = new responsable_neg(USERCON);
$eventos = [];

//$feriados=DiasFeriados();
$feriados = $actividades->ObtieneFeriados();
$mis_feriados = [];
foreach ($feriados as $f) {
    $reg_feriados = array(
        'title' => 'FERIADO',
        'start' => $f['FECHA'],
        'end'   => $f['FECHA'],
        'display' => 'background',
        'color' => '#976F9E'
    );
    array_push($mis_feriados, $f['FECHA']);
    array_push($eventos, $reg_feriados);
}
$_SESSION['feriados'] = $mis_feriados;
$actividades->ObtieneActividadesCalendario();
$filas = $actividades->getFilas();

for ($i = 0; $i < $filas; $i++) {
    $actividades->getSet($i);
    $listado = '';
    $responsables->ObtieneResponsableActividad($actividades->ID_ACTIVIDAD);
    if ($responsables->getFilas() > 0) {
        $listado = 'Responsables Asignados: ';
        for ($j = 0; $j < $responsables->getFilas(); $j++) {
            $responsables->getSet($j);
            $listado .= ($j > 0) ? ', ' : '';
            $listado .= $responsables->NOMBRESS_RESPONSABLE . ' ' . $responsables->APATERNO_RESPONSABLE;
        }
    }
    $observacion = '';
    if ($actividades->OBS_ACTIVIDAD != '') {
        $observacion = 'Observación: ' . $actividades->OBS_ACTIVIDAD;
    }

    $mensaje_descripcion = $listado . $observacion;
    $anho = ($actividades->FECHAINI_ACTIVIDAD != '') ? explode('-', $actividades->FECHAINI_ACTIVIDAD) : '';
    $reg = array(
        'title' => $actividades->NOMBRE_ACTIVIDAD,
        'process' => $actividades->NOMBRE_PROCESO,
        'description' => $mensaje_descripcion,
        'id_act' => $seguridad->encode($actividades->ID_ACTIVIDAD),
        'modal_act' => $seguridad->encode('2003'),
        'anho' => ($anho[0] != '') ? $anho[0] : '',
        'start' => $actividades->FECHAINI_ACTIVIDAD,
        'end'   =>  $actividades->FECHAFIN_ACTIVIDAD,
        'color' => $actividades->COLOR_PROCESO,
        'resourceId' => $actividades->ID_PROCESO,
        'className' => 'evento'
    );
    array_push($eventos, $reg);
}

$cantidad_habiles = count(DiasHabiles('', '', $mis_feriados));
$cantidad_habilessinferiados = count(DiasHabiles('', '', -1));

$responsables->ObtieneResponsables();
$filas = $responsables->getFilas();
$cumples_dia = [];
for ($i = 0; $i < $filas; $i++) {
    $responsables->getSet($i);
    $anho = date('Y');
    $fecha_aviso = ($responsables->FECHANAC_RESPONSABLE != '') ? explode('-', $responsables->FECHANAC_RESPONSABLE) : '';
    $fecha_cumple = $anho . '-' . $fecha_aviso[1] . '-' . $fecha_aviso[2];
    $edad = $anho - $fecha_aviso[0];
    if ($fecha_cumple == date('Y-m-d')) {
        array_push($cumples_dia, $responsables->NOMBRESS_RESPONSABLE . ' ' . $responsables->APATERNO_RESPONSABLE . ' ' . $responsables->AMATERNO_RESPONSABLE);
    }
    $nombre_foto = BuscaStringFoto($responsables->RUT_RESPONSABLE);
    $url_foto = '../../archivos/fotos/fotosfuncionarios/' . $nombre_foto;
    if (!file_exists($url_foto)) {
        $url_foto = '../../archivos/fotos/fotosfuncionarios/z_' . $nombre_foto;
        if (!file_exists($url_foto)) {
            $url_foto = '';
        }
    }
    $reg = array(
        'title' => $responsables->NOMBRESS_RESPONSABLE . ' ' . $responsables->APATERNO_RESPONSABLE . ' ' . $responsables->AMATERNO_RESPONSABLE,
        'process' => 'Cumpleaños',
        'description' => 'Cumple ' . $edad . ' años el ' . muestraFecha(2, $fecha_cumple) . '</br><div class="text-center"><img class="mt-1 rounded mx-auto" src="' . $url_foto . '" width="80%"></div>',
        'start' => $fecha_cumple,
        'end'   =>  $fecha_cumple,
        'color' => '',
        'className' => 'evento'
    );
    array_push($eventos, $reg);

    /*anterior*/
    $anho = date('Y') - 1;
    $fecha_aviso = ($responsables->FECHANAC_RESPONSABLE != '') ? explode('-', $responsables->FECHANAC_RESPONSABLE) : '';
    $fecha_cumple = $anho . '-' . $fecha_aviso[1] . '-' . $fecha_aviso[2];
    $edad = $anho - $fecha_aviso[0];
    $reg = array(
        'title' => $responsables->NOMBRESS_RESPONSABLE . ' ' . $responsables->APATERNO_RESPONSABLE . ' ' . $responsables->AMATERNO_RESPONSABLE,
        'process' => 'Cumpleaños',
        'description' => 'Cumple ' . $edad . ' años el ' . muestraFecha(2, $fecha_cumple) . '</br><div class="text-center"><img class="mt-1 rounded mx-auto" src="' . $url_foto . '" width="80%"></div>',
        'start' => $fecha_cumple,
        'end'   =>  $fecha_cumple,
        'color' => '',
        'className' => 'evento'
    );
    array_push($eventos, $reg);
    /*siguiente*/
    $anho = date('Y') + 1;
    $fecha_aviso = ($responsables->FECHANAC_RESPONSABLE != '') ? explode('-', $responsables->FECHANAC_RESPONSABLE) : '';
    $fecha_cumple = $anho . '-' . $fecha_aviso[1] . '-' . $fecha_aviso[2];
    $edad = $anho - $fecha_aviso[0];
    $reg = array(
        'title' => $responsables->NOMBRESS_RESPONSABLE . ' ' . $responsables->APATERNO_RESPONSABLE . ' ' . $responsables->AMATERNO_RESPONSABLE,
        'process' => 'Cumpleaños',
        'description' => 'Cumple ' . $edad . ' años',
        'start' => $fecha_cumple,
        'end'   =>  $fecha_cumple,
        'color' => '',
        'className' => 'evento'
    );
    array_push($eventos, $reg);
}

ob_start();
?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= RUTA_APP ?>/presentacion/img/favicon/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= RUTA_APP ?>/presentacion/css/bootstrap.css">
    <!--    <link rel="stylesheet" href="css/fontawesome-all.css">-->
    <!--	<link rel="stylesheet" href="css/fa-svg-with-js.css">-->
    <!-- Animate v3.5.1 -->
    <link rel="stylesheet" href="<?= RUTA_APP ?>/presentacion/css/animate.css">
    <!-- Bootstrap Date/Time Picker v4.17.47 -->
    <link rel="stylesheet" href="<?= RUTA_APP ?>/presentacion/css/bootstrap-datetimepicker.min.css">
    <!-- dataTables -->
    <link rel="stylesheet" href="<?= GENERALIDADES_HTML ?>lib/DataTables-1.10.20/datatables.min.css">

    <link href="<?= RUTA_APP ?>/presentacion/css/select2.min.css" rel="stylesheet" />
    <link href="<?= RUTA_APP ?>/presentacion/css/select2-bootstrap4.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= RUTA_APP ?>/presentacion/vendor/fullCalendar/main.css">
    <link rel="stylesheet" href="<?= RUTA_APP ?>/presentacion/vendor/fullCalendar/time-line.min.css">
    <link rel="stylesheet" href="<?= RUTA_APP ?>/presentacion/css/custom.css">
    <link rel="stylesheet" href="<?= RUTA_APP ?>/presentacion/css/colors.css">
    <title>Calendario Anual</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-unap-blue fixed-top">
            <!--			<a class="navbar-brand" href="#"><img class="logo-unap" src="img/logo_unap_blanco2.png"></a>-->
            <a class="navbar-brand" href="#"><img class="logo-unap" src="<?= RUTA_APP ?>/presentacion/img/logo_unap_negativo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <div class="navbar-nav mr-auto ml-auto">
                    <a class="nav-item nav-link m-2 active" href="inicio"><i class="fas fa-calendar"></i> Calendarización</a>
                    <a class="nav-item nav-link m-2" href="#" data-var0="<?= $seguridad->encode(3002) ?>"><i class="fas fa-calendar-check"></i> Mis Actividades</a>
                    <a class="nav-item nav-link m-2 <?= $permiso_user ?>" href="#" data-var0="<?= $seguridad->encode(2001) ?>"><i class="fas fa-calendar-plus"></i> Registro Actividades</a>
                    <a class="nav-item nav-link m-2 <?= $permiso_user ?>" href="#" data-var0="<?= $seguridad->encode(1001) ?>"><i class="fas fa-plus"></i> Registro Procesos</a>
                    <a class="nav-item nav-link m-2" href="#" data-var0="<?= $seguridad->encode(3001) ?>"><i class="fas fa-bell"></i> Alertas</a>
                    <a class="nav-item nav-link m-2 <?= $permiso_admin ?>" href="#" data-var0="<?= $seguridad->encode(4002) ?>"><i class="fas fa-users"></i> Usuarios</a>
                    <a class="nav-item nav-link m-2 <?= $permiso_admin ?>" href="#" data-var0="<?= $seguridad->encode(4001) ?>"><i class="fas fa-user-secret"></i> Auditoría</a>
                </div>
                <!--				<div class="text-light py-2 mr-4">-->
                <!--				  -->
                <!--				</div>-->
                <div class="text-light py-2" href="#"><i class="fas fa-user-circle"></i> <?= $nombre_completo ?></div>
            </div>
        </nav>
    </header>

    <main style='padding: 71px 0 30px 0;'>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 px-0">
                    <div class="card">
                        <div class="card-header bg-unap-green text-white">

                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <h2 class="m-0"><i class="fas fa-calendar"></i> Calendario Anual DTIC<br></h2>
                                    <h6 class="m-0 form-text text-light">
                                        Aquí se registran las actividades/procesos donde se requiere a DTIC anualmente.
                                    </h6>
                                </div>
                                <div class="col-sm-12 col-lg-6 text-right vertical-align ">
                                    <?= '<span class="badge badge-success-light m-1 pb-0 link" data-var0="' . $seguridad->encode(2006) . '"><h5><i class="fas fa-calendar-check resaltar mr-2"></i>Ver Actividades en desarrollo</h5></span>' ?>
                                    <?= '<span class="badge badge-dark m-1 pb-0"><h5>Días Hábiles: ' . $cantidad_habiles . '</h5></span>' ?>
                                    <?= '<span class="badge badge-dark m-1 pb-0"><h5>Días Feriados: ' . ($cantidad_habilessinferiados - $cantidad_habiles) . '</h5></span>' ?>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 mb-2">
                                    <?= $lista_procesos ?>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xl-12 col-md-12 vh-100">
                                    <div id="calendario" class="calendario"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <footer>
        <div class="w-100 p-4 bg-unap-dark text-center text-light">Aplicación Calendario Anual DTIC <br>UNAP <?php echo date("Y"); ?></div>
    </footer>
    <div id="loader">
        <div class="loader-content">
            <div class="fa-4x">
                <i class="fas fa-circle-notch fa-spin fast-spin text-light"></i>
            </div>
        </div>
    </div>

    <!-- jQuery 3.3.1 -->
    <script src="<?= RUTA_APP ?>/presentacion/js/jquery-3.3.1.min.js"></script>
    <!-- Popper v1 -->
    <script src="<?= RUTA_APP ?>/presentacion/js/popper.min.js"></script>
    <!-- Moment with locales v2.22.0 -->
    <script src="<?= RUTA_APP ?>/presentacion/js/moment-with-locales.min.js"></script>
    <!-- Bootstrap v4.0.0 -->
    <script src="<?= RUTA_APP ?>/presentacion/js/bootstrap.js"></script>
    <!-- Font Awesome v5.0.9 -->
    <script src="<?= RUTA_APP ?>/presentacion/js/fontawesome-all.js"></script>
    <!-- Bootstrap Notify v3.1.5 -->
    <script src="<?= RUTA_APP ?>/presentacion/js/bootstrap-notify.js"></script>

    <!-- dataTables -->
    <script type="text/javascript" src="<?= GENERALIDADES_HTML ?>lib/DataTables-1.10.20/datatables.min.js"></script>
    <script type="text/javascript" src="<?= GENERALIDADES_HTML ?>lib/moment-2.17.1/moment-with-locales.js"></script>
    <script type="text/javascript" src="<?= RUTA_APP ?>/presentacion/js/datetime-moment.js"></script>
    <!-- Bootstrap Date/Time Picker v4.17.47 -->
    <script src="<?= RUTA_APP ?>/presentacion/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Bootbox v4.4.0 -->
    <script src="<?= RUTA_APP ?>/presentacion/js/bootbox.min.js"></script>
    <!-- CKeditor v4.9.1 -->
    <script src="<?= RUTA_APP ?>/presentacion/js/select2.full.min.js"></script>
    <script src="<?= RUTA_APP ?>/presentacion/js/tooltip.js"></script>

    <!--    <script src="vendor/fullCalendar/time-line.min.js"></script>-->
    <!--    <script src='vendor/fullCalendar/locales-old/es.js'></script>-->
    <script src="<?= RUTA_APP ?>/presentacion/vendor/fullCalendar6/dist/index.global.js"></script>
    <script src="<?= RUTA_APP ?>/presentacion/vendor/fullCalendar6/packages/core/locales/es.global.js"></script>

    <script src="<?= RUTA_APP ?>/presentacion/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Js General -->
    <script src="<?= RUTA_APP ?>/presentacion/js/general.js"></script>
    <!-- Js Principal -->
    <script src="<?= RUTA_APP ?>/presentacion/js/principal.js"></script>

    <script>
        $("#loader").fadeIn("fast");

        $(document).ready(function() {
            link('<?= $seguridad->encode(2006) ?>');

            if ($('#calendario').length > 0) {
                var f = new Date();
                var dia_actual = f.getDate();
                var mes_actual = f.getMonth() + 1;
                if (mes_actual < 10) {
                    mes_actual = '0' + mes_actual;
                }
                if (dia_actual < 10) {
                    dia_actual = '0' + dia_actual;
                }
                var anho_actual = f.getFullYear();
                var anho_anterior = f.getFullYear() - 1;
                var anho_proximo = f.getFullYear() + 1;
                fecha_inicial = anho_actual + '-' + mes_actual + '-' + dia_actual;
                console.log(fecha_inicial);
                var calendarEl = $('#calendario')[0];
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    height: 'auto',
                    dayMaxEvents: false,
                    //initialView: window.mobilecheck() ? "listWeek" : "multiMonthYear",
                    //initialView: "dayGridMonth",
                    initialView: window.mobilecheck() ? "listWeek" : "dayGridMonth",
                    initialDate: fecha_inicial,
                    slotMinTime: '07:00',
                    slotMaxTime: '18:00',
                    validRange: {
                        start: anho_anterior + '-01-01',
                        end: anho_proximo + '-12-31'
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
                            daysOfWeek: [1, 2, 3, 4, 5], //
                            startTime: '08:00', // 8am
                            endTime: '17:00' // 6pm
                        },
                        {
                            daysOfWeek: [6, 7], //
                            startTime: '10:00', // 10am
                            endTime: '16:00' // 4pm
                        },

                    ],
                    //hiddenDays: [6,7],
                    //weekends: false,
                    eventDidMount: function(info) {
                        if (info.event.extendedProps.description) {
                            $(info.el).popover({
                                title: info.event.extendedProps.process + ' - ' + info.event.title,
                                placement: 'top',
                                trigger: 'hover',
                                content: info.event.extendedProps.description,
                                container: 'body',
                                html: true
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
                    resources: <?= json_encode($procesos) ?>,
                    events: <?= json_encode($eventos) ?>,
                    eventClick: function(info) {
                        info.jsEvent.preventDefault(); // don't let the browser navigate
                        if ((info.event.extendedProps.modal_act != '' && info.event.extendedProps.modal_act != null && info.event.extendedProps.modal_act != undefined) && (info.event.extendedProps.id_act != '' && info.event.extendedProps.id_act != null && info.event.extendedProps.id_act != undefined)) {
                            link(info.event.extendedProps.modal_act, info.event.extendedProps.id_act, info.event.extendedProps.anho);
                        }
                    },
                });
                calendar.render();
                calendar.setOption('locale', 'es');
                $('.fc-toolbar.fc-header-toolbar').addClass('row col-lg-12');
            }
        })
    </script>
</body>

</html>
<?php
$html = ob_get_clean();
echo minify_html($html); //
?>