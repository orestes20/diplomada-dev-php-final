@extends('notf/notf')
@section('notf16')
<script>
$(document).ready(function(){
            swal({
                    title: "Verificacion Completa",
                    text:  "Se han verificado los documentos de forma correcta",
                    type:  "success",
                    showConfirmButton: false,
                    timer: 3000
                },
                function(){
                    window.location.href = "{{url('aspirante/revisar_documentos')}}";
                })
        });
</script>
@endsection