<div class="form-group row {{ $errors->has('amount') ? 'is-validated' : ''}}">
    <label for="amount" class="col-4 col-form-label col-form-sm">{{ 'Amount' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="amount" type="number" id="amount" value="{{ isset($recharge->amount) ? $recharge->amount : ''}}" required>
</div>

    </div>
    {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('franchise_id') ? 'is-validated' : ''}}">
    <label for="franchise_id" class="col-4 col-form-label col-form-sm">{{ 'Franchise Id' }}</label>
    <div class="col-8">
    <select class="select2-ajax form-control"
    name="franchise_id"
data-route="{{url('admin/ajax')}}"
data-method="post"
data-function="select2relation"
data-path="franchises"
data-column="name"
data-filtercol=""
data-filterval=""
required>
</select>

    </div>
    {!! $errors->first('franchise_id', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
