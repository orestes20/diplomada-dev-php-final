@extends('notf/notf')
@section('notf15')
<script>
$(document).ready(function(){
    swal({
            title: "Inscripción Realizada",
            type:  "success",
            showConfirmButton: false,
            timer: 3000
        },
        function(){
            window.location.href = "{{url('aspirante/inscripcion')}}";
        })
    });
</script>
@endsection