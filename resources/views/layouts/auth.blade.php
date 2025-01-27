@php
    $request = Request();
    $baseUrl = $request->getBaseUrl();

    if (session('nombre')) {
        header('Location: /admin/usuarios');
        exit();
    }
@endphp

@extends('layouts.principal')

@section('layout')
    <div style="background-color: #203767; height: 100vh" class="d-flex align-items-center">
        <div class="container-fluid">
            <div class="row d-flex align-items-center" style="background-color: #203767;">
                <div class="col col-md-6 col-lg-5 d-none d-md-block position-fixed top-0 bottom-0 left-0 imgBackground"
                    style="background-image: url('{{ asset(str_replace(' ', '%20', 'assets/images/portrait-young-brunette-using-laptop-computer-school-work-library-smiling (1).webp')) }}');">
                </div>
                <div class="col d-flex align-items-center pb-4 authContent fadeIn d-none" style="">
                    <div class="container">
                        <div class="col">
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <img src={{ asset('/assets/images/diplomada.png') }} alt="logo-diplomada"
                                        class="img-fluid rounded-circle " width="220">
                                </div>
                            </div>

                            @yield('content')

                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <a href={{ $baseUrl . '/' }} style="font-size: 17px; color: #E1C563"
                                        class="text-decoration-none">Volver a la Web</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
