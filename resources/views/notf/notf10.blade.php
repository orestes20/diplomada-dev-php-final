@extends('notf/notf')
@section('notf10')
<script>
$(document).ready(function(){
            swal({
                    title: "¡Error en actualizar!",
                    text:  "Se produjo un error al Actualizar la información, por favor intente nuevamente",
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