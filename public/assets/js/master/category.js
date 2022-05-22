let urls = '/kategori'
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
        title: 'Aksi',
        data: 'aksi',
        class: 'text-center',
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
$(document).on('click', '.btnTambah', function (e) {
    $('#form-kategori').trigger('reset')
    $('#modal-title-kategori').html('Form Tambah')
    $('#modal-kategori').modal('toggle')
    $('#kategori_id').val('')
})

$(document).on('click', '.btnUpdate', function (e) {
    e.preventDefault()
    id = $(this).data('id')
    $.ajax({
        url: urls + '_id/' + id,
        success: function (res) {
            $('#form-kategori').trigger('reset')
            if (res.status) {
                data = res.data
                $('#modal-title-kategori').html('Form Update')
                $('#modal-kategori').modal('toggle')
                $('#kategori_id').val(data.id)
                $('#name').val(data.name)
            }
        }
    })
})

$(document).on('click', '.btnHapus', function (e) {
    id = $(this).data('id')
    myswalconfirm('Anda akan menghapus data ini').then(function (result) {
        if (result.isConfirmed) {
            $.ajax({
                url: urls + '_delete/' + id,
                method: 'delete',
                type: 'delete',
                data: {
                    '_token': token_csrf
                },
                success: function (res) {
                    if (res.status) {
                        Table.ajax.reload(null, false)
                        myswal('success', 'Berhasil!', res.message)
                    } else {
                        myswal('error', 'Gagal!', res.message)
                        console.log(res)
                    }
                }
            })
        }
    })
})

$(document).on('submit', '#form-kategori', function (e) {
    e.preventDefault()

    let formData = new FormData(this);
    $.ajax({
        url: urls,
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            // btnSpins(btnClick, true)
            $('.is-invalid').removeClass('is-invalid');
        },
        success: function (res) {
            // btnSpins(btnClick, false)
            if (res.status) {
                $('#modal-kategori').modal('toggle')
                Table.ajax.reload(null, false)
                myswal('success', 'Berhasil!', res.message)
            } else {
                myswal('error', 'Gagal!', res.message)
                console.log(res)
            }
        },
        error: function (xhr) {
            error_alert(xhr);
            btnSpins(btnClick, false)
        }
    })
})