@extends('notf/notf')
@section('notf14')
<script>
$(document).ready(function(){
            swal({
                    title: "Debe iniciar Sessión",
                    type:  "warning",
                    showConfirmButton: false,
                    timer: 3000
                },
                function(){
                    window.location.href = "{{url('/')}}";
                })
        });
</script>
@endsection