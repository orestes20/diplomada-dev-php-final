@extends('notf/notf')
@section('notf6')
<script>
$(document).ready(function(){
        swal({
                title: "¡Clave enviada!",
                text:  "Correo electrónico se ha enviado de forma exitosa",
                type:  "success",
                showConfirmButton: false,
                timer: 3000
            },
            function(){
                window.location.href = "{{url('view_recuperar_clave')}}";
            })
        });
</script>
@endsection