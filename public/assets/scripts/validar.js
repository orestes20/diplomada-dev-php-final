function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }

     if(letras.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
 }

 function SoloNumeros(evt){
    if(window.event){//asignamos el valor de la tecla a keynum
    keynum = evt.keyCode; //IE
    }
    else{
    keynum = evt.which; //FF
    }
    //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
    if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
    return true;
    }
    else{
    return false;
    }
}
$(document).ready(function(){
    $('#cedula').change(function(){
        var cedula = $('#cedula').val();
        $.get('val_cedula/'+cedula,function(data){
            if(data=='true')
            {
            $(document).ready(function(){
                swal({   
                    title: "¡Datos Duplicados!",   
                    text: "La cédula de identididad ya existe!!",   
                    type: "error",
                    timer: 3000,   
                    showConfirmButton: false
                });
                $('#cedula').val('');
                return false;
                });
            }
            else
                return true;
        });
    });
});

$(document).ready(function(){
    $('#correo').change(function(){
        var correo = $('#correo').val();
        $.get('val_correo/'+correo,function(data){
            if(data=='true')
            {
            $(document).ready(function(){
                swal({   
                    title: "¡Duplicidad de datos!",   
                    text: "El Correo electronico ya existe!!",   
                    type: "error",
                    timer: 3000,   
                    showConfirmButton: false
                });
                $('#correo').val('');
                return false;
                });
            }
            else
                return true;
        });
    });
});

$(document).ready(function(){
    $('#fecha').on('change', function(){
        fecha = $('#fecha').val();
        hoy = new Date();
        cumpleanos = new Date(fecha);
        edad = hoy.getFullYear() - cumpleanos.getFullYear();
        m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    if (edad < 18 ) {
        swal({   
            title: "¡Error en la fecha!",   
            text: "Debe tener mas de 18 años para registrarte",   
            type: "error",
            timer: 3000,   
            showConfirmButton: false
        });
        $('#fecha').val('');
    }
    });
});

$(document).ready(function(){
    if ($('#pass1').val()!='') {
        $('#pass').change(function(){
            var pass = $('#pass').val();
            var pass1 = $('#pass1').val();
            if (pass != pass1) {
                swal({   
                    title: "¡Las claves no coinciden!",   
                    text: "Las claves qingresadas no coinciden, por favor intente nuevamente",   
                    type: "error",
                    timer: 3000,   
                    showConfirmButton: false
                });
                $('#pass').val('');
                $('#pass1').val('');
                return false;
                }
        });
    }
    $('#pass1').change(function(){
        var pass = $('#pass').val();
        var pass1 = $('#pass1').val();
        if (pass != pass1) {
            swal({   
                title: "¡Las claves no coinciden!",   
                text: "Las claves qingresadas no coinciden, por favor intente nuevamente",   
                type: "error",
                timer: 3000,   
                showConfirmButton: false
            });
            $('#pass').val('');
            $('#pass1').val('');
            return false;
            }
    });
});