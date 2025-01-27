import axios from 'axios';
import { handleSubmitButton, setErrorsHtml } from './helpers';
import isEmail from 'validator/lib/isEmail';
import isEmpty from 'validator/lib/isEmpty';

const loginForm = document.getElementById('loginForm');
const loginAlert = document.getElementById('loginAlert');

const validate = (formData) => {
    const errors = {};

    if (isEmpty(formData.get('email'))) errors.email = 'Este campo es obligatorio';
    else if (!isEmail(formData.get('email'))) errors.email = 'El correo ingresado es inválido';
    if (isEmpty(formData.get('password'))) errors.password = 'Este campo es obligatorio';
    return setErrorsHtml(errors);
};

const submit = async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    if (!validate(formData)) return;

    handleSubmitButton(true);

    try {
        await axios.post('login', formData);
        window.location = '/admin';
    } catch (error) {
        handleSubmitButton(false);
        loginAlert.classList.add('show');
        loginAlert.classList.remove('d-none');
        loginAlert.innerHTML = error.response.data;
    }
};
loginForm && loginForm.addEventListener('submit', submit);
