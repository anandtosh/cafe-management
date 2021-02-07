<div class="form-group row {{ $errors->has('name') ? 'is-validated' : ''}}">
    <label for="name" class="col-4 col-form-label col-form-sm">{{ 'Name' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="name" type="text" id="name" value="{{ isset($work->name) ? $work->name : ''}}" required>
</div>

    </div>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('charge') ? 'is-validated' : ''}}">
    <label for="charge" class="col-4 col-form-label col-form-sm">{{ 'Charge' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="charge" type="number" id="charge" value="{{ isset($work->charge) ? $work->charge : ''}}" >
</div>

    </div>
    {!! $errors->first('charge', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('bank_charge') ? 'is-validated' : ''}}">
    <label for="bank_charge" class="col-4 col-form-label col-form-sm">{{ 'Bank Charge' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="bank_charge" type="number" id="bank_charge" value="{{ isset($work->bank_charge) ? $work->bank_charge : ''}}" >
</div>

    </div>
    {!! $errors->first('bank_charge', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('max_discount_percent') ? 'is-validated' : ''}}">
    <label for="max_discount_percent" class="col-4 col-form-label col-form-sm">{{ 'Max Discount Percent' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="max_discount_percent" type="number" id="max_discount_percent" value="{{ isset($work->max_discount_percent) ? $work->max_discount_percent : ''}}" >
</div>

    </div>
    {!! $errors->first('max_discount_percent', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('min_days') ? 'is-validated' : ''}}">
    <label for="min_days" class="col-4 col-form-label col-form-sm">{{ 'Min Days' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="min_days" type="number" id="min_days" value="{{ isset($work->min_days) ? $work->min_days : ''}}" required>
</div>

    </div>
    {!! $errors->first('min_days', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('max_days') ? 'is-validated' : ''}}">
    <label for="max_days" class="col-4 col-form-label col-form-sm">{{ 'Max Days' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="max_days" type="number" id="max_days" value="{{ isset($work->max_days) ? $work->max_days : ''}}" required>
</div>

    </div>
    {!! $errors->first('max_days', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
