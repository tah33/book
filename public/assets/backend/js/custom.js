/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(document).ready(function () {
    let table = $("#table").DataTable({
        bLengthChange: true,
        "bDestroy": true,

        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                text: '<i class="far fa-copy"></i>',
                title: 'Stock Report',
                titleAttr: 'Copy',
                footer: true,
                exportOptions: {
                    columns: ':visible',
                }
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel"></i>',
                titleAttr: 'Excel',
                title: 'Stock Report',
                margin: [10, 10, 10, 0],
                footer: true,
                exportOptions: {
                    columns: ':visible',
                },

            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-file-csv"></i>',
                titleAttr: 'CSV',
                title: 'Stock Report',
                footer: true,
                exportOptions: {
                    columns: ':visible',
                }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf"></i>',
                title: 'Stock Report',
                titleAttr: 'PDF',
                footer: true,
                exportOptions: {
                    columns: ':visible',
                },
                orientation: 'landscape',
                pageSize: 'A4',
                margin: [0, 0, 0, 0],
                alignment: 'center',
                header: true,
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Print',
                alignment: 'center',
                title: 'Stock Report',
                exportOptions: {
                    columns: ':visible',
                },
                header: true,
                footer: true,
            },
        ],
    });

    var minDate, maxDate;

// Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {

            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date(data[3]);


            if (
                (min === null && max === null) ||
                (min === null && date <= max) ||
                (min <= date && max === null) ||
                (min <= date && date <= max)
            ) {
                return true;
            }
            return false;
        }
    );


    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
    });

    // Refilter the table
    $('#min, #max').on('change', function () {
        table.draw();
    });
});

function closeModal(modal) {
    $('#' + modal).modal('hide');
}
