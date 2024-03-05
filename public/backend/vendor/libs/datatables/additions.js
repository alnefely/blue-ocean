function lengthMenu(all)
{
    return [
        [10,20,30,40,50,60,70,80,90,100, -1],
        [10,20,30,40,50,60,70,80,90,100, all]
    ];
}

function getlang()
{
    var lang = $('html').attr('lang');
    if(lang=='ar') {
        return {
            url: "/backend/vendor/libs/datatables/Arabic.json",
        };
    }else {
        return null;
    }
}

function dom()
{
    return '<"row me-2"' +'<"col-md-2"<"me-3"l>>' +
    '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
    '>t' +'<"row mx-2"' +'<"col-sm-12 col-md-6"i>' +'<"col-sm-12 col-md-6"p>' +'>';
}

function buttons(title,href)
{
    var dir = $('html').attr('dir');
    return [
        {
            extend: 'collection',
            className: 'btn btn-label-secondary dropdown-toggle mx-3',
            text: '<i class="ti ti-screen-share me-1 ti-xs"></i>Export',
            buttons: [
                {
                    extend: 'print',
                    text: '<i class="ti ti-printer me-2" ></i>Print',
                    className: 'dropdown-item',
                    exportOptions: {columns:':visible(.exp-col)'},
                    customize: function (win) {
                        $(win.document.body)
                        .attr('dir', dir)
                        .find('table')
                        .removeClass('table-bordered table-hover')
                        .find('tr td:last-child')
                        .addClass('text-nowrap')
                    }
                },

                {
                    extend: 'csv',
                    charset: 'utf-8',
                    fieldSeparator: ';',
                    bom: true,
                    text: '<i class="ti ti-file-text me-2" ></i>Csv',
                    className: 'dropdown-item',
                    exportOptions: {columns:':visible(.exp-col)'},
                },

                {
                    extend: 'excel',
                    charset: 'utf-8',
                    fieldSeparator: ';',
                    bom: true,
                    text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
                    className: 'dropdown-item',
                    exportOptions: {columns:':visible(.exp-col)'},
                },
                { // Pdf
                    extend: 'print',
                    text: '<i class="ti ti-file-code-2 me-2"></i>PDF',
                    className: 'dropdown-item',
                    exportOptions: {columns:':visible(.exp-col)'},
                    customize: function (win) {
                        $(win.document.body)
                        .attr('dir', dir)
                        .find('table')
                        .removeClass('table-bordered table-hover')
                        .find('tr td:last-child')
                        .addClass('text-nowrap')
                    }
                },
                {
                    extend: 'copy',
                    text: '<i class="ti ti-copy me-2" ></i>Copy',
                    className: 'dropdown-item',
                    exportOptions: {columns:':visible(.exp-col)'},
                }
            ]
        },
        {
            text: `<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">${title}</span>`,
            className: 'btn btn-primary',
            attr: {
                onclick: `location.href="${href}"`
            }
        }
    ];
}
