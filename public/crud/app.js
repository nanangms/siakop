$('body').on('click', '.modal-show', function (event) {
    event.preventDefault();
    $('#modal-btn-save').show();
    $('#modal-btn-save').removeAttr('disabled').text('Simpan');
    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').removeClass('hide')
        .text(me.hasClass('edit') ? 'UBAH' : 'SIMPAN');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response);
        }
    });

    $('#modal').modal('show');
});

$('#modal-btn-save').click(function (event) {
    event.preventDefault();
    $('#modal-btn-save').text('Menyimpan data...'); //change button text
    $('#modal-btn-save').attr('disabled',true); //set button disable
    var form = $('#modal-body form'),
        url = form.attr('action'),
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

    form.find('.text-danger').remove();
    form.find('.form-group').removeClass('has-error');
    form.find('.form-control').removeClass('is-invalid');

    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function (response) {
            form.trigger('reset');
            $('#modal').modal('hide');
            $('#datatable').DataTable().ajax.reload(null,false);

            swal({
                icon: "success",
                title: "BERHASIL!",
                text: "Data Berhasil Disimpan",
                timer: 1500,
                buttons: false,
            });
            
        },
        error: function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                    .closest('.form-group')
                    .addClass('has-error')
                    .append('<small class="text-danger">' + value + '</small>');

                    $('#' + key)
                    .closest('.form-control')
                    .addClass('is-invalid');
                });
                $('#modal-btn-save').removeAttr('disabled').text('Simpan');
            }
        }
    })
});

$('body').on('click', '.btn-delete', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');
    swal({
        title: "Anda Yakin?",
        text: "Mau Menghapus Data : "+ title +"?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((result) => {
        if (result) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
                success: function (response) {
                    if (response.status == 'true') {
                        $('#datatable').DataTable().ajax.reload(null,false);
                        swal({
                            icon: "success",
                            title: "BERHASIL!",
                            text: response.messages,
                            timer: 1500,
                            buttons: false,
                        });
                    }else{
                        swal({
                            icon: "error",
                            title: "GAGAL!",
                            text: response.messages,
                            buttons: true,
                        });

                    }
                },
                error: function (xhr) {
                	swal("Oops...", "Terjadi Kesalahan", "error");
                    
                }
            });
        }
    });
});

$('body').on('click', '.btn-show', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').hide();

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response);
        }
    });

    $('#modal').modal('show');
});
