<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($role->name) ? $role->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('guard_name') ? 'has-error' : ''}}">
    <label for="guard_name" class="control-label">{{ 'Guard Name' }}</label>
    <input class="form-control" name="guard_name" type="text" id="guard_name" value="{{ isset($role->guard_name) ? $role->guard_name : 'web'}}" readonly >
    {!! $errors->first('guard_name', '<p class="help-block">:message</p>') !!}
</div>

<table class="table table-bordered">
<tbody>
@foreach ($permissions as $item)
@if ($loop->iteration%5==1)
    <tr>
@endif
<td>
<label><h6>{{$item['name']}}</h6></label>
<input type="checkbox" class="checkbox" name="item[{{$item['name']}}]"
{{ $formMode === 'edit' ? ($checked->contains($item['name'])?"checked":"") : "" }}>
</td>
@if ($loop->iteration%5==0)
</tr>
@endif
@endforeach
</table>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
