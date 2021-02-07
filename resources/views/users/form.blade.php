<div class="form-group row">
    <label class="col-4">Franchise</label>
    <div class="col-8">

        @foreach(\App\Franchise::all() as $item)
        <div class="custom-control custom-radio custom-control-inline">
        <input name="franchise_id" id="franchise_id_{{$loop->iteration}}" type="radio" class="custom-control-input" value="{{$item->id}}" @isset($user->franchise_id) {{$user->franchise_id==$item->id?'checked':''}} @endisset>
        <label for="franchise_id_{{$loop->iteration}}" class="custom-control-label">{{$item->name}}</label>
    </div>
        @endforeach

    </div>
  </div>
  <div class="form-group row">
    <label for="role" class="col-4 col-form-label">Role</label>
    <div class="col-8">
      <select id="role" class="custom-select select2" name="role[]" id="role" multiple required="required">
        @isset($roles)
            @foreach($roles as $role)
            <option value="{{$role->name}}" @isset($assigned) {{$assigned->contains($role->name)?'selected':''}} @endisset>{{$role->name}}</option>
            @endforeach
        @endisset
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="name" class="col-4 col-form-label">Name</label>
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div>
        <input id="name" name="name" placeholder="e.g. Rahul Shah" type="text" class="form-control" required="required" value="{{ isset($user->name) ? $user->name : ''}}">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4 col-form-label">E-Mail Id</label>
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fas fa-mail-bulk    "></i>
          </div>
        </div>
        <input id="email" name="email" placeholder="e.g. some@example.com" type="text" class="form-control" required="required" value="{{ isset($user->email) ? $user->email : ''}}">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-4 col-form-label">Password</label>
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-lock"></i>
          </div>
        </div>
        <input id="password" name="password" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="password_confirmation" class="col-4 col-form-label">Confirm Password</label>
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-lock"></i>
          </div>
        </div>
        <input id="password_confirmation" name="password_confirmation" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="primary_contact" class="col-4 col-form-label">Primary Contact</label>
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-phone"></i>
          </div>
        </div>
        <input id="primary_contact" name="primary_contact" type="text" class="form-control" value="{{ isset($user->primary_contact) ? $user->primary_contact : ''}}">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="alternate_contact" class="col-4 col-form-label">Alternate Contact</label>
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-phone-square"></i>
          </div>
        </div>
        <input id="alternate_contact" name="alternate_contact" type="text" class="form-control" value="{{ isset($user->alternate_contact) ? $user->alternate_contact : ''}}">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="address" class="col-4 col-form-label">Address</label>
    <div class="col-8">
      <textarea id="address" name="address" cols="40" rows="3" class="form-control" >{{ isset($user->address) ? $user->address : ''}}</textarea>
    </div>
  </div>
  {{-- <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Create User</button>
    </div>
  </div> --}}


    {{--

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
    </div> --}}

<div class="offset-4 col-8 form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
@section('adminlte_endjs')
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection
