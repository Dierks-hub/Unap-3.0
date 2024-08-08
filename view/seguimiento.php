<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Datatables -->
    <link href="https://cdn.datatables.net/v/bs5/dt-2.1.3/b-3.1.1/datatables.min.css" rel="stylesheet">


    <!-- Scripts -->

    <!-- Bootstrap -->
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- Darkmode -->
    <script defer src="assets/js/darkMode.js"></script>
    <!-- Jquery -->
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Datatables -->
    <script defer src="https://cdn.datatables.net/v/bs5/dt-2.1.3/b-3.1.1/datatables.min.js"></script>
</head>

<body class="bg-light d-flex flex-column min-vh-100" data-bs-theme="light">
    <?php
    include_once("layouts/offcanvas.php");
    ?>
    <header>
        <nav class="navbar shadow-sm bg-body-secondary" id="navbar">
            <div class="row w-100 align-items-center">
                <div class="col d-flex align-items-center justify-content-start px-4">
                    <i class="bi bi-layout-sidebar-inset px-3 me-2 fs-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></i>
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
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section class="container-fluid mt-3" id="container-main">
        <div class="row justify-content-center">
            <div class="col-7">
                <div class="card shadow-sm mb-2">
                    <div class="card-body p-2">
                        <form class="row g-3 align-items-center justify-content-center">
                            <div class="col-auto">
                                <div class="form-floating">
                                    <select class="form-select" id="seguimientoAño" aria-label="Floating label select example">
                                        <option value="1">2024</option>
                                        <option value="2">2023</option>
                                        <option value="3">2022</option>
                                    </select>
                                    <label for="seguimientoAño">Año</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-floating">
                                    <select class="form-select" id="seguimientoSemestre" aria-label="Floating label select example">
                                        <option value="1">Primero</option>
                                        <option value="2">Segundo</option>
                                    </select>
                                    <label for="seguimientoSemestre">Semestre</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-floating">
                                    <select class="form-select" id="seguimientoIngreso" aria-label="Floating label select example">
                                        <option value="1">Tecnicas</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <label for="seguimientoIngreso">Ingreso</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-floating">
                                    <select class="form-select" id="seguimientoSede" aria-label="Floating label select example">
                                        <option value="1">Iquique</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <label for="seguimientoSede">Sede o Centro</label>
                                </div>
                            </div>
                            <div class="col-auto col-md-5">
                                <div class="form-floating">
                                    <select class="form-select" id="seguimientoUnidad" aria-label="Floating label select example">
                                        <option value="1">Todas</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <label for="seguimientoUnidad">Unidad Academica</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4 mt-1">
            <div class="col-12">
                <div class="card shadow-sm h-65">
                    <h5 class="card-header">
                    </h5>
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Carrera</th>
                                    <th>Sede/Centro</th>
                                    <th>Porcentaje de ingreso ponderacion de notas</th>
                                    <th>Posible reprobacion de actividad curricular</th>
                                    <th>Porcentaje de estudiantes con posible perdida de carrera</th>
                                    <th>Pruebas sin rendir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> System Architect</td>
                                    <td>Edinburgh</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/8)</td>
                                    <td><i class="bi bi-exclamation-circle-fill text-danger"></i> <i type="button" class="bi bi-search text-warning"></i> 23,0(47/204)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 0,0(0)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Accountant</td>
                                    <td>Tokyo</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/10)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 6,7(13/193)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 0,0(0)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/12)</td>
                                    <td><i class="bi bi-exclamation-circle-fill text-danger"></i> <i type="button" class="bi bi-search text-warning"></i> 12,9(80/618)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 2,4(4)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/7)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i>6,3(18/287)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 0,0(0)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> System Architect</td>
                                    <td>Edinburgh</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/8)</td>
                                    <td><i class="bi bi-exclamation-circle-fill text-danger"></i> <i type="button" class="bi bi-search text-warning"></i> 23,0(47/204)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 0,0(0)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Accountant</td>
                                    <td>Tokyo</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/10)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 6,7(13/193)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 0,0(0)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/12)</td>
                                    <td><i class="bi bi-exclamation-circle-fill text-danger"></i> <i type="button" class="bi bi-search text-warning"></i> 12,9(80/618)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 2,4(4)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/7)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i>6,3(18/287)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 0,0(0)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> System Architect</td>
                                    <td>Edinburgh</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/8)</td>
                                    <td><i class="bi bi-exclamation-circle-fill text-danger"></i> <i type="button" class="bi bi-search text-warning"></i> 23,0(47/204)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 0,0(0)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Accountant</td>
                                    <td>Tokyo</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/10)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 6,7(13/193)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 0,0(0)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/12)</td>
                                    <td><i class="bi bi-exclamation-circle-fill text-danger"></i> <i type="button" class="bi bi-search text-warning"></i> 12,9(80/618)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 2,4(4)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/7)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i>6,3(18/287)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 0,0(0)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> System Architect</td>
                                    <td>Edinburgh</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/8)</td>
                                    <td><i class="bi bi-exclamation-circle-fill text-danger"></i> <i type="button" class="bi bi-search text-warning"></i> 23,0(47/204)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 0,0(0)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Accountant</td>
                                    <td>Tokyo</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/10)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 6,7(13/193)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 0,0(0)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/12)</td>
                                    <td><i class="bi bi-exclamation-circle-fill text-danger"></i> <i type="button" class="bi bi-search text-warning"></i> 12,9(80/618)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 2,4(4)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/7)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i>6,3(18/287)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 0,0(0)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>17</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> System Architect</td>
                                    <td>Edinburgh</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/8)</td>
                                    <td><i class="bi bi-exclamation-circle-fill text-danger"></i> <i type="button" class="bi bi-search text-warning"></i> 23,0(47/204)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 0,0(0)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>18</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Accountant</td>
                                    <td>Tokyo</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/10)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 6,7(13/193)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 0,0(0)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>19</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/12)</td>
                                    <td><i class="bi bi-exclamation-circle-fill text-danger"></i> <i type="button" class="bi bi-search text-warning"></i> 12,9(80/618)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 2,4(4)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                                <tr>
                                    <td>20</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> 100(0/7)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i>6,3(18/287)</td>
                                    <td><i class="bi bi-check-circle-fill text-success"></i> <i type="button" class="bi bi-search text-warning"></i> 0,0(0)</td>
                                    <td><i type="button" class="bi bi-search text-warning"></i> Ver</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nº</th>
                                    <th>Carrera</th>
                                    <th>Sede/Centro</th>
                                    <th>Porcentaje de ingreso ponderacion de notas</th>
                                    <th>Posible reprobacion de actividad curricular</th>
                                    <th>Porcentaje de estudiantes con posible perdida de carrera</th>
                                    <th>Pruebas sin rendir</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-body-secondary mt-auto" id="footer">
        <div class="container-fluid bg-unap-dark text-center">
            <div class="row">
                <div class="col-12">
                    <h5 class="my-3 px-5 text-light">Videos Tutoriales</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr class="hr" />
                    <img class="mt-1 mb-4" src="logo_unap_footer_2021.png">
                </div>
            </div>
        </div>
    </footer>

    <script>
        new DataTable('#example', {
            searching: true,
            ordering: false,
            language: {
                "decimal": "",
                "emptyTable": "No hay informacion para mostrar",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ carreras",
                "infoEmpty": "Mostrando 0 a 0 de 0 carreras",
                "infoFiltered": "(Filtrado de _MAX_ carreras totales)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ carreras",
                "loadingRecords": "Cargando...",
                "processing": "",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros coincidentes",
                "paginate": {
                    "first": "Primera",
                    "last": "Ultima",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "orderable": "Ordenar esta columna",
                    "orderableReverse": "Revertir el orden de esta columna"
                }
            },
            layout: {
                topStart: {
                    buttons: [{
                        text: 'Boton de prueba',
                        action: function(e, dt, node, config) {
                            alert('Boton activated');
                        }
                    }]
                }
            }
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

</body>

</html>