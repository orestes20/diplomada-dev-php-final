@php
    $request = Request();
    $backUrl = explode('/', $request->getPathInfo());
    $backUrl = '/admin/' . $backUrl[2];
@endphp

<div class="row d-flex justify-content-end">
    <div class="col-2 d-grid gap-2">
        <a
            href={{ $backUrl }}
            class="btn btn-sm rounded-pill fw-bold text-white"
            style="background-color: #203767"
        >
            <i class="fa-solid fa-arrow-left me-1"></i>
            Regresar
        </a>
    </div>
</div>
