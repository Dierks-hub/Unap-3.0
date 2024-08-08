<nav class="navbar mb-2 shadow-sm stylenavbar" id="navbar">
    <div class="row w-100 align-items-center">
        <div class="col-md-5 d-flex align-items-center justify-content-start px-4">
            <i class="bi bi-layout-sidebar-inset px-3 me-2 text-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></i>
        </div>
        <div class="col-md-7 d-flex align-items-center justify-content-end">
            <div class="d-flex align-items-center">
                <i type="button" class="bi bi-bell px-3 text-light"></i>
                <i type="button" onclick="cambiarTema()" id="dl-icon" class="bi bi-moon px-3 text-light"></i>
            </div>
            <div class="vr mx-2"></div>
            <img src="assets/images/foto_perfil.png" alt="Ejemplo" style="width: 50px;">
            <div class="px-3">
                <p class="mb-0 text-light">Jaime David Guszman Rojas</p>
                <div class="d-flex align-items-center">
                    <p class="mb-0 me-1 cargoseleccionado text-light">Administrador</p>
                    <div class="dropdown">
                        <i type="button" class="bi bi-pencil dropstart fs-6 text-black" data-bs-toggle="dropdown" aria-expanded="false"></i>
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