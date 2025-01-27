@extends('notf/notf')
@section('notf12')
<script>
$(document).ready(function(){
            swal({
                    title: "¡Error en registro!",
                    text:  "Se produjo un error al registrar al nuevo usuario, por favor intente nuevamente",
                    type:  "error",
                    showConfirmButton: false,
                    timer: 3000
                },
                function(){
                    window.location.href = "{{url('view_actualizar_informacion')}}";
                })
        });

</script>

@endsection