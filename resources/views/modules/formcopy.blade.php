<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($module->name) ? $module->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('model') ? 'has-error' : ''}}">
    <label for="model" class="control-label">{{ 'Model' }}</label>
    <input class="form-control" name="model" type="text" id="model" value="{{ isset($module->model) ? $module->model : ''}}" >
    {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('controller') ? 'has-error' : ''}}">
    <label for="controller" class="control-label">{{ 'Controller' }}</label>
    <input class="form-control" name="controller" type="text" id="controller" value="{{ isset($module->controller) ? $module->controller : ''}}" >
    {!! $errors->first('controller', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('views') ? 'has-error' : ''}}">
    <label for="views" class="control-label">{{ 'Views' }}</label>
    <input class="form-control" name="views" type="text" id="views" value="{{ isset($module->views) ? $module->views : ''}}" >
    {!! $errors->first('views', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('migration') ? 'has-error' : ''}}">
    <label for="migration" class="control-label">{{ 'Migration' }}</label>
    <input class="form-control" name="migration" type="text" id="migration" value="{{ isset($module->migration) ? $module->migration : ''}}" >
    {!! $errors->first('migration', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('menu') ? 'has-error' : ''}}">
    <label for="menu" class="control-label">{{ 'Menu' }}</label>
    <input class="form-control" name="menu" type="text" id="menu" value="{{ isset($module->menu) ? $module->menu : ''}}" >
    {!! $errors->first('menu', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
