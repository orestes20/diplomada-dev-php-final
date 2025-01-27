@extends('notf/notf')
@section('notf16')
<script>
$(document).ready(function(){
            swal({
                    title: "Notas Cargadas",
                    type:  "success",
                    showConfirmButton: false,
                    timer: 3000
                },
                function(){
                    window.location.href = "{{url('aspirante/nomina')}}";
                })
        });
</script>
@endsection