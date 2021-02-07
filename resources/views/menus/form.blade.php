<div class="form-group {{ $errors->has('header') ? 'has-error' : ''}}">
    <label for="header" class="control-label">{{ 'Header' }}</label>
    <input class="form-control" name="header" type="text" id="header" value="{{ isset($menu->header) ? $menu->header : ''}}" >
    {!! $errors->first('header', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($menu->title) ? $menu->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('url') ? 'has-error' : ''}}">
    <label for="url" class="control-label">{{ 'Url' }}</label>
    <input class="form-control" name="url" type="text" id="url" value="{{ isset($menu->url) ? $menu->url : ''}}" >
    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('can') ? 'has-error' : ''}}">
    <label for="can" class="control-label">{{ 'Can' }}</label>
    <input class="form-control" name="can" type="text" id="can" value="{{ isset($menu->can) ? $menu->can : ''}}" >
    {!! $errors->first('can', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">
    <label for="icon" class="control-label">{{ 'Icon' }}</label>
    <input class="form-control" name="icon" type="text" id="icon" value="{{ isset($menu->icon) ? $menu->icon : ''}}" >
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('label') ? 'has-error' : ''}}">
    <label for="label" class="control-label">{{ 'Label' }}</label>
    <input class="form-control" name="label" type="text" id="label" value="{{ isset($menu->label) ? $menu->label : ''}}" >
    {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('label_color') ? 'has-error' : ''}}">
    <label for="label_color" class="control-label">{{ 'Label Color' }}</label>
    <input class="form-control" name="label_color" type="text" id="label_color" value="{{ isset($menu->label_color) ? $menu->label_color : ''}}" >
    {!! $errors->first('label_color', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('submenu') ? 'has-error' : ''}}">
    <label for="submenu" class="control-label">{{ 'Submenu' }}</label>
    <input class="form-control" name="submenu" type="text" id="submenu" value="{{ isset($menu->submenu) ? $menu->submenu : ''}}" >
    {!! $errors->first('submenu', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    <label for="is_active" class="control-label">{{ 'Is Active' }}</label>
    <div class="radio">
    <label><input name="is_active" type="radio" value="1" {{ (isset($menu) && 1 == $menu->is_active) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="is_active" type="radio" value="0" @if (isset($menu)) {{ (0 == $menu->is_active) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
