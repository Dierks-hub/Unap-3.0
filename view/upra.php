<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.css">
</head>

<body class="bg-light d-flex flex-column min-min-vh-100" data-bs-theme="light">
    <?php
    include_once("layouts/offcanvas.html");
    ?>
    <section>
        <header>
            <nav class="navbar shadow-sm bg-body-secondary" id="navbar">
                <div class="row w-100 align-items-center">
                    <div class="col d-flex align-items-center justify-content-start px-4">
                        <i class="bi bi-layout-sidebar-inset px-3 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></i>
                    </div>
                    <div class="col d-flex align-items-center justify-content-end">
                        <div class="d-flex align-items-center">
                            <i type="button" class="bi bi-bell px-3"></i>
                            <i type="button" onclick="cambiarTema()" id="dl-icon" class="bi bi-moon px-3"></i>
                        </div>
                        <div class="vr mx-2"></div>
                        <img src="assets/images/foto_perfil.png" alt="Ejemplo" style="width: 50px;">
                        <div class="px-3">
                            <p class="mb-0">Jaime David Guszman Rojas</p>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 me-1 cargoseleccionado">Administrador</p>
                                <div class="dropdown">
                                    <i type="button" class="bi bi-pencil dropstart fs-6" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu cargoselector">
                                        <li><a class="dropdown-item" href="#">Cargo 1</a></li>
                                        <li><a class="dropdown-item" href="#">Cargo 2</a></li>
                                        <li><a class="dropdown-item" href="#">Cargo 3</a></li>
                                        <li><a class="dropdown-item" href="#">Cargo 4</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </section>
    <div class="container mt-3" id="container-main">
        <div class="container mt-5">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="card shadow-sm w-75">
                        <div class="card-body m-2">
                            <form id ="formBusqueda">
                                <div class="row mb-3">
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <label>Folio</label>
                                        <input type="text" class="form-control"id ="" name="" > 
                                    </div>
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <label for="text">Rut Estudiante</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"id ="" name="">
                                            <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Rut Encar.UPRA</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"id ="" name="">
                                            <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                                        </div> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-md-0">
                                        <label>Tipo de requerimiento</label>
                                        <select type="text" class="form-select mb-3" id ="" name="">
                                            <option selected disabled>Seleccione...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-md-0 mb-3">
                                        <label>Fecha de requerimiento</label>
                                        <div class="input-group w-100">
                                            <input class="form-control" type="date"id ="" name="">
                                            <span class="input-group-text">/</span>
                                            <input class="form-control" type="date"id ="" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <label>Rut Enc.Carrera</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"id ="" name="">
                                            <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                                        </div> 
                                    </div>
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <label for="name">Carrera</label>
                                        <select type="text" class="form-select" id ="" name="">
                                            <option selected disabled>Seleccione...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Cohorte</label>
                                        <select type="text" class="form-select mb-3 w-50" id ="" name="">
                                            <option selected disabled>Todos</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary" type="submit">Realizar búsqueda</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4 mt-3 d-flex justify-content-center">
            <div class="col w-100">
                <div class="card table-responsive">
                    <div class="card-body">
                        <table id="table_id" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Folio</th>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Cohorte</th>
                                    <th>Carrera</th>
                                    <th>Enc.Carrera</th>
                                    <th>Detalle</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <footer class="bg-body-secondary mt-auto" id="footer" style=" margin-top: 500px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 d-flex align-items-center">
                    <div class="logo">Logo</div>
                </div>
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4 d-flex flex-column align-items-end">
                    <h5 class="mb-3 px-5">Videos Tutoriales</h5>
                    <div class="row">
                        <div class="col-lg-6"><a href="#">1. Introducción SAT</a></div>
                        <div class="col-lg-6"><a href="#">2. Seguimiento de carreras</a></div>
                        <div class="col-lg-6"><a href="#">3. Bitácora SAT estudiantes</a></div>
                        <div class="col-lg-6"><a href="#">4. Bitácora SAT docentes</a></div>
                        <div class="col-lg-6"><a href="#">5. Informes y filtros</a></div>
                </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="assets/js/darkMode.js"></script>
    <script>
        $('#ingresar').click(function() {
            $.ajax({
                url: "resp.php",
                type: "POST",
                dataType: "json",
                data: {
                    cases: 'cardexample',
                    var1: $("#campo1").val(),
                    var2: $("#campo2").val(),
                    var3: $("#campo3").val()
                },
                success: function(resultado, status) {
                    $("#resultado1").html(resultado.resp1);
                    $("#resultado2").html(resultado.resp2);
                    $("#resultado3").html(resultado.resp3);
                },

                error: function(objeto, texterror) {
                    alert("ERROR: Paso lo siguiente-> " + texterror);
                }
            })
        });
    </script>
    <script>
        $(".cargoselector a").click(function() {
            $.ajax({
                url: "resp.php",
                type: "POST",
                dataType: "json",
                data: {
                    cases: 'dropdowncargo',
                    var1: $(this).text()
                },
                success: function(resultado, status) {
                    $(".cargoseleccionado").html(resultado.resp);
                },

                error: function(objeto, texterror) {
                    alert("ERROR: Paso lo siguiente-> " + texterror);
                }
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                searching: false,  // Deshabilitar el campo de búsqueda
                pageLength: 4,     // Mostrar 2 filas por página
                lengthMenu: [2, 3, 5, 10],  // Opciones de paginación disponibles
                language: {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "oPaginate": {
                        "sFirst":    "",
                        "sLast":     "",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                }
            });
        });
    </script>
</body>
</html>

