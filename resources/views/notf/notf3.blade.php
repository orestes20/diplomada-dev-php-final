@extends('notf/notf')
@section('notf3')
<script>

$(document).ready(function(){
            swal({
                    title: "¡Error en inicio de sesión!",
                    text:  "Usuario y o Contraseña Incorrecta, por favor intente nuevmente",
                    type:  "error",
                    showConfirmButton: false,
                    timer: 3000
                },
                function(){
                    window.location.href = "{{url('/')}}";
                })
        });

</script>

@endsection