<div class="form-group row {{ $errors->has('description') ? 'is-validated' : ''}}">
    <label for="description" class="col-4 col-form-label col-form-sm">{{ 'Description' }}</label>
    <div class="col-8">

<textarea class="form-control form-control-sm" rows="3" name="description" type="textarea" id="description" required>{{ isset($ticket->description) ? $ticket->description : ''}}</textarea>

    </div>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('attatchment') ? 'is-validated' : ''}}">
    <label for="attatchment" class="col-4 col-form-label col-form-sm">{{ 'Attatchment' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    {{-- <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div> --}}
        <input class="form-control-file" name="attatchment" type="file" id="attatchment" value="{{ isset($ticket->attatchment) ? $ticket->attatchment : ''}}" >
</div>

    </div>
    {!! $errors->first('attatchment', '<p class="help-block">:message</p>') !!}
</div>

<input class="form-control" name="status" type="hidden" id="status" value="{{ isset($ticket->status) ? $ticket->status : 'PENDING'}}" >

@hasanyrole('Developer|Admin')

<div class="form-group row {{ $errors->has('admin_remark') ? 'is-validated' : ''}}">
    <label for="admin_remark" class="col-4 col-form-label col-form-sm">{{ 'Admin Remark' }}</label>
    <div class="col-8">

<textarea class="form-control form-control-sm" rows="3" name="admin_remark" type="textarea" id="admin_remark" >{{ isset($ticket->admin_remark) ? $ticket->admin_remark : ''}}</textarea>

    </div>
    {!! $errors->first('admin_remark', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('admin_attatchment') ? 'is-validated' : ''}}">
    <label for="admin_attatchment" class="col-4 col-form-label col-form-sm">{{ 'Admin Attatchment' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    {{-- <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div> --}}
        <input class="form-control-file" name="admin_attatchment" type="file" id="admin_attatchment" value="{{ isset($ticket->admin_attatchment) ? $ticket->admin_attatchment : ''}}" >
</div>

    </div>
    {!! $errors->first('admin_attatchment', '<p class="help-block">:message</p>') !!}
</div>

@endhasanyrole


<div class="form-group d-none row {{ $errors->has('franchise_id') ? 'is-validated' : ''}}">
    <label for="franchise_id" class="col-4 col-form-label col-form-sm">{{ 'Franchise' }}</label>
    <div class="col-8">
    <select class="form-control"
    name="franchise_id">
@if($formMode === 'create')
@if(session('franchise'))
    <option value="{{session('franchise_id')}}">{{session('franchise')}}</option>
@endif
@else
@isset($ticket->franchise_id)
    <option value="{{$ticket->franchise_id}}">{{$ticket->franchise->name}}</option>
@endisset

@endif
</select>
    </div>
    {!! $errors->first('franchise_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group d-none row {{ $errors->has('user_id') ? 'is-validated' : ''}}">
    <label for="user_id" class="col-4 col-form-label col-form-sm">{{ 'User' }}</label>
    <div class="col-8">
    <select class="form-control"
    name="user_id">
@if($formMode === 'create')
@auth
    <option value="{{Auth()->user()->id}}">{{Auth()->user()->name}}</option>
@endauth
@else
    <option value="{{$ticket->user_id}}">{{$ticket->user->name}}</option>

@endif
</select>
    </div>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
