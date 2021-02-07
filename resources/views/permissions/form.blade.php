<div class="form-group  {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($permission->name) ? $permission->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('guard_name') ? 'has-error' : ''}}">
    <label for="guard_name" class="control-label">{{ 'Guard Name' }}</label>
    <input class="form-control" name="guard_name" type="text" id="guard_name" value="{{ isset($permission->guard_name) ? $permission->guard_name : ''}}" >
    {!! $errors->first('guard_name', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
{{-- @section('adminlte_endjs')
    <script>
        $('.name').change(function (e) {
            e.preventDefault();
            $(this).singleById({
                success: function (response) {
                    alert(response.name);
                 }
            })
        });
    </script>
@endsection --}}
