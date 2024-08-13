<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de roles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow-lg" style="width: 38rem;">
                    <div class="card-header bg-unap-green color-white">Gestión de roles</div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                            data-bs-target="#exampleModal" id="addRoleBtn">Agregar rol<i
                                class="bi bi-file-earmark-plus m-2"></i> </button>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1">
                            Editar rol<i class="bi bi-pen m-2"></i>
                        </button>
                        <hr>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Nombre</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="rolesTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card w-100 h-auto" style="display: none;" id="gestion-vistas-card">
                    <div
                        class="card-header d-flex justify-content-between align-items-center bg-unap-green color-white">
                        <span>Gestion de permisos de vistas</span>
                        <button type="button" class="btn-close" aria-label="Close" id="close-card"></button>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                Vista 1
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                Vista 2
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                Vista 3
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                Vista 4
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                Vista 5
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                Vista 6
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                Vista 7
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                Vista 8
                            </li>
                        </ul>
                        <button class="btn btn-primary mt-3" id="save-and-close-card">Guardar</button>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-unap-green color-white">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="roleForm">
                                <input type="hidden" id="roleId"> <!-- Hidden field for storing role ID -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="name" placeholder="Ingrese el nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="code" class="form-label">Código</label>
                                    <select class="form-select" id="code">
                                        <option value="" disabled selected>Seleccione un código</option>
                                        <!-- Opciones generadas dinámicamente -->
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="saveChanges">Guardar cambios</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal de Confirmación -->
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-unap-green color-white">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmación de Eliminación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Está seguro de que desea eliminar este rol?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" id="confirmDelete">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-unap-green color-white">
                            <h5 class="modal-title" id="exampleModalLabel">Editar rol</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="code" class="form-label">Código</label>
                                    <select class="form-select" id>
                                        <option value="" disabled selected>Seleccione un código</option>
                                        <option value="0011">0011</option>
                                        <option value="0012">0012</option>
                                        <option value="0013">0013</option>
                                        <option value="0014">0014</option>
                                        <option value="0015">0015</option>
                                        <option value="0016">0016</option>
                                        <option value="0017">0017</option>
                                        <option value="0018">0018</option>
                                        <option value="0019">0019</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="code" class="form-label">Permisos de rol</label>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value=""
                                                aria-label="...">
                                            Vista 1
                                        </li>
                                        <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value=""
                                                aria-label="...">
                                            Vista 2
                                        </li>
                                        <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value=""
                                                aria-label="...">
                                            Vista 3
                                        </li>
                                        <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value=""
                                                aria-label="...">
                                            Vista 4
                                        </li>
                                        <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value=""
                                                aria-label="...">
                                            Vista 5
                                        </li>
                                        <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value=""
                                                aria-label="...">
                                            Vista 6
                                        </li>
                                        <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value=""
                                                aria-label="...">
                                            Vista 7
                                        </li>
                                        <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value=""
                                                aria-label="...">
                                            Vista 8
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<script>
    $(document).ready(function () {
        let roles = [];
        let deleteIndex = null;

        // Mapeo de códigos de rol a nombres
        const roleNames = {
            '0011': 'Director',
            '0012': 'Consultor',
            '0013': 'Administrador',
            '0014': 'Asistente',
            '0015': 'Secretaria',
            '0016': 'Bibliotecario',
            '0017': 'Coordinadora',
            '0018': 'Técnico',
            '0019': 'Decano'
        };

        const $codeSelect = $('#code');
        for (let i = 1; i <= 9; i++) {
            const code = `001${i.toString().padStart(1, '0')}`;
            $codeSelect.append(new Option(code));
        }
        // Renderizar la tabla de roles
        function renderTable() {
            const $tableBody = $('#rolesTableBody');
            $tableBody.empty();
            roles.forEach((role, index) => {
                const roleName = roleNames[role.code] || 'Desconocido'; // Obtiene el nombre del rol
                $tableBody.append(`
                <tr>
                    <td colspan="2">${role.name}</td>
                    <td>${roleName}</td> <!-- Mostrar nombre del rol en lugar del código -->
                    <td>
                        <button class="btn btn-danger btn-sm btn-delete" data-index="${index}"><i class="bi bi-trash"></i></button>
                        <button class="btn btn-secondary btn-sm btn-permissions" data-index="${index}">Permisos</button>
                    </td>
                </tr>
            `);
            });
        }

        // Confirmar eliminación
        $(document).on('click', '.btn-delete', function () {
            deleteIndex = $(this).data('index');
            $('#confirmDeleteModal').modal('show');
        });

        // Manejar la confirmación de eliminación
        $('#confirmDelete').on('click', function () {
            if (deleteIndex !== null) {
                roles.splice(deleteIndex, 1);
                renderTable();
                $('#confirmDeleteModal').modal('hide');
            }
        });

        // Manejar el botón "Guardar cambios" en el modal
        $('#saveChanges').on('click', function () {
            const name = $('#name').val();
            const code = $('#code').val();
            const roleId = $('#roleId').val();

            if (name && code) {
                if (roleId) {
                    // Editar rol existente
                    roles[roleId] = { name, code };
                } else {
                    // Agregar nuevo rol
                    roles.push({ name, code });
                }
                renderTable();

                $('#exampleModal').modal('hide');
                $('#roleForm')[0].reset();

                // Limpiar el backdrop si sigue presente
                setTimeout(() => {
                    $('.modal-backdrop').remove(); // Elimina el backdrop manualmente
                }, 300); // Espera que el modal se haya cerrado completamente
            } else {
                alert('Por favor, complete todos los campos.');
            }
        });

        // Abrir el modal para agregar un nuevo rol
        $('#addRoleBtn').on('click', function () {
            $('#roleForm')[0].reset();
            $('#roleId').val('');
            $('#exampleModalLabel').text('Agregar Rol');
        });

        // Mostrar tarjeta de permisos
        $(document).on('click', '.btn-permissions', function () {
            const index = $(this).data('index');
            const role = roles[index];
            $('#gestion-vistas-card .card-title').text(`Gestión de permisos de vistas para ${role.name}`);
            $('#gestion-vistas-card .card-text').text(`Aquí puedes gestionar los permisos de vistas para ${role.name}.`);
            $('#gestion-vistas-card').fadeIn();
        });

        // Cerrar tarjeta de permisos
        $('#close-card, #save-and-close-card').on('click', function () {
            $('#gestion-vistas-card').fadeOut();
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        });
    });
</script>



</html>