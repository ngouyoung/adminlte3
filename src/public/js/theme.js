$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('[data-toggle="tooltip"]').tooltip({
        show: 200,
        trigger: 'hover',
        placement: 'bottom',
    });

    $('table').on('draw.dt', function () {
        $('[data-toggle="tooltip"]').tooltip({
            show: 200,
            trigger: 'hover',
            placement: 'bottom',
        });
    });
});

(function ($, DataTable) {
    // Datatable global configuration
    $.extend(true, DataTable.defaults, {
        // dom: "<'row'<'col-sm-6 col-6'l><'col-sm-6 col-6'f>>" +
        //     "<'row'<'col-sm-12'tr>>" +
        //     "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        pageLength: 50,
        lengthMenu: [
            [50, 100, 200, 250],
            [50, 100, 200, 250]
        ],
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: true,
        order: [0, 'asc'],
    });

})(jQuery, jQuery.fn.dataTable);
