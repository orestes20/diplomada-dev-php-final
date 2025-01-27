@extends('layouts.principal')

@section('layout')
    <x-public.header />
    <div>
        @yield('content')
    </div>
@endsection
