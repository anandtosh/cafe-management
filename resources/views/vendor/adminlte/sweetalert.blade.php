<script>
    $(document).ready(function(){
    @if(session('warning'))
        Swal.fire({
            title:'Something Missed!',
            text:'{{session('warning')}}',
            icon:'warning',
            timer:3500,
            toast:true,
            position:'top-end'
        });
    @endif
    @if(session('success'))
        Swal.fire({
            title:'Good job!',
            text:'{{session('success')}}',
            icon:'success',
            timer:3500,
            toast:true,
            position:'top-end'
        });
    @endif
    @if(session('info'))
        Swal.fire({
            title:'Look There!',
            text:'{{session('info')}}',
            icon:'info',
            timer:3500,
            toast:true,
            position:'top-end'
        });
    @endif
    @if(session('question'))
        Swal.fire({
            title:'You Have To Look!',
            text:'{{session('question')}}',
            icon:'question',
            timer:3500,
            toast:true,
            position:'top-end'
        });
        @endif
        @if(session('error'))
        Swal.fire({
            title:'Error!',
            text:'{{session('error')}}',
            icon:'error',
            toast:false,
        });
    @endif
    });

    $('.swalconfirm').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this !",
            type: "warning",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true
        }).then((isConfirm) => {
            if (isConfirm.value) form.submit();
        });
    });
    $('.swalsave').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        swal.fire({
            title: "Are you sure?",
            text: "You will not be able undo this !",
            type: "info",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Save it!",
            closeOnConfirm: true
        }).then((isConfirm) => {
            if (isConfirm.value) form.submit();
        });
    });
    </script>
