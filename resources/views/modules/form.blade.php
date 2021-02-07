<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($module->name) ? $module->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
<div class="row">
    <div class="col-md-2">Field Name</div>
    <div class="col-md-2">Type</div>
    <div class="col-md-2">Length</div>
    <div class="col-md-1">Nullable</div>
    <div class="col-md-1">Default</div>
    <div class="col-md-2">Actions</div>
</div>
<div class="container fieldcontainer">
@if(($formMode==='edit') ? $skeletons->isEmpty():true)

<div class="row fields">
<div class="col-md-2"><input  class="form-control" name="field[1][field]" required></div>
<div class="col-md-2"><input class="form-control fieldtype" name="field[1][type]" required></div>
<div class="col-md-2"><input class="form-control" name="field[1][length]"></div>
<div class="col-md-1"><input type="checkbox" class="form-control" name="field[1][nullable]"></div>
<div class="col-md-1"><input class="form-control" name="field[1][default]"></div>
<div class="col-md-2"></div>
</div>

@else
@foreach ($skeletons as $skeleton)
    <div class="row fields">
    <div class="col-md-2"><input value="{{$skeleton->field}}"  class="form-control" name="field[{{$loop->iteration}}][field]" required></div>
    <div class="col-md-2"><input value="{{$skeleton->type}}" class="form-control fieldtype" name="field[{{$loop->iteration}}][type]" required></div>
    <div class="col-md-2"><input value="{{$skeleton->length}}" class="form-control" name="field[{{$loop->iteration}}][length]"></div>
    <div class="col-md-1"><input {{$skeleton->nullable?'checked':''}} type="checkbox" class="form-control" name="field[{{$loop->iteration}}][nullable]"></div>
    <div class="col-md-1"><input class="form-control" name="field[{{$loop->iteration}}][default]"></div>
    <div class="col-md-2"><a href="#" class="btn btn-info btn-sm remove_field">Remove</a></div>
    </div>
@endforeach

@endif
</div>
</div>
<div class="form-group">
    <input class="btn btn-info addmore" type="button" id="addmore" value="Add More">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('vendor/jquery/jquery-ui.min.css') }}">
@endsection

@section('adminlte_endjs')

<script src="{{ asset('vendor/jquery/jquery-ui.min.js') }}"></script>
<script type="text/javascript">
    var availableTags=['password','file','string','char','varchar','date','datetime','time','timestamp','text','mediumtext','longtext','json','jsonb','binary','integer','bigint','mediumint','tinyint','smallint','boolean','decimal','double','float','enum#options={"technology": "Technology", "tips": "Tips", "health": "Health"}'];
    $( function() {

        $( ".fieldtype" ).autocomplete({
        source: availableTags
        });
    });
    $(document).ready(function() {
        var max_fields      = 150; //maximum input boxes allowed
        var wrapper   		= $(".fieldcontainer"); //Fields wrapper
        var add_button      = $(".addmore"); //Add button ID

        var x = 101; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="row fields">'+
'<div class="col-md-2"><input  class="form-control" name="field['+x+'][field]" required></div>'+
'<div class="col-md-2"><input class="form-control fieldtype" name="field['+x+'][type]" required></div>'+
'<div class="col-md-2"><input class="form-control" name="field['+x+'][length]"></div>'+
'<div class="col-md-1"><input type="checkbox" class="form-control" name="field['+x+'][nullable]"></div>'+
'<div class="col-md-1"><input class="form-control" name="field['+x+'][default]"></div>'+
'<div class="col-md-2"><a href="#" class="btn btn-info btn-sm remove_field">Remove</a></div>'+
'</div>'); //add input box
    $(wrapper).find('.fieldtype').autocomplete({
        source: availableTags
        });
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
        });
    })
</script>
@endsection
