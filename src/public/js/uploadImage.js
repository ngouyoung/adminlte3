var $uploadCrop,
    tempFilename,
    rawImg,
    imageId;

function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.upload-demo').addClass('ready');
            $('#cropImagePop').modal('show');
            rawImg = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        swal("Sorry - you're browser doesn't support the FileReader API");
    }
}

function uploadDemo(w = 200, h = 200) {
    return $('#upload-demo').croppie({
        viewport: {
            width: w,
            height: h,
        },
        enforceBoundary: false,
        enableExif: true
    });
}

function optionCrop(w = 200, h = 200, bc = '#ffffff', f = 'jpeg', t = 'base64') {
    return {
        type: t,
        format: f,
        backgroundColor: bc,
        size: "original",
        quality: 1
    }
}


$("#changeImage").on('click', function (e) {
    $('.item-img').trigger('click');
});

$uploadCrop = uploadDemo()

$('#cropImagePop').on('shown.bs.modal', function () {
    $uploadCrop.croppie('bind', {
        url: rawImg
    }).then(function () {
        console.log('jQuery bind complete');
    });
});

$('.item-img').on('change', function (e) {
    const extension = $('#image').val().split('.').pop().toLowerCase();
    if (/^(jpg|jpeg|png|gif|bmp)$/.test(extension)) {
        imageId = $(this).data('id');
        tempFilename = $(this).val();
        $('#cancelCropBtn').data('id', imageId);
        readFile(this);
    } else {
        toastr.warning('Please input file image.');
    }
});

$('#cropImageBtn').on('click', function (ev) {
    $uploadCrop.croppie('result', optionCrop()).then(function (resp) {
        $.ajax({
            url: $('#cropImageBtn').attr('data-remote'),
            type: 'PUT',
            data: {
                avatar: resp
            },
            success: (response) => {
                if (response.code === 202) {
                    $('#avatar').attr('src', resp);
                    $('#sidebar-avatar').attr('src', resp);
                    $('#cropImagePop').modal('hide');
                    toastr.success(response.message);
                }
            }
        })
    });
});
