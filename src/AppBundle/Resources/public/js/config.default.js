$(document).ready(function () {

    'use strict';

    var data_table_language = {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    };

    var number = 'input[type="number"]';

    $(number).keypress(function (e) {
        e.preventDefault();
    }).bind("cut copy paste", function (e) {
        e.preventDefault();
    });

    $(number).keydown(function (e) {
        var elid = $(document.activeElement).hasClass('textInput');

        if (e.keyCode === 8 && !elid) {
            return false;
        }
    });

    $('#table-supplier,' +
        ' #table-customer,' +
        ' #table-products').DataTable({"oLanguage": data_table_language});
});
