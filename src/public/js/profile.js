$('.change-password').on('click', function () {
    $.ajax({
        url: $(this).attr('data-remote'),
        type: 'PUT',
        data: {
            old_password: $('#old_password').val(),
            password: $('#password').val(),
            password_confirmation: $('#password_confirmation').val(),
        },
        success: function (response) {
            if (response.code === 202) {
                toastr.success(response.message)
                $('#old_password').removeClass('is-invalid');
                $('.old_password').html('');
                $('#password').removeClass('is-invalid');
                $('.password').html('');
                $('#password_confirmation').removeClass('is-invalid');
                $('.password_confirmation').html('');
            } else if (response.code === 422) {
                if (response.message.old_password) {
                    $('#old_password').addClass('is-invalid');
                    $('.old_password').html(response.message.old_password[0]);
                } else {
                    $('#old_password').removeClass('is-invalid');
                    $('.old_password').html('');
                }
                if (response.message.password) {
                    $('#password').addClass('is-invalid');
                    $('.password').html(response.message.password[0]);
                } else {
                    $('#password').removeClass('is-invalid');
                    $('.password').html('');
                }
                if (response.message.password_confirmation) {
                    $('#password_confirmation').addClass('is-invalid');
                    $('.password_confirmation').html(response.message.password_confirmation[0]);
                } else {
                    $('#password_confirmation').removeClass('is-invalid');
                    $('.password_confirmation').html('');
                }
                toastr.warning('Some field is missing')
            } else {
                toastr.error(response.message)
            }
        }
    })
})

$('.update-info').on('click', function () {
    $.ajax({
        url: $(this).attr('data-remote'),
        type: 'PUT',
        data: {
            name: $('#name').val(),
        },
        success: function (response) {
            if (response.code === 202) {
                $('#name').removeClass('is-invalid');
                $('.name').html(response.data.name);
                toastr.success(response.message)
            } else if (response.code === 422) {
                if (response.message.name) {
                    $('#name').addClass('is-invalid');
                    $('.name').html(response.message.name[0]);
                }
                toastr.warning('Some field is missing')
            } else {
                toastr.error(response.message)
            }
        }
    })
});
