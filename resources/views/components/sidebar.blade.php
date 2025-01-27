
<header id="sidebarMenu">
    <nav class="collapse d-lg-block sidebar collapse">
        <a class="navbar-brand text-center d-flex justify-content-center align-center w-100" href="#">
            <img src={{ asset('assets/images/diplomada.png') }} width="130px" alt="image" class="img-fluid " />
        </a>
        <div class="position-sticky d-flex flex-column justify-content-between" style="height: 100vh">
            <x-sidebar-menu />

            <div class="list-group list-group-flush mx-3 mt-4" style="margin-bottom: 140px">
                {{-- <a href="/"
                    class="list-group-item list-group-item-action py-2 px-2 ripple border-0 d-flex align-items-center text-white"
                    style="background-color: #203767">
                    <span style="font-size: 17px" class="d-flex align-items-center justify-content-between w-100">
                        Volver a la Web
                        <i class="fa-solid fa-globe"></i>
                    </span>
                </a> --}}
                
                {{-- <a href={{ url('admin/cerrar_sesion') }} --}}
                <a href="admin/cerrar_sesion" class="list-group-item list-group-item-action py-2 px-2 ripple border-0 d-flex align-items-center text-white" style="background-color: #203767">
                    <span style="font-size: 17px" class="d-flex align-items-center justify-content-between w-100">
                        Salir
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </span>
                </a>
            </div>
        </div>
    </nav>
</header>

<div style="background-color: #203767" class="offcanvas offcanvas-start text-white" tabindex="-1" id="offcanvasSidebar"
    aria-labelledby="offcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasLabel">Offcanvas</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <a class="navbar-brand text-center d-flex justify-content-center align-center w-100" href="#">
            <img src={{ asset('assets/images/diplomada.png') }} width="130px" alt="image" class="img-fluid " />
        </a>
        <x-sidebar-menu />
    </div>
</div>
