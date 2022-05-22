let urls = '/product'
let Table = $('#table-data').DataTable({
    responsive: true,
    dom: 'Bfrtip',
    // "lengthChange": false,
    processing: true,
    serverSide: true,
    destroy: true,
    empty: true,
    buttons: buttons,
    ajax: {
        url: urls,
        type: 'GET',
    },
    columns: [{
        title: 'No',
        data: 'DT_RowIndex',
        orderable: false,
        searchable: false,
    },
    {
        title: 'Nama',
        data: 'name',
    },
    {
        title: 'Kategori',
        data: 'category_name',
    },
    {
        title: 'Deskripsi',
        data: 'desc',
        class: '',
    },
    ],
    autoWidth: false,
    // pagingType: 'full_numbers',
    // language: getLanguageDT,
    iDisplayLength: 10,
    aLengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All'],
    ],
    order: [
        // [1, 'desc']
    ],
});

$(document).on('click', '.btnRefresh', function (e) {
    e.preventDefault()
    Table.ajax.reload(null, false)
})