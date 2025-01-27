import * as FilePond from 'filepond';
import 'filepond/dist/filepond.min.css';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
import FilePondPluginPdfPreview from 'filepond-plugin-pdf-preview';

FilePond.registerPlugin(FilePondPluginImagePreview);
FilePond.registerPlugin(FilePondPluginFileValidateType);
FilePond.registerPlugin(FilePondPluginFileValidateSize);
FilePond.registerPlugin(FilePondPluginPdfPreview);

const inputElement = document.querySelectorAll('input[type="file"].filepond');

inputElement.forEach((el) => {
    FilePond.create(el).setOptions({
        credits: false,
        labelIdle: 'Arrastra y suelta tu archivo aquí',
        maxFileSize: '2MB',
        acceptedFileTypes: ['application/pdf'],
        allowFileSizeValidation: true,
        labelMaxFileSizeExceeded: 'El archivo es demasiado grande',
        labelMaxFileSize: 'El tamaño máximo de archivo es {filesize}',
        storeAsFile: true,
    });
});
