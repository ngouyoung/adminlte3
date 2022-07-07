<script>
    let currency_select = $('#currency_id')
    currency_select.select2({
        placeholder: 'Please choose currency',
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

    let category_select = $('#category_id')
    category_select.select2({
        placeholder: 'Please choose category',
        ajax: {
            url: '{{ route('admin.configurations.categories.filter') }}',
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

    let slot_select = $('#slot_id')
    slot_select.select2({
        placeholder: 'Please choose slot',
        ajax: {
            url: '{{ route('admin.configurations.slots.filter') }}',
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
