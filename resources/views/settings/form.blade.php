<div class="form-group {{ $errors->has('key') ? 'has-error' : ''}}">
    <label for="key" class="control-label">{{ 'Key' }}</label>
    <input class="form-control" name="key" type="text" id="key" value="{{ isset($setting->key) ? $setting->key : ''}}" required>
    {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
    <label for="value" class="control-label">{{ 'Value' }}</label>
    <input class="form-control" name="value" type="text" id="value" value="{{ isset($setting->value) ? $setting->value : ''}}" >
    {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    <label for="active" class="control-label">{{ 'Active' }}</label>
    <div class="radio">
    <label><input name="active" type="radio" value="1" {{ (isset($setting) && 1 == $setting->active) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="active" type="radio" value="0" @if (isset($setting)) {{ (0 == $setting->active) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

