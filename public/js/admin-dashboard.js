function initalize_dataTables(element, config = null) {

    let additional_config = {};
    let additional_config_default = {
        "bInfo": false,
        "info": false,
        "bLengthChange": true,
        "bFilter": true,
        "bAutoWidth": false,
        "bSort": false,
        lengthMenu: [
            [5, 25, 50, 100, -1],
            [5, 25, 50, 100, "All"]
        ],
    }

    let manual_config = {
        "oLanguage": {
            "sSearch": ""
        },
        dom: "<'row'<'col-md-4 text-xs pl-3 d-flex justify-content-start'f><'col-md-4 text-center'B><'col-md-4 text-xs d-flex justify-content-end'l>>" +
            "<'row mt-2'<'col-md-12'tr>>" +
            "<'row mt-4'<'col-md-5 text-sm'i><'col-md-7 text-xs d-flex justify-content-end'p>>",
        "pagingType": "first_last_numbers",
        "language": {
            "search": '<i class="fa fa-search text-secondary"></i>',
            "paginate": {
                "first": "&laquo;",
                "last": "&raquo;"
            }
        }
    }

    if (config !== null) {
        additional_config = config;
    } else {
        additional_config = additional_config_default;
    }

    let new_config = Object.assign(additional_config, manual_config);
    $(element).DataTable(new_config);

    $('.dataTables_filter input[type="search"]').
    attr('placeholder', 'Find something ...').
    addClass('inputForm').
    css({
        'width': '250px',
        'display': 'inline-block',
    });
}

function dataTables_galleries(element, config = null) {
    $(element).DataTable({
        dom: "<'row'<'col-md-4 text-xs pl-3 d-flex justify-content-start'f><'col-md-4 text-center'B><'col-md-4 text-xs d-flex justify-content-end'l>>" +
            "<'row mt-2'<'col-md-12'tr>>" +
            "<'row mt-4'<'col-md-5 text-sm'i><'col-md-7 text-xs d-flex justify-content-end'p>>",
        "iDisplayLength": 10,
        "info": false
    });
}