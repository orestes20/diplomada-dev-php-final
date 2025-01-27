import axios from 'axios';
import Swal from 'sweetalert2';

const actualizarEstatusDocumentos = document.getElementById('actualizarEstatusDocumentos');
//console.log(actualizarEstatusDocumentos);
actualizarEstatusDocumentos.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    formData.append(e.submitter.name, e.submitter.value);

    const response = await axios.post(e.target.action, formData);

    Swal.fire({
        icon: 'success',
        title: response.data,
        showConfirmButton: false,
        timer: 3000,
        text: `Los documentos han sido ${
            e.submitter.name == 'aceptar' ? 'aprobardos' : 'rechazados'
        }`,
    })
    .then(function(){
        window.location.reload();
    });
});
