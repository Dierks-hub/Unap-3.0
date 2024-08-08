<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/dt-2.1.3/b-3.1.1/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-light" data-bs-theme="light">
    <section>
        <header>
            <?php
            include_once("layouts/navmain.php");
            ?>
        </header>
    </section>
    <div class="container mt-3" id="container-main">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card shadow-sm mb-2">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4 mb-2 mb-md-0">
                                <div class="btn-group w-100" role="group" aria-label="Basic example">
                                    <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                                    <label class="btn btn-outline-primary" for="success-outlined"><i class="fas fa-user-graduate"></i>
                                    </label>
                                    <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="danger-outlined"><i class="fas fa-chalkboard-teacher"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8 mb-2 mb-md-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="run" placeholder="RUN" aria-label="Username" aria-describedby="basic-addon1">
                                    <button class="btn btn-primary" id="buscar"><i class="bi bi-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2 mt-1 d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm" id="student-info">
                    <h5 class=" card-header">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-md-end">
                                    <span class="badge text-bg-primary">Sin Gratuidad Semestre 2 - 2017</span>
                                </div>
                            </div>
                        </div>
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <!-- <img src="image-url" alt="Profile Picture" class="img-fluid rounded-circle" width="50" height="50"> -->
                            </div>
                            <div class="col-md-7 d-flex justify-content-center">
                                <ul class="list-unstyled">
                                    <li id="nombre"><strong>Nombre:</strong></li>
                                    <li id="run1"><strong>RUT:</strong></li>
                                    <li id="email"><strong>Email:</strong><a href=""></a></li>
                                    <li id="telefono-movil"><strong>Celular:</strong></li>
                                    <li id="telefono-fijo"><strong>Telefono:</strong></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div id="carouselExample" class="carousel carousel-dark slide" data-bs-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-2 mb-2">
                                <div class="card shadow-sm small-card hover-effect">
                                    <div class="card-body d-flex align-items-center stylecard">
                                        <div class="me-3">
                                            <i class="bi bi-book" style="font-size: 1.5rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title mb-1">Datos Académicos</h6>
                                            <p class="mb-0 text-muted" style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                        </div>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="card shadow-sm small-card hover-effect">
                                    <div class="card-body d-flex align-items-center stylecard">
                                        <div class="me-3">
                                            <i class="bi-pencil" style="font-size: 1.5rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title mb-1">Matriculas</h6>
                                            <p class="mb-0 text-muted" style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                        </div>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="card shadow-sm small-card hover-effect">
                                    <div class="card-body d-flex align-items-center stylecard">
                                        <div class="me-3">

                                            <i class="bi-heart" style="font-size: 1.5rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title mb-1">Bienestar</h6>
                                            <p class="mb-0 text-muted" style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                        </div>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="card shadow-sm small-card hover-effect">
                                    <div class="card-body d-flex align-items-center stylecard">
                                        <div class="me-3">
                                            <i class="bi bi-piggy-bank" style="font-size: 1.5rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title mb-1">Financieros</h6>
                                            <p class="mb-0 text-muted" style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                        </div>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-2 mb-2">
                                <div class="card shadow-sm small-card hover-effect">
                                    <div class="card-body d-flex align-items-center stylecard">
                                        <div class="me-3">
                                            <i class="bi-person-check" style="font-size: 1.5rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title mb-1">Admisión</h6>
                                            <p class="mb-0 text-muted" style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                        </div>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="card shadow-sm small-card hover-effect">
                                    <div class="card-body d-flex align-items-center stylecard">
                                        <div class="me-3">
                                            <i class="bi-gear" style="font-size: 1.5rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title mb-1">Gestiones</h6>
                                            <p class="mb-0 text-muted" style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                        </div>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="card shadow-sm small-card hover-effect">
                                    <div class="card-body d-flex align-items-center stylecard">
                                        <div class="me-3">
                                            <i class="bi-calendar" style="font-size: 1.5rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title mb-1">UPRA</h6>
                                            <p class="mb-0 text-muted" style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                        </div>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="card shadow-sm small-card hover-effect">
                                    <div class="card-body d-flex align-items-center stylecard">
                                        <div class="me-3">
                                            <i class="bi bi-book" style="font-size: 1.5rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title mb-1">Pizarra Academica</h6>
                                            <p class="mb-0 text-muted" style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                        </div>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-2 mb-2">
                                <div class="card shadow-sm small-card hover-effect">
                                    <div class="card-body d-flex align-items-center stylecard">
                                        <div class="me-3">
                                            <i class="bi-person-lines-fill" style="font-size: 1.5rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title mb-1">PACE</h6>
                                            <p class="mb-0 text-muted" style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                        </div>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev p-0" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row mt-2 d-flex justify-content-center">
            <div class="col-md-11">
                <div class="card" id="datos-academicos">
                    <div class="card-header">
                        <div class="row d-flex justify-items-between">
                            <div class="col-md-8">
                                <p>2069 - Tecnico De nivel Superior En Computacion E Informatica - Plan 2008</p>
                            </div>
                            <div class="col-md-4">
                                <span class="badge text-bg-success">Titulado</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-3">
                                <select name="" id="" class="form-select"></select>

                            </div>
                            <div class="col-md-3">
                                <div class="btn-group">
                                    <button class="btn btn-primary shadow-sm">a</button>
                                    <button class="btn btn-primary shadow-sm">a</button>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <button class="btn btn-primary shadow-sm">Ver Cartola</button>
                                <button class="btn btn-primary shadow-sm">Ver Carrera</button>
                                <button class="btn btn-primary shadow-sm">Ver Horario</button>
                            </div>
                        </div>
                        <div class="row mt-2 table-responsive">
                            <div class="col">
                                <table class="table table-hover table-striped" id="datos">
                                    <thead>
                                        <tr>
                                            <th>Nro</th>
                                            <th>Código</th>
                                            <th>Actividad Curricular</th>
                                            <th>Oportunidad</th>
                                            <th>(%) Asist</th>
                                            <th>Prom. Parcial</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>TCI55-A</td>
                                            <td>ADMINISTRACION DE REDES DE COMPUTADORES</td>
                                            <td>1</td>
                                            <td>0 <i class="bi bi-search" style="font-size: 15px;"></i>
                                            </td>
                                            <td>6.1 <i class="bi bi-search" style="font-size: 15px;"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>TCI58-A</td>
                                            <td>PROYECTO TIC</td>
                                            <td>1</td>
                                            <td>0 <i class="bi bi-search" style="font-size: 15px;"></i>
                                            </td>
                                            <td>6.2 <i class="bi bi-search" style="font-size: 15px;"></i>
                                            </td>
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
    // Footer
    // Offcanvas main
    include_once("layouts/offcanvas.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- Libreria datatable -->
    <script src="https://cdn.datatables.net/v/bs5/dt-2.1.3/b-3.1.1/datatables.min.js"></script>

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
        new DataTable('#datos', {
            layout: {
                bottomEnd: {
                    paging: {
                        firstLast: false
                    }
                }
            },
            searching: true,
            ordering: true,
            'language': {
                'url': 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
            },
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
            $("#student-info").hide();
            $("#carouselExample").hide();
            $("#datos-academicos").hide();

            cargarinfo()
        });

        function validaInputRut(e) {
            var key = window.Event ? e.which : e.keyCode;
            return ((key >= 48 && key <= 57) || (key == 8) || (key == 13) || (key == 45) || (key == 46) || (key == 107))
        }

        function cargarinfo() {
            $("#buscar").on("click", function() {
                $.ajax({
                    url: "llenar_datos.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        var1: $("#run").val(),
                    },
                    success: function(response) {
                        console.log(response);
                        $("#student-info").show("slow");
                        $("#carouselExample").show("slow");

                        $("#nombre").html("<strong>Nombre:</strong> " + response.datos.nombre);
                        $("#run1").html("<strong>RUT:</strong> " + response.datos.run);
                        $("#email").html("<strong>Email:</strong> " + response.datos.email);
                        $("#telefono-movil").html("<strong>Telefono Movil:</strong> " + response.datos.celular);
                        $("#telefono-fijo").html("<strong>Telefono Fijo:</strong> " + response.datos.telefono);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error en la solicitud AJAX:", status, error);
                    }
                })

            })
        };
        cargarinfo();



        function valida_rut(elemento) {
            var texto = elemento.value;
            var tmpstr = "";
            for (i = 0; i < texto.length; i++)
                if (texto.charAt(i) != ' ' && texto.charAt(i) != '.' &&
                    texto.charAt(i) != '-')
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
                if (texto.charAt(i) != "0" && texto.charAt(i) != "1" &&
                    texto.charAt(i) != "2" && texto.charAt(i) != "3" &&
                    texto.charAt(i) != "4" && texto.charAt(i) != "5" &&
                    texto.charAt(i) != "6" && texto.charAt(i) != "7" &&
                    texto.charAt(i) != "8" && texto.charAt(i) != "9" &&
                    texto.charAt(i) != "k" && texto.charAt(i) != "K") {
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
    </script>

</body>

</html>