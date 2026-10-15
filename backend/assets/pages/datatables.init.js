/*
 Template Name: Lexa - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Datatable js
 */

$(document).ready(function() {
    $('#datatable').DataTable();

    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        buttons: ['excel', 'pdf', 'colvis']
    });

    // plugin Buttons tidak dimuat di semua halaman
    if (table.buttons) table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
} );