@extends('notf/notf')
@section('notf4')
<script>
$(document).ready(function(){
            swal({
                    title: "¡El usuario no Existe!",
                    text:  "Correo electrónico no esta registrado",
                    type:  "warning",
                    showConfirmButton: false,
                    timer: 3000
                },
                function(){
                    window.location.href = "{{url('view_recuperar_clave')}}";
                })
        });
</script>
@endsection