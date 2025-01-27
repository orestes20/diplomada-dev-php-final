@php
    if (!session('nombre')) {
        header('Location: /admin/login');
        exit();
    }
@endphp

@extends('layouts.principal')

@section('layout')
    <div id="adminLayout">
        <x-sidebar />
        <main class="d-flex flex-column">
            <div id="walletAlert" class="text-center py-1 bg-danger text-white text-uppercase d-none">Porfavor conecta tu
                wallet</div>
            <x-header />
            <div class="container-fluid pt-5">
                <div class="card mainCard shadow-sm p-4 border-0 rounded-2 fadeIn2 d-none">
                    @yield('content')
                    @yield('content1')
                </div>
            </div>
            <x-footer />
        </main>
        <x-offcanvas-user-info />
    </div>
    @vite(['resources/js/sidebar', 'resources/js/demostra', 'resources/js/wallet', 'resources/js/diplomada', 'resources/js/dadatipos', 'resources/js/utils','resources/js/validar'])
    <script type="module">
        const cardanoIsEnabled = window.cardano && await window.cardano.isEnabled() ? true : false
        //cardanoIsEnabled = window.cardano;
        //console.log("Cardano IsEnabled = " + cardanoIsEnabled,await window.cardano);

        if (!cardanoIsEnabled) {

            const walletAlert = document.getElementById('walletAlert');
            walletAlert.classList.remove('d-none');
        }
        
        const onLoad = () => {
            document
                .querySelectorAll('input[type="text"]')
                .forEach((element) => element.setAttribute('autocomplete', 'nope'));
        }
        window.onload = onLoad
    </script>
    
@endsection
