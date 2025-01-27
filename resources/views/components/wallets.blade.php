@php
    $wallets = [
        ['name' => 'Nami', 'description' => 'Billetera sin custodia para Cardano, envía ADA, conecta DApps.'],
        ['name' => 'Yoroi', 'description' => 'Billetera criptográfica de código abierto que potencia su viaje Web3.'],
        ['name' => 'Cardano', 'description' => 'Segura, gestiona ADA. Compra, envía, recibe.'],
    ];
@endphp

<div class="row mt-4">
    <div class="col">
        <h5 class="fw-bold">Wallets</h5>
    </div>
</div>

@foreach ($wallets as $key => $item)
    <div class="row mt-4 mb-4 d-flex" id={{ 'wallet-' . $key + 1 }} style="cursor: pointer">
        <div class="col-2  ">
            <div class="position-relative d-flex justify-content-center align-items-center rounded"
                style="height: 40px; width: 40px; background-color:#F3F6F9; color: #922D50">
                <i class="fa-solid fa-coins"></i>
                <span
                    class="position-absolute top-100 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                </span>
            </div>
        </div>

        <div class="col d-flex flex-column">
            <span class="fw-bold">{{ $item['name'] }}</span>
            <span style="font-size: 13px" class="text-muted">
                {{ $item['description'] }}
            </span>
        </div>
    </div>
@endforeach
