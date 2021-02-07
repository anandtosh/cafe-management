<div class="form-group row {{ $errors->has('name') ? 'is-validated' : ''}}">
    <label for="name" class="col-4 col-form-label col-form-sm">{{ 'Name' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="name" type="text" id="name" value="{{ isset($config->name) ? $config->name : ''}}" required>
</div>

    </div>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('type') ? 'is-validated' : ''}}">
    <label for="type" class="col-4 col-form-label col-form-sm">{{ 'Type' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    {{-- <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="type" type="text" id="type" value="{{ isset($config->type) ? $config->type : ''}}" required> --}}
    <select class="form-control form-control-sm" name="type" id="type" required>
        <option value="LEDGER GROUP" @isset($config->type) {{$config->type=='LEDGER GROUP'?'selected':''}}@endisset>LEDGER GROUP</option>
        <option value="FISCAL YEAR" @isset($config->type) {{$config->type=='FISCAL YEAR'?'selected':''}}@endisset>FISCAL YEAR</option>
        <option value="EXPENSE TYPE" @isset($config->type) {{$config->type=='EXPENSE TYPE'?'selected':''}}@endisset>EXPENSE TYPE</option>
    </select>
</div>

    </div>
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('description') ? 'is-validated' : ''}}">
    <label for="description" class="col-4 col-form-label col-form-sm">{{ 'Description' }}</label>
    <div class="col-8">

<textarea class="form-control form-control-sm" rows="3" name="description" type="textarea" id="description" >{{ isset($config->description) ? $config->description : ''}}</textarea>

    </div>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('active') ? 'is-validated' : ''}}">
    <label for="active" class="col-4 col-form-label col-form-sm">{{ 'Active' }}</label>
    <div class="col-8">
    <div class="custom-control custom-radio custom-control-inline">
    <input name="active" id="active_1" type="radio" class="custom-control-input" value="1" {{ (isset($config) && 1 == $config->active) ? 'checked' : '' }}>
    <label for="active_1" class="custom-control-label">Yes</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
    <input name="active" id="active_0" type="radio" class="custom-control-input" value="0" @if (isset($config)) {{ (0 == $config->active) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
    <label for="active_0" class="custom-control-label">No</label>
</div>

    </div>
    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
