import isEmail from 'validator/lib/isEmail';
import isEmpty from 'validator/lib/isEmpty';
import isAlpha from 'validator/lib/isAlpha';
import isLength from 'validator/lib/isLength';
import isNumeric from 'validator/lib/isNumeric';

const submitButton = document.getElementById('submitButton');
const spinner = document.getElementById('spinner');

export const handleSubmitButton = (submit) => {
    if (submit) {
        submitButton.setAttribute('disabled', true);
        spinner.classList.remove('d-none');
    } else {
        submitButton.removeAttribute('disabled');
        spinner.classList.add('d-none');
    }
};

export const setErrorsHtml = (errors) => {
    document
        .querySelectorAll('.is-invalid')
        .forEach((element) => element.classList.remove('is-invalid'));

    if (!Object.keys(errors).length) return true;

    for (const key in errors) {
        document.getElementById(key).classList.add('is-invalid');
        document.getElementById(`feedback-${key}`).innerHTML = errors[key];
    }

    return false;
};

export const validate = (formData) => {
    const errors = {};

    for (const pair of formData.entries()) {
        if (pair[0] === '_token') continue;
        const input = document.getElementById(pair[0]);

        if (input.hasAttribute('required') && isEmpty(pair[1])) {
            errors[pair[0]] = `Este campo es obligatorio`;
        } else if (input.type === 'email' && !isEmail(pair[1])) {
            errors[pair[0]] = 'El correo ingresado es inválido';
        } else if (input.hasAttribute('onlyletters') && !isAlpha(pair[1])) {
            errors[pair[0]] = 'Este campo debe contener solo letras';
        } else if (
            (input.hasAttribute('minlength') || input.hasAttribute('maxlength')) &&
            !isLength(pair[1], {
                min: input.hasAttribute('minlength') ? input.getAttribute('minlength') : 0,
                max: input.hasAttribute('maxlength') ? input.getAttribute('maxlength') : undefined,
            })
        ) {
            errors[pair[0]] = `Este campo debe contener entre ${
                input.hasAttribute('minlength') ? input.getAttribute('minlength') : 0
            } y ${
                input.hasAttribute('maxlength') ? input.getAttribute('maxlength') : undefined
            } caracteres`;
        } else if (input.type === 'number' && !isNumeric(pair[1])) {
            errors[pair[0]] = 'Este campo debe contener solo números';
        } else if (
            input.hasAttribute('confirm') &&
            document.getElementById(input.getAttribute('confirm')).value != pair[1]
        ) {
            console.log();
            errors[pair[0]] = 'El campo no coincide';
        }
    }

    return setErrorsHtml(errors);
};
