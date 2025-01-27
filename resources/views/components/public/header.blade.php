<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src={{ asset(str_replace(' ', '%20', 'assets/images/Logo Diplomada color 1 JPEG.jpg')) }}
                alt="logo-diplomada" width="100">
            <img src={{ asset(str_replace(' ', '%20', 'assets/images/Logo Diplomada color 1 JPEG letras.jpg')) }}
                alt="logo-diplomada" width="180" class="ms-4">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
            <ul class="navbar-nav text-uppercase d-flex align-items-center" style="font-size: 17px">
                <li class="nav-item me-3">
                    <a class="nav-link active" aria-current="page" href="#">inicio</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link" href="#">Nosotros</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item me-3">
                    <a class="btn btn-primary rounded-pill fw-bold py-3 px-5 text-white"
                        style="background-color: #203767; border-color: #203767" href="admin/login">
                        Acceder al Sistema
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
