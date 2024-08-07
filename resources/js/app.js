// Importar dependencias
import './bootstrap';
import 'bootstrap';
import $ from 'jquery';
import 'datatables.net-bs4';

// Asignar jQuery a la ventana global
window.$ = window.jQuery = $;

// Configura el token CSRF globalmente
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Inicializar DataTables cuando el documento esté listo
$(document).ready(function() {
    $('#cocktailsTable').DataTable();

    $('.save-coctel').on('click', function() {
        let name = $(this).data('name');
        let instructions = $(this).data('instructions');
        let thumbnail = $(this).data('thumbnail');

        $.ajax({
            type: 'POST',
            url: '/save-coctel',
            data: {
                name: name,
                instructions: instructions,
                thumbnail: thumbnail
            },
            success: function(response) {
                alert(response.success);
            },
            error: function(error) {
                console.log(error.responseText);  // Muestra detalles del error
                alert('An error occurred. Please try again.');
            }
        });
    });
});

// Importar y configurar Vue (si lo estás usando)
import { createApp } from 'vue';
const app = createApp({});

// Registrar componentes de Vue
import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

// Montar la aplicación Vue
app.mount('#app');
