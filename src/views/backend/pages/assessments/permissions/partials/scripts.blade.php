<script>
    let group_select = $('#group_id')
    group_select.select2({
        placeholder: 'Please choose group',
        ajax: {
            url: '{{ route('admin.assessments.group_permissions.filter') }}',
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
