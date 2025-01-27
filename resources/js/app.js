import './bootstrap';
import 'bootstrap';
import './login';
import './register';
import './submitForm';
import '../css/auth.css';
import './filepond';
import './actualizarEstatusDocumentos';

import { Tooltip } from 'bootstrap';

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(
    (tooltipTriggerEl) => new Tooltip(tooltipTriggerEl),
);
