<script>
    $('input[name="expired_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10),
        locale: {
            format: 'DD/MM/Y'
        }
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });

    $('input[name="imported_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10),
        locale: {
            format: 'DD/MM/Y'
        }
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });

    let product_select = $('#product_id')
    product_select.select2({
        placeholder: 'Please choose product',
        width: '100%',
        ajax: {
            url: '{{ route('admin.configurations.products.filter') }}',
            data: function (params) {
                return {
                    keyword: params.term,
                    page: params.page
                }
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.data,
                    pagination: {
                        more: (params.page * 10) < data.total
                    }
                };
            }
        }
    })

    let supplier_select = $('#supplier_id')
    supplier_select.select2({
        placeholder: 'Please choose supplier',
        width: '100%',
        ajax: {
            url: '{{ route('admin.configurations.suppliers.filter') }}',
            data: function (params) {
                return {
                    keyword: params.term,
                    page: params.page
                }
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.data,
                    pagination: {
                        more: (params.page * 10) < data.total
                    }
                };
            }
        }
    })

    let currency_select = $('#currency_id')
    currency_select.select2({
        placeholder: 'Please choose supplier',
        width: '100%',
        ajax: {
            url: '{{ route('admin.configurations.currencies.filter') }}',
            data: function (params) {
                return {
                    keyword: params.term,
                    page: params.page
                }
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.data,
                    pagination: {
                        more: (params.page * 10) < data.total
                    }
                };
            }
        }
    })
</script>
