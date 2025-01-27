@php
    $allies = [
        ['name' => 'Uniagsfmi'],
        ['name' => 'Ulac'],
        ['name' => 'Confederación'],
        ['name' => 'Token Mithrandir'],
        ['name' => 'Ada Solar'],
    ];
@endphp

<div id="allies" class="container-fluid" style="margin-top: 100px; margin-bottom: 100px">
    <div class="row">
        <div class="col">
            <h1 class="text-center fw-bold" style="font-size: 45px">Nuestros Aliados</h1>
        </div>
    </div>

    <div class="row mt-5">
        @foreach ($allies as $key => $item)
            <div class="col">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center h-50">
                        <img src={{ asset('assets/images/allies/Recurso%20' . $key + 1 . '.webp') }}
                            alt="{{ $item['name'] }}" class="img-fluid" style="width: 200px; object-fit:cover">
                    </div>

                </div>
            </div>
        @endforeach
    </div>


</div>
