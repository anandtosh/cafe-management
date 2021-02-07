<div class="form-group {{ $errors->has('command') ? 'has-error' : ''}}">
    <label for="command" class="control-label">{{ 'Command' }}</label>
    <input class="form-control" name="command" type="text" id="command" value="{{ isset($appcommand->command) ? $appcommand->command : ''}}" required>
    {!! $errors->first('command', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($appcommand->description) ? $appcommand->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('parameters') ? 'has-error' : ''}}">
    <label for="parameters" class="control-label">{{ 'Parameters' }}</label>
    <textarea class="form-control" rows="5" name="parameters" type="textarea" id="parameters" >{{ isset($appcommand->parameters) ? $appcommand->parameters : ''}}</textarea>
    {!! $errors->first('parameters', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
