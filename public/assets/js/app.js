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