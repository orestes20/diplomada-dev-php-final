import axios from 'axios';
import { handleSubmitButton } from './helpers';
import { validate } from './helpers';

const form = document.getElementById('form');

const submit = async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    if (!validate(formData)) return;
    handleSubmitButton(true);

    try {
        console.log(form.action);
        //console.log('llegue a este punto');
        await axios.post(form.action, formData);
        window.location = location.origin + '/admin/usuarios' + form.getAttribute('redirect');
    } catch (error) {
        handleSubmitButton(false);
    }
};

form && form.addEventListener('submit', submit);
