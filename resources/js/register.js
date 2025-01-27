import axios from 'axios';
import { handleSubmitButton, setErrorsHtml } from './helpers';
import Swal from 'sweetalert2';
import isEmail from 'validator/lib/isEmail';
import isEmpty from 'validator/lib/isEmpty';
import isNumeric from 'validator/lib/isNumeric';
import isAlpha from 'validator/lib/isAlpha';

const registerForm = document.getElementById('registerForm');

const validate = (formData) => {
    const errors = {};

    if (isEmpty(formData.get('nombre'))) errors.nombre = 'Este campo es obligatorio';
    else if (!isAlpha(formData.get('nombre')))
        errors.nombre = 'Este campo debe contener solo letras';
    if (isEmpty(formData.get('apellido'))) errors.apellido = 'Este campo es obligatorio';
    else if (!isAlpha(formData.get('apellido')))
        errors.apellido = 'Este campo debe contener solo letras';
    if (isEmpty(formData.get('correo'))) errors.correo = 'Este campo es obligatorio';
    else if (!isEmail(formData.get('correo'))) errors.correo = 'El correo ingresado es inválido';
    if (isEmpty(formData.get('pass'))) errors.pass = 'Este campo es obligatorio';
    if (isEmpty(formData.get('pass1'))) errors.pass1 = 'Este campo es obligatorio';
    else if (formData.get('pass') !== formData.get('pass1'))
        errors.pass1 = 'La contraseña no coincide';
    if (isEmpty(formData.get('cedula'))) errors.cedula = 'Este campo es obligatorio';
    else if (!isNumeric(formData.get('cedula')))
        errors.cedula = 'Este campo debe contener solo números';
    if (isEmpty(formData.get('telefono_h'))) errors.telefono_h = 'Este campo es obligatorio';
    else if (!isNumeric(formData.get('telefono_h')))
        errors.telefono_h = 'Este campo debe contener solo números';
    if (isEmpty(formData.get('telefono_c'))) errors.telefono_c = 'Este campo es obligatorio';
    else if (!isNumeric(formData.get('telefono_c')))
        errors.telefono_c = 'Este campo debe contener solo números';
    if (isEmpty(formData.get('sexo'))) errors.sexo = 'Este campo es obligatorio';
    if (isEmpty(formData.get('wallet'))) errors.wallet = 'Este campo es obligatorio';

    return setErrorsHtml(errors);
};

const submit = async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    if (!validate(formData)) return;

    handleSubmitButton(true);
    try {
        await axios.post('registro', formData);

        Swal.fire({
            icon: 'success',
            title: 'Se ha registrado correctamente',
            text: 'Por favor inicie sesión para acceder al sistema',
            showConfirmButton: false,
        });

        setTimeout(() => {
            window.location = 'login';
        }, 3000);
    } catch (error) {
        handleSubmitButton(false);
    }
};

registerForm && registerForm.addEventListener('submit', submit);
