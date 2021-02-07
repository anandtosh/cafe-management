<script>
    $.fn.singleById =function (options) {
            var settings={
                success:function(){},
                error: function (){},
                beforeSend: function (){},
            };
            settings = $.extend(settings, options);
            $.ajax({
                type: "post",
                url: "{{url('admin/ajax')}}",
                beforeSend: function (){
                // add code here if you want to do something before sending the form
                settings.beforeSend();
                },
                data: {
                    _token:'{{csrf_token()}}',
                    column:'id',
                    value:$(this).val(),
                    function:'useid',
                    path:$(this).data('path'),
                    },
                dataType: "Json",
                success: function(response){
                    settings.success(response);
                },
        });
    };
    $.fn.inputAjax =function(options){
        var settings={
                success:function(){},
                error: function (){},
                beforeSend: function (){},
            };
            settings = $.extend(settings, options);
            $.ajax({
                type: "post",
                url: "{{url('admin/ajax')}}",
                beforeSend: function (){
                // add code here if you want to do something before sending the form
                settings.beforeSend();
                },
                data: {
                    _token:'{{csrf_token()}}',
                    column:$(this).data('column'),
                    value:$(this).val(),
                    function:$(this).data('function'),
                    path:$(this).data('path'),
                    },
                dataType: "Json",
                success: function(response){
                    settings.success(response);
                },
    });
    }
</script>
