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
$(document).on('click', '.btnTambah', function (e) {
    $('#form-product').trigger('reset')
    $('#modal-title-product').html('Form Tambah')
    $('#modal-product').modal('toggle')
    $('#product_id').val('')
    $('#desc').summernote('code', '')
    $('.is-invalid').removeClass('is-invalid');
    $("#category_id").prop('selectedIndex', 0);
    $('#category_id').select2()
})

$(document).on('submit', '#form-product', function (e) {
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
                $('#modal-product').modal('toggle')
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

$(document).ready(function () {
    $.ajax({
        url: '/list_kategori',
        success: function (res) {
            if (res.status) {
                data = res.data
                option_category = '<option value="" selected disabled>-- Please Selected --</option>'
                $.each(data, function (key, val) {
                    option_category += '<option value="' + val.id + '">' + val.name + '</option>'
                })
                $('#category_id').html(option_category)
            }
        }
    })

    $('.pagination ul').addClass('justify-content-center')
    $('#desc').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            //   ['font', ['strikethrough', 'superscript', 'subscript']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video']],
            ['height', ['height']]
        ],
        height: 300
    })
})