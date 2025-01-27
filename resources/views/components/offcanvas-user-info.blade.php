@php
    $profileId = session('id_perfil');
@endphp

<div class="offcanvas offcanvas-end py-3 px-3 bg-white" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h4 class="offcanvas-title fw-bold" id="offcanvasExampleLabel">Perfil de Usuario</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="row">
            <div class="col-3">
                <div class="text-white fw-bold d-flex justify-content-center align-items-center me-2 rounded"
                    style="background-color: #203767; font-size: 18px; width: 80px; height: 80px">
                    {{ session('nombre')[0] }}</div>
            </div>
            <div class="col d-flex flex-column">
                <span style="font-size: 20px">{{ session('nombre') }}</span>
                {{ session('perfil') }}
            </div>
        </div>
        <div class="row mt-2">
            <div class="col d-grid gap-2">
                <button class="btn fw-bold text-white btn-sm" style="background-color: #203767">
                    Cambiar Contraseña
                </button>
            </div>
        </div>

        <div class="row mt-2 mb-2">
            <div class="col d-grid gap-2">
                <a href={{ url('admin/cerrar_sesion') }} id="salir" class="btn btn-sm fw-bold text-white"
                    style="background-color: #922D50">
                    Salir
                    <i class="fa-solid fa-right-from-bracket ms-2"></i>
                </a>
            </div>
        </div>

        <div class="row mt-4 mb-4 d-flex align-items-center">
            <div class="col-2">
                <div class="d-flex justify-content-center align-items-center rounded"
                    style="height: 40px; width: 40px; background-color:#F3F6F9; color: #09E8EC">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>

            <div class="col d-flex flex-column">
                <span class="fw-bold">Mi Perfil</span>
                <span class="text-muted fw-bold">Configuración de cuenta y más</span>
            </div>
        </div>

        @if ($profileId == 1 || $profileId == 2 || $profileId == 3)
            <x-wallets />
        @endif
    </div>
</div>
