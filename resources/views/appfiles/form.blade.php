<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($appfile->name) ? $appfile->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('path') ? 'has-error' : ''}}">
    <label for="path" class="control-label">{{ 'Path' }}</label>
    <input class="form-control" name="path" type="text" id="path" value="{{ isset($appfile->path) ? $appfile->path : ''}}" >
    {!! $errors->first('path', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('filename') ? 'has-error' : ''}}">
    <label for="filename" class="control-label">{{ 'Filename' }}</label>
    <input class="form-control" name="filename" type="text" id="filename" value="{{ isset($appfile->filename) ? $appfile->filename : ''}}" >
    {!! $errors->first('filename', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('extension') ? 'has-error' : ''}}">
    <label for="extension" class="control-label">{{ 'Extension' }}</label>
    <input class="form-control" name="extension" type="text" id="extension" value="{{ isset($appfile->extension) ? $appfile->extension : ''}}" >
    {!! $errors->first('extension', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($appfile->type) ? $appfile->type : ''}}" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
