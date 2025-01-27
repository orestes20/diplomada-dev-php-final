@extends('notf/notf')
@section('notf13')
<script>
$(document).ready(function(){
            swal({
                    title: "¡Verificación completa!",
                    text:  "Se produjo un error al registrar al nuevo usuario, por favor intente nuevamente",
                    type:  "success",
                    showConfirmButton: false,
                    timer: 3000
                },
                function(){
                    window.location.href = "{{url('view_actualizar_informacion')}}";
                })
        });

</script>

@endsection