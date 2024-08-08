<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/dt-2.1.3/b-3.1.1/datatables.min.css" rel="stylesheet">
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Flatpcikr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <!-- Tom Select CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tom-select/2.3.1/css/tom-select.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-light" data-bs-theme="light">
    <header class="header-main">
        <?php
        // NavMain
        include_once("layouts/navmain.php");
        ?>
    </header>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <div class="row mt-2">
                            <div class="col">
                                <p class="text-center fw-bolder">Total Gestiones por tipo gestion, segun fechas desde/hasta</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="input-group shadow-sm">
                                    <input type="text" class="form-control" placeholder="RUN" aria-label="Username" aria-describedby="basic-addon1">
                                    <span class="input-group-text"><i class=" bi bi-search"></i></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group shadow-sm">
                                    <select class="my-select">
                                        <option value="" disabled selected>Tipo Ingreso</option>
                                        <option value="1">Opción 1</option>
                                        <option value="2">Opción 2</option>
                                        <option value="3">Opción 3</option>
                                    </select>
                                    <select class="my-select ">
                                        <option value="" disabled selected>U. Academica</option>
                                        <option value="1">Opción 1</option>
                                        <option value="2">Opción 2</option>
                                        <option value="3">Opción 3</option>
                                    </select>
                                    <select class="my-select">
                                        <option value="" disabled selected>Sede/Centro</option>
                                        <option value="1">Antofagasta</option>
                                        <option value="2">Arica</option>
                                        <option value="3">Iquique</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                    <input type="text" id="datetimepicker1" class="form-control fechaInicial" placeholder="Fecha Inicial">
                                    <input type="text" id="datetimepicker2" class="form-control fechaTermino" placeholder="Fecha Término">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col d-flex justify-content-end ">
                                <button class="btn btn-light border-secondary-subtle shadow-sm me-2" id="liveAlertBtn">Limpiar Datos<i class="fas fa-sync-alt mx-2"></i></button>
                                <button class="btn btn-light border-secondary-subtle shadow-sm">Ver Gestiones<i class="bi bi-eye mx-2"></i></button>
                            </div>
                        </div>
                        <div class="row table-responsive mt-3">
                            <div class="col">
                                <table class="table table-hover table-striped text-wrap" style="width: 100%;" id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-start">Sede</th>
                                            <th class="text-start">Carrera</th>
                                            <th class="text-start">Email</th>
                                            <th class="text-start">Cita Oficina</th>
                                            <th class="text-start">Llamada</th>
                                            <th class="text-start">Psicólogo</th>
                                            <th class="text-start">Aranceles</th>
                                            <th class="text-start">Acta Cierre</th>
                                            <th class="text-start">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-start">Sede 1</td>
                                            <td class="text-start">Carrera 1</td>
                                            <td class="text-start">48</td>
                                            <td class="text-start">18</td>
                                            <td class="text-start">0</td>
                                            <td class="text-start">0</td>
                                            <td class="text-start">0</td>
                                            <td class="text-start">7</td>
                                            <td class="text-start">73</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">Sede 2</td>
                                            <td class="text-start">Carrera 2</td>
                                            <td class="text-start">48</td>
                                            <td class="text-start">18</td>
                                            <td class="text-start">0</td>
                                            <td class="text-start">0</td>
                                            <td class="text-start">0</td>
                                            <td class="text-start">7</td>
                                            <td class="text-start">73</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">Sede 2</td>
                                            <td class="text-start">Carrera 2</td>
                                            <td class="text-start">48</td>
                                            <td class="text-start">18</td>
                                            <td class="text-start">0</td>
                                            <td class="text-start">0</td>
                                            <td class="text-start">0</td>
                                            <td class="text-start">7</td>
                                            <td class="text-start">73</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    // Footer Main
    // Offcanvas Menu
    include_once("layouts/offcanvas.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- Libreria datatable -->
    <script src="https://cdn.datatables.net/v/bs5/dt-2.1.3/b-3.1.1/datatables.min.js"></script>
    <!-- Libreria flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js" integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Modo Oscuro -->
    <script src="assets/js/darkMode.js"></script>
    <!-- Tom Select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tom-select/2.3.1/js/tom-select.complete.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.my-select').forEach(function(selectElement) {
                new TomSelect(selectElement, {
                    // Opciones de configuración
                });
            });
        });
    </script>
    <script>
        $(".fechaInicial").flatpickr({
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                },
                months: {
                    shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                    longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                },
            },
        });
        $(".fechaTermino").flatpickr({
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                },
                months: {
                    shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                    longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                },
            },
        });
    </script>
    <script>
        new DataTable('#example', {
            layout: {
                bottomEnd: {
                    paging: {
                        firstLast: false
                    }
                }
            },
            searching: true,
            ordering: true,
            language: {
                "decimal": "",
                "emptyTable": "No hay informacion para mostrar",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ items",
                "infoEmpty": "Mostrando 0 a 0 de 0 items",
                "infoFiltered": "(Filtrado de _MAX_ items totales)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ items",
                "loadingRecords": "Cargando...",
                "processing": "",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros coincidentes",
                "paginate": {
                    first: "Primero",
                    previous: "Anterior",
                    next: "Siguiente",
                    last: "Ultima"
                },
                "aria": {
                    "orderable": "Ordenar esta columna",
                    "orderableReverse": "Revertir el orden de esta columna"
                }

            },
        });
    </script>
</body>

</html>