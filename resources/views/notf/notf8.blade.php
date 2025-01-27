@extends('notf/notf')
@section('notf8')
<script>

$(document).ready(function(){
            swal({
                    title: "¡Error en carga!",
                    text:  "Se produjo un error al cargar los archivos, por favor intente nuevamente",
                    type:  "error",
                    showConfirmButton: false,
                    timer: 3000
                },
                function(){
                    window.location.href = "{{url('view_cargar_documentos')}}";
                })
        });

</script>

@endsection