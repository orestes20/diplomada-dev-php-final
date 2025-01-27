@extends('notf/notf')
@section('notf7')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    // swal({
    //         title: "¡Documentos Cargados!",
    //         text:  "Se han cargado los documentos de forma exitosa",
    //         type:  "success",
    //         showConfirmButton: false,
    //         timer: 3000
    //     },
    //     function(){
    //             window.location.href = "{{url('view_recuperar_clave')}}";
    //     });


swal({
    title: "Documentos Cargados",
    text: "Se han cargado los documentos de forma exitosa",
    icon: "success",
    buttons: false,
    timer: 3000
 })
  .then((willDelete) => {
        window.location.href = "{{url('aspirante/view_cargar_documentos')}}";
  });
</script>
@endsection