var token_csrf = $('meta[name="csrf-token"]').attr("content");

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

function error_alert(xhr) {
    if (xhr.status == 422) {
        return $.each(xhr.responseJSON.errors, function (index, value) {
            $('.error-' + index).text(value[0]);
            $('#' + index).addClass('is-invalid');
        })
    }
}

function remove_invalid() {
    $('.form-control').removeClass('is-invalid');
    $(".invalid-feedback").empty();
}


// swal & toast
function myswal(icon = 'success', title = 'Berhasil', text) {
    return Swal.fire({
        icon: icon,
        title: title,
        text: text,
        showConfirmButton: false,
        timer: 3500
    })
}

function myswalconfirm(text = "You won't be able to revert this!") {
    return Swal.fire({
        title: 'Are you sure?',
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, continue!'
    })
}

function ToastFire(bg, title, msg) {
    $(document).Toasts('create', {
        class: 'bg-' + bg,
        title: title,
        body: msg,
        autohide: true,
        delay: 30000,
    })
}

function ToastFireHide(bg, title, msg, time = 3000) {
    $(document).Toasts('create', {
        class: 'bg-' + bg,
        title: title,
        body: msg,
        autohide: true,
        delay: time,
    })
}
// Swal End

var input_rupiah
$(document).on('input', '.rupiah', function () {
    input_rupiah = $(this)
    val = input_rupiah.val()
    if (val.search('Rp') < 0) {
        input_rupiah.val(convertToRupiah(val))
    } else {
        input_rupiah.val(convertToAngka(val))
        val = input_rupiah.val()
        input_rupiah.val(convertToRupiah(val))
    }

    // input_rupiah.val(convertToRupiah(val))
})

function convertToRupiah(angka) {
    if (typeof angka === 'number') {
        angka = angka.toFixed(0)
    }
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for (var i = 0; i < angkarev.length; i++)
        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
    return 'Rp ' + rupiah.split('', rupiah.length - 1).reverse().join('');
}

function convertToAngka(rupiah) {
    parse = parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
    return isNaN(parse) ? 0 : parse;
}

// input number
$(document).on('input', '.num-input', function () {
    val = $(this).val()
    parse = parseInt(val.replace(/,.*|[^0-9]/g, ''), 10);
    val = isNaN(parse) ? 0 : parse;
    $(this).val(val)
})