@extends('notf/notf')
@section('notf9')
<script>
$(document).ready(function(){
            swal({
                    title: "¡Actualizacion exitosa!",
                    text:  "Los datos del aspirante se han actualizado de forma exitosa",
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