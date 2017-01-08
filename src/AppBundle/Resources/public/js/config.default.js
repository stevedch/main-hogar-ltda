$(function ($, window, document, undefined) {

    'use strict';
    //Barra de nav activación
    var url = window.location;
    //Sólo funcionará si cadena en href coincide con la ubicación
    $('ul.nav a[href="' + url + '"]').parent().addClass('active');
    // También Trabajará para hrefs relativos y absolutos
    $('ul.nav a').filter(function () {
        return this.href == url;
    }).parent().addClass('active');

}(jQuery, window, document));