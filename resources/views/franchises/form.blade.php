<div class="form-group row {{ $errors->has('name') ? 'is-validated' : ''}}">
    <label for="name" class="col-4 col-form-label col-form-sm">{{ 'Name' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-id-card" aria-hidden="true"></i>
        </div>
    </div>
        <input class="form-control" name="name" type="text" id="name" value="{{ isset($franchise->name) ? $franchise->name : ''}}" required>
</div>

    </div>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('address') ? 'is-validated' : ''}}">
    <label for="address" class="col-4 col-form-label col-form-sm">{{ 'Address' }}</label>
    <div class="col-8">

<textarea class="form-control form-control-sm" rows="3" name="address" type="textarea" id="address" required>{{ isset($franchise->address) ? $franchise->address : ''}}</textarea>

    </div>
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('contact_person') ? 'is-validated' : ''}}">
    <label for="contact_person" class="col-4 col-form-label col-form-sm">{{ 'Contact Person' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-id-card" aria-hidden="true"></i>
        </div>
    </div>
        <input class="form-control" name="contact_person" type="text" id="contact_person" value="{{ isset($franchise->contact_person) ? $franchise->contact_person : ''}}" >
</div>

    </div>
    {!! $errors->first('contact_person', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('contact_number') ? 'is-validated' : ''}}">
    <label for="contact_number" class="col-4 col-form-label col-form-sm">{{ 'Contact Number' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fas fa-phone    "></i>
        </div>
    </div>
        <input class="form-control" name="contact_number" type="text" id="contact_number" value="{{ isset($franchise->contact_number) ? $franchise->contact_number : ''}}" required>
</div>

    </div>
    {!! $errors->first('contact_number', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('email') ? 'is-validated' : ''}}">
    <label for="email" class="col-4 col-form-label col-form-sm">{{ 'Email' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-envelope" aria-hidden="true"></i>
        </div>
    </div>
        <input class="form-control" name="email" type="text" id="email" value="{{ isset($franchise->email) ? $franchise->email : ''}}">
</div>

    </div>
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('docs_pdf') ? 'is-validated' : ''}}">
    <label for="docs_pdf" class="col-4 col-form-label col-form-sm">{{ 'Docs Pdf' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fas fa-file-pdf    "></i>
        </div>
    </div>
        <input class="form-control" name="docs_pdf" type="file" id="docs_pdf" value="{{ isset($franchise->docs_pdf) ? $franchise->docs_pdf : ''}}">
</div>

    </div>
    {!! $errors->first('docs_pdf', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('credit_limit') ? 'is-validated' : ''}}">
    <label for="credit_limit" class="col-4 col-form-label col-form-sm">{{ 'Credit Limit' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fas fa-rupee-sign    "></i>
        </div>
    </div>
        <input class="form-control" name="credit_limit" type="number" min="0" step="0.01" id="credit_limit" value="{{ isset($franchise->credit_limit) ? $franchise->credit_limit : ''}}" required>
</div>

    </div>
    {!! $errors->first('credit_limit', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('opening') ? 'is-validated' : ''}}">
    <label for="opening" class="col-4 col-form-label col-form-sm">{{ 'Opening Balance' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fas fa-rupee-sign    "></i>
        </div>
    </div>
        <input class="form-control" name="opening" type="number" min="0" step="0.01" id="opening" value="{{ isset($franchise->opening) ? $franchise->opening : ''}}" required>
</div>

    </div>
    {!! $errors->first('opening', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
