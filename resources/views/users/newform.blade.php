
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="email" id="email" value="{{ isset($user->email) ? $user->email : ''}}" required>
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'Password' }}</label>
    <input class="form-control" name="password" type="password" id="password" required>
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
    <label for="password_confirmation" class="control-label">{{ 'Password Confirmation' }}</label>
    <input class="form-control" name="password_confirmation" type="password" id="password_confirmation" required>
    {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
  <label for="role">Role</label>
  <select class="form-control select2" name="role[]" id="role" multiple>
    @isset($roles)
        @foreach($roles as $role)
        <option value="{{$role->name}}" @isset($assigned) {{$assigned->contains($role->name)?'selected':''}} @endisset>{{$role->name}}</option>
        @endforeach
    @endisset
  </select>
</div>

@section('adminlte_endjs')
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection



<div class="form-group row {{ $errors->has('Gender') ? 'has-error' : ''}}">
    <label for="Gender" class="col-4 col-form-label col-form-sm">{{ 'Gender' }}</label>
    <div class="col-8">
    <select name="Gender" class="custom-select custom-select-sm" id="Gender" >
    @foreach (json_decode('{"m":"Male","f":"Female","o":"Other"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($profile->Gender) && $profile->Gender == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>

    </div>
    {!! $errors->first('Gender', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('father_name') ? 'has-error' : ''}}">
    <label for="father_name" class="col-4 col-form-label col-form-sm">{{ 'Father Name' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="father_name" type="text" id="father_name" value="{{ isset($profile->father_name) ? $profile->father_name : ''}}" >
</div>

    </div>
    {!! $errors->first('father_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('mother_name') ? 'has-error' : ''}}">
    <label for="mother_name" class="col-4 col-form-label col-form-sm">{{ 'Mother Name' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="mother_name" type="text" id="mother_name" value="{{ isset($profile->mother_name) ? $profile->mother_name : ''}}" >
</div>

    </div>
    {!! $errors->first('mother_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('dob') ? 'has-error' : ''}}">
    <label for="dob" class="col-4 col-form-label col-form-sm">{{ 'Dob' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="dob" type="date" id="dob" value="{{ isset($profile->dob) ? $profile->dob : ''}}" >
</div>

    </div>
    {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('contact') ? 'has-error' : ''}}">
    <label for="contact" class="col-4 col-form-label col-form-sm">{{ 'Contact' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="contact" type="text" id="contact" value="{{ isset($profile->contact) ? $profile->contact : ''}}" >
</div>

    </div>
    {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('alt_contact') ? 'has-error' : ''}}">
    <label for="alt_contact" class="col-4 col-form-label col-form-sm">{{ 'Alt Contact' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="alt_contact" type="text" id="alt_contact" value="{{ isset($profile->alt_contact) ? $profile->alt_contact : ''}}" >
</div>

    </div>
    {!! $errors->first('alt_contact', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="col-4 col-form-label col-form-sm">{{ 'Address' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="address" type="text" id="address" value="{{ isset($profile->address) ? $profile->address : ''}}" >
</div>

    </div>
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('city') ? 'has-error' : ''}}">
    <label for="city" class="col-4 col-form-label col-form-sm">{{ 'City' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="city" type="text" id="city" value="{{ isset($profile->city) ? $profile->city : ''}}" >
</div>

    </div>
    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('state') ? 'has-error' : ''}}">
    <label for="state" class="col-4 col-form-label col-form-sm">{{ 'State' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="state" type="text" id="state" value="{{ isset($profile->state) ? $profile->state : ''}}" >
</div>

    </div>
    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('country') ? 'has-error' : ''}}">
    <label for="country" class="col-4 col-form-label col-form-sm">{{ 'Country' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="country" type="text" id="country" value="{{ isset($profile->country) ? $profile->country : ''}}" >
</div>

    </div>
    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="col-4 col-form-label col-form-sm">{{ 'Image' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="image" type="file" id="image" value="{{ isset($profile->image) ? $profile->image : ''}}" >
</div>

    </div>
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-4 col-form-label col-form-sm">{{ 'User Id' }}</label>
    <div class="col-8">
    <select class="select2-ajax form-control"
    name="user_id"
data-route="{{url('admin/ajax')}}"
data-method="post"
data-function="select2relation"
data-path="users"
data-column="name"
data-filtercol=""
data-filterval=""
required>
</select>

    </div>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
