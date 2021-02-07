<div class="row"><div class="col-md-6">

<div class="form-group row {{ $errors->has('name') ? 'is-validated' : ''}}">
    <label for="name" class="col-4 col-form-label col-form-sm">{{ 'Name' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="name" type="text" id="name" value="{{ isset($ledger->name) ? $ledger->name : ''}}" required>
</div>

    </div>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('contact') ? 'is-validated' : ''}}">
    <label for="contact" class="col-4 col-form-label col-form-sm">{{ 'Contact' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input required class="form-control" name="contact" type="text" id="contact" value="{{ isset($ledger->contact) ? $ledger->contact : ''}}" >
</div>

    </div>
    {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('address') ? 'is-validated' : ''}}">
    <label for="address" class="col-4 col-form-label col-form-sm">{{ 'Address' }}</label>
    <div class="col-8">

<textarea required class="form-control form-control-sm" rows="3" name="address" type="textarea" id="address" >{{ isset($ledger->address) ? $ledger->address : ''}}</textarea>

    </div>
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('bank_ac_no') ? 'is-validated' : ''}}">
    <label for="bank_ac_no" class="col-4 col-form-label col-form-sm">{{ 'Bank Ac No' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="bank_ac_no" type="text" id="bank_ac_no" value="{{ isset($ledger->bank_ac_no) ? $ledger->bank_ac_no : ''}}" >
</div>

    </div>
    {!! $errors->first('bank_ac_no', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('bank_ifsc') ? 'is-validated' : ''}}">
    <label for="bank_ifsc" class="col-4 col-form-label col-form-sm">{{ 'Bank Ifsc' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="bank_ifsc" type="text" id="bank_ifsc" value="{{ isset($ledger->bank_ifsc) ? $ledger->bank_ifsc : ''}}" >
</div>

    </div>
    {!! $errors->first('bank_ifsc', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('bank_branch') ? 'is-validated' : ''}}">
    <label for="bank_branch" class="col-4 col-form-label col-form-sm">{{ 'Bank Branch' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="bank_branch" type="text" id="bank_branch" value="{{ isset($ledger->bank_branch) ? $ledger->bank_branch : ''}}" >
</div>

    </div>
    {!! $errors->first('bank_branch', '<p class="help-block">:message</p>') !!}
</div>


</div>
<div class="col-md-6">

<div class="form-group row {{ $errors->has('group_id') ? 'is-validated' : ''}}">
    <label for="group_id" class="col-4 col-form-label col-form-sm">{{ 'Group' }}</label>
    <div class="col-8">
    <select class="select2-ajax form-control"
    name="group_id"
data-route="{{url('admin/ajax')}}"
data-method="post"
data-function="select2relation"
data-path="configs"
data-column="name"
data-filtercol="type"
data-filterval="LEDGER GROUP"
required>
@isset($ledger)
    <option value="{{$ledger->group_id}}">{{$ledger->group->name}}</option>
    @endisset
</select>

    </div>
    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('fiscal_id') ? 'is-validated' : ''}}">
    <label for="fiscal_id" class="col-4 col-form-label col-form-sm">{{ 'Fiscal' }}</label>
    <div class="col-8">
    <select class="form-control"
    name="fiscal_id">

@if($formMode === 'create')
<option value="{{session('fiscal_id')}}">{{session('fiscal')}}</option>
@else
    <option value="{{$ledger->fiscal_id}}">{{$ledger->fiscal->name}}</option>
@endif
</select>
    </div>
    {!! $errors->first('fiscal_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('franchise_id') ? 'is-validated' : ''}}">
    <label for="franchise_id" class="col-4 col-form-label col-form-sm">{{ 'Franchise' }}</label>
    <div class="col-8">
    <select class="form-control"
    name="franchise_id">
@if($formMode === 'create')
@if(session('franchise'))
    <option value="{{session('franchise_id')}}">{{session('franchise')}}</option>
@endif
@else
@isset($ledger->franchise_id)
    <option value="{{$ledger->franchise_id}}">{{$ledger->franchise->name}}</option>
@endisset

@endif
</select>
    </div>
    {!! $errors->first('franchise_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('user_id') ? 'is-validated' : ''}}">
    <label for="user_id" class="col-4 col-form-label col-form-sm">{{ 'User' }}</label>
    <div class="col-8">
    <select class="form-control"
    name="user_id">
@if($formMode === 'create')
@auth
    <option value="{{Auth()->user()->id}}">{{Auth()->user()->name}}</option>
@endauth
@else
    <option value="{{$ledger->user_id}}">{{$ledger->user->name}}</option>

@endif
</select>
    </div>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>



<div class="offset-4 form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

</div></div>
