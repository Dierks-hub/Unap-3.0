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

    <!-- Tom Select CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tom-select/2.3.1/css/tom-select.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/css/style.css">


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
                    <i class="bi bi-layout-sidebar-inset px-3 me-2 fs-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></i>
                </div>
                <div class="col d-flex align-items-center justify-content-end">
                    <div class="d-flex align-items-center">
                        <i type="button" class="bi bi-bell px-3 fs-4"></i>
                        <i type="button" onclick="cambiarTema()" id="dl-icon" class="bi bi-moon px-3 fs-4"></i>
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
            <div class="col-xl-11">
                <div class="row d-flex mb-3 flex-md-row-reverse mt-1">
                    <div class="col col-md-2 mt-2">
                        <div class="card shadow-sm h-65">
                            <h5 class="card-header">
                            </h5>
                            <div class="card-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action">Aprobacion acta curricular</a>
                                    <a href="#" class="list-group-item list-group-item-action">Pruebas Iniciales</a>
                                    <a href="#" class="list-group-item list-group-item-action">Pace</a>
                                    <a href="#" class="list-group-item list-group-item-action">Gratuidad</a>
                                    <a href="#" class="list-group-item list-group-item-action">Propedeutico</a>
                                    <a href="#" class="list-group-item list-group-item-action">Asistencia a clases</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col col-md-10 mt-2">
                        <div class="card body p-2 mb-3">
                            <form class="row d-flex g-3">
                                <div class="col-md-1">
                                    <div class="form-floating">
                                        <select class="form-select" id="seguimientoAño" aria-label="Floating label select example">
                                            <option value="1">2024</option>
                                            <option value="2">2023</option>
                                            <option value="3">2022</option>
                                        </select>
                                        <label for="seguimientoAño">Año</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="seguimientoSemestre" aria-label="Floating label select example">
                                            <option value="1">Primero</option>
                                            <option value="2">Segundo</option>
                                        </select>
                                        <label for="seguimientoSemestre">Semestre</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="seguimientoIngreso" aria-label="Floating label select example">
                                            <option value="1">Tecnicas</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <label for="seguimientoIngreso">Ingreso</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <select class="form-select" id="seguimientoSede" aria-label="Floating label select example">
                                            <option value="1">Iquique</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <label for="seguimientoSede">Sede o Centro</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="seguimientoUnidad" aria-label="Floating label select example">
                                            <option value="1">Todas</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <label for="seguimientoUnidad">Unidad Academica</label>
                                    </div>
                                </div>
                                <div class="col align-self-center">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="card shadow-sm h-65">
                            <h6 class="card-header">
                            </h6>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <!-- Añadir Tabla Aqui -->
                                    </div>
                                </div>
                            </div>
                        </div>
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