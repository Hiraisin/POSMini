let buttons = [
    'pageLength',
    {
        extend: 'excelHtml5',
        exportOptions: {
            columns: ':visible'
        }
    },
    {
        extend: 'print',
        exportOptions: {
            columns: ':visible'
        }
    },
    'colvis',
]