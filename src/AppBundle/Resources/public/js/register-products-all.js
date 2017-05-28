(function ($) {

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
    }, cart = '#table-shopping-cart';


    setTimeout(function () {

        getCartAjaxAll(cart, {
            url: $(cart).data('url'),
            dataSrc: "data"
        }, data_table_language);
    });

    $('#search-all-products').on('click', function (e) {

        e.preventDefault();


        const STATUS_GOOD = 'status.good';
        const STATUS_BAD = 'status.bad';

        var url = $(this).data('url'), dataTable;

        $.confirm({
            title: 'Lista de Productos',
            theme: 'material',
            type: 'blue',
            content: '<table id="table-shopping-products"' +
            ' class="uk-table uk-table-small uk-table-hover uk-table-striped dataTable uk-table-expand">' +
            '<thead><tr><th></th><th>Nombre</th>' +
            '<th>Cantidad / Stock</th>' +
            '<th>Precio</th>' +
            '<th>Estado de Stock</th></tr> </thead>' +
            '</table>',
            onContentReady: function () {

                dataTable = '#table-shopping-products';

                if ($.fn.DataTable.isDataTable(dataTable)) {
                    $(dataTable).DataTable().destroy();
                }

                $(dataTable).DataTable({
                    ajax: {
                        url: url,
                        dataSrc: "data"
                    },
                    "oLanguage": data_table_language,
                    dom: "Bfrtip",
                    drawCallback: function (settings) {
                    },
                    fnRowCallback: function (nRow, aData, iDisplayIndex) {
                    },
                    columns: [
                        {
                            orderable: false,
                            render: function (data, type, row) {

                                data = (STATUS_GOOD === row.status) ? '<input type="checkbox" ' +
                                    ' class="checkbox-js uk-checkbox"  value="' + row.id + '" ' +
                                    ' style="display: inline-block !important;"/>' : '';

                                return data;
                            }
                        },
                        {
                            data: "name"
                        }, {
                            data: "quantity"
                        }, {
                            data: "price"
                        }, {
                            data: "status",
                            render: function (data, type, row) {

                                return '<span class="uk-label uk-label-' + (STATUS_GOOD === data ? 'success'
                                        : 'danger') + '">' + (STATUS_GOOD === data ? 'Con Stock' : 'Sin Stock')
                                    + '</span>';
                            }
                        }
                    ]
                });
            },
            boxWidth: '50%',
            useBootstrap: false,
            buttons: {
                confirm: {
                    text: 'Aceptar',
                    btnClass: 'uk-button uk-button-primary uk-button-small',
                    keys: ['enter', 'a'],
                    action: function () {

                        var urlJson = $('#user-register-customer').data('url'), dataObj = {},
                            dataTable = $('#table-shopping-products').dataTable().fnGetNodes();

                        $.each(dataTable, function (k, v) {

                            var checked = $(v).find('input[type="checkbox"]');
                            if ((checked.is(':checked'))) dataObj[k] = checked.val();
                        });

                        if (0 === Object.keys(dataObj).length) {

                            return false;
                        }

                        dataTable = '#table-shopping-cart';

                        if ($.fn.DataTable.isDataTable(dataTable)) {
                            $(dataTable).DataTable().destroy();
                        }

                        getCartAjaxAll(dataTable, {
                            url: urlJson,
                            data: {
                                data: dataObj
                            },
                            dataSrc: "data"
                        }, data_table_language);
                    }
                },
                cancel: {
                    text: 'Cancelar',
                    btnClass: 'uk-button uk-button-danger uk-button-small',
                    keys: ['enter', 'a'],
                    action: function () {

                    }
                }
            }
        });
    });

    $('#user-register-supplier').on('click', function (e) {

        e.preventDefault();
        $("#appbundle_details_customer_rut," +
            " #appbundle_details_customer_name," +
            " #appbundle_details_customer_lastName," +
            " #appbundle_details_customer_mothersLastName," +
            " #appbundle_details_customer_address," +
            " #appbundle_details_customer_email").val('');

    });

    $('#user-register-customer').on('click', function (e) {

        e.preventDefault();

        $("#appbundle_details_supplier_name," +
            " #appbundle_details_supplier_address," +
            " #appbundle_details_product_name," +
            " #appbundle_details_product_quantity," +
            " #appbundle_details_product_price," +
            " #appbundle_details_product_cellar_name," +
            " #appbundle_details_product_cellar_address").val('');

    });

    /**
     * @param id
     * @param ajax
     * @param dataTableLanguage
     */
    function getCartAjaxAll(id, ajax, dataTableLanguage) {

        $(id).DataTable({
            ajax: ajax,
            "oLanguage": dataTableLanguage,
            dom: "Bfrtip",
            drawCallback: function (settings) {


                $('input[type="number"]').keypress(function (e) {
                    e.preventDefault();
                }).bind("cut copy paste", function (e) {
                    e.preventDefault();
                });

                $(document).keydown(function (e) {
                    var elid = $(document.activeElement).hasClass('textInput');
                    console.log(e.keyCode + ' && ' + elid);
                    if (e.keyCode === 8 && !elid) {
                        return false;
                    }
                });
            },
            fnRowCallback: function (nRow, aData, iDisplayIndex) {

                $('input[type="number"]').keypress(function (e) {
                    e.preventDefault();
                }).bind("cut copy paste", function (e) {
                    e.preventDefault();
                });

                $(document).keydown(function (e) {
                    var elid = $(document.activeElement).hasClass('textInput');
                    console.log(e.keyCode + ' && ' + elid);
                    if (e.keyCode === 8 && !elid) {
                        return false;
                    }
                });
            },
            columns: [
                {
                    orderable: false,
                    render: function (data, type, row) {

                        return null;
                    }
                },
                {
                    data: "name"
                }, {
                    data: "quantity"
                },
                {
                    orderable: false,
                    render: function (data, type, row) {

                        return '<input class="uk-input uk-form-small" type="number" min="1"' +
                            ' max="' + row.quantity + '" value="1" />';
                    }
                }
                , {
                    data: "price"
                }, {
                    orderable: false,
                    render: function (data, type, row) {

                        return '<p uk-margin>' +
                            '<a class="uk-button uk-button-danger uk-button-xs">Eliminar</a>' +
                            '</p>';
                    }
                }
            ]
        });

    }
}(jQuery));