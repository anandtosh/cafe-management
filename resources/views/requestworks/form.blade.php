<div class="row">
    <div class="col-md-6">
        <div class="form-group row {{ $errors->has('name') ? 'is-validated' : ''}}">
            <label for="name" class="col-4 col-form-label col-form-sm">{{ 'Name' }}</label>
            <div class="col-8">
            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <i class="fa fa-circle"></i>
                </div>
            </div>
                <input class="form-control" name="name" type="text" id="name" value="{{ isset($requestwork->name) ? $requestwork->name : ''}}" required>
        </div>

            </div>
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group row {{ $errors->has('charge_retailer') ? 'is-validated' : ''}}">
            <label for="charge_retailer" class="col-4 col-form-label col-form-sm">{{ 'Charge Retailer' }}</label>
            <div class="col-8">
            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-rupee-sign    "></i>
                </div>
            </div>
                <input class="form-control" name="charge_retailer" type="number" id="charge_retailer" value="{{ isset($requestwork->charge_retailer) ? $requestwork->charge_retailer : ''}}" >
        </div>

            </div>
            {!! $errors->first('charge_retailer', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group row {{ $errors->has('charge_customer') ? 'is-validated' : ''}}">
            <label for="charge_customer" class="col-4 col-form-label col-form-sm">{{ 'Charge Customer' }}</label>
            <div class="col-8">
            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <i class="fas fa-rupee-sign    "></i>
                </div>
            </div>
                <input class="form-control" name="charge_customer" type="number" id="charge_customer" value="{{ isset($requestwork->charge_customer) ? $requestwork->charge_customer : ''}}" >
        </div>

            </div>
            {!! $errors->first('charge_customer', '<p class="help-block">:message</p>') !!}
        </div>



        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
        </div>



    </div>
</div>

