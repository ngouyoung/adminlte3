<script>
    var $uploadCrop,
        tempFilename,
        rawImg,
        imageId;

    $("#changeImage").on('click', function (e) {
        $('.item-img').trigger('click');
    });

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
            size: {width: w, height: h}
        }
    }

    function cropImagePop() {
        return $uploadCrop.croppie('bind', {
            url: rawImg
        }).then(function () {
            console.log('jQuery bind complete');
        });
    }

    $uploadCrop = uploadDemo()

    $('#cropImagePop').on('shown.bs.modal', function () {
        cropImagePop()
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
            $('#avatar').attr('src', resp);
            $('#image').val(resp);
            $('#cropImagePop').modal('hide');
        });
    });
</script>
