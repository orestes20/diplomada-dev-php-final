@extends('notf/notf')
@section('notf11')
<script>
$(document).ready(function(){
            swal({
                    title: "¡Usuario Registrado!",
                    text:  "El usuario se ha registrado exitosamente",
                    type:  "success",
                    showConfirmButton: false,
                    timer: 3000
                },
                function(){
                    window.location.href = "{{url('view_nuevo_usuario')}}";
                })
        });

</script>

@endsection