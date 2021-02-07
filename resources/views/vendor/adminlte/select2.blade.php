<script>
    $('select.select2').select2({width: '100%'});
    $('select.select2-ajax').each(function() {
        $(this).select2({
            width: '100%',
            ajax: {
                url: $(this).data('route'),
                method: $(this).data('method'),
                dataType:'json',
                data: function (params) {
                    var query = {
                        value: params.term,
                        column: $(this).data('column'),
                        path: $(this).data('path'),
                        function:$(this).data('function'),
                        _token:'{{csrf_token()}}',
                        filtercol:$(this).data('filtercol'),
                        filterval:$(this).data('filterval'),
                        
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
            }
        });

        $(this).on('select2:select',function(e){
            var data = e.params.data;
            if (data.id == '') {
                // "None" was selected. Clear all selected options
                $(this).val([]).trigger('change');
            } else {
                $(e.currentTarget).find("option[value='" + data.id + "']").attr('selected','selected');
            }
        });

        $(this).on('select2:unselect',function(e){
            var data = e.params.data;
            $(e.currentTarget).find("option[value='" + data.id + "']").attr('selected',false);
        });
    });
</script>