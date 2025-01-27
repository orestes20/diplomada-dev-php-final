@php
    $profileId = session('id_perfil');
@endphp

<nav id="adminHeader" class="navbar navbar-expand-lg shadow px-3 py-3" style="background-color: #e1c564">
    <div class="container-fluid">
        <a class="navbar-brand d-none d-md-block" href="#"><i class="fa-solid fa-bars"></i></a>
        @if ($profileId == 1 || $profileId == 2 || $profileId == 3)
            <span id="showBalance" class="" style="font-size: 18px"></span>
        @endif

        <a class="navbar-brand d-block d-md-none" href="#" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar"><i class="fa-solid fa-bars"></i></a>

        <div class="d-flex align-items-center ms-auto cursor-pointer" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample" style="cursor: pointer">
            <div class="rounded-circle text-white fw-bold d-flex justify-content-center align-items-center me-2"
                style="background-color: #203767; font-size: 18px; width: 40px; height: 40px">
                {{ session('nombre')[0] }}</div>
            <span class="fw-bold" style="font-size: 15px">{{ session('nombre') }}</span>
        </div>
    </div>
</nav>
