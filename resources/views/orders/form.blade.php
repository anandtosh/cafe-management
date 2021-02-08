<div class="row">

    <div class="col-md-6">

<div class="form-group row {{ $errors->has('requestwork_id') ? 'is-validated' : ''}}">
    <label for="requestwork_id" class="col-4 col-form-label col-form-sm">{{ 'Work Name' }}</label>
    <div class="col-8">
    <select class="select2-ajax form-control"
    name="requestwork_id" id="requestwork_id"
data-route="{{url('admin/ajax')}}"
data-method="post"
data-function="select2relation"
data-path="requestworks"
data-column="name"
data-filtercol=""
data-filterval=""
required>
    @isset($order->requestwork_id)
    <option value="{{$order->requestwork_id}}">{{$order->requestwork->name}}</option>
        @endisset
</select>

    </div>
    {!! $errors->first('requestwork_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('customer_name') ? 'is-validated' : ''}}">
    <label for="customer_name" class="col-4 col-form-label col-form-sm">{{ 'Customer Name' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        {{-- <i class="fa fa-circle"></i> --}}
            <i class="fas fa-user    "></i>
        </div>
    </div>
        <input class="form-control " name="customer_name" type="text" id="customer_name" value="{{ isset($order->customer_name) ? $order->customer_name : ''}}" required>
</div>
</div>
</div>

<div class="form-group row {{ $errors->has('applied_on') ? 'is-validated' : ''}}">
    <label for="applied_on" class="col-4 col-form-label col-form-sm">{{ 'Applied On' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        {{-- <i class="fa fa-circle"></i> --}}
        <i class="fas fa-calendar    "></i>
        </div>
    </div>
        <input class="form-control" readonly name="applied_on" type="date" id="applied_on" value="{{ isset($order->applied_on) ? $order->applied_on : Carbon\Carbon::now()->toDateString()}}" required>
</div>

    </div>

    {!! $errors->first('applied_on', '<p class="help-block">:message</p>') !!}
</div>


@hasrole('Admin')

<div class="form-group row {{ $errors->has('resolved_on') ? 'is-validated' : ''}}">
    <label for="resolved_on" class="col-4 col-form-label col-form-sm">{{ 'Resolved On' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="resolved_on" type="date" id="resolved_on" value="{{ isset($order->resolved_on) ? $order->resolved_on : ''}}" >
</div>

    </div>
    {!! $errors->first('resolved_on', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('current_status') ? 'is-validated' : ''}}">
    <label for="current_status" class="col-4 col-form-label col-form-sm">{{ 'Current Status' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div>
        <input class="form-control" name="current_status" type="text" id="current_status" value="{{ isset($order->current_status) ? $order->current_status : ''}}" >
</div>

    </div>
    {!! $errors->first('current_status', '<p class="help-block">:message</p>') !!}
</div>


@endhasrole
<div class="form-group row {{ $errors->has('description') ? 'is-validated' : ''}}">
    <label for="description" class="col-4 col-form-label col-form-sm">{{ 'Description' }}</label>
    <div class="col-8">

<textarea class="form-control form-control-sm" rows="3" name="description" type="textarea" id="description" required>{{ isset($order->description) ? $order->description : ''}}</textarea>

    </div>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('uploads') ? 'is-validated' : ''}}">
    <label for="uploads" class="col-4 col-form-label col-form-sm">{{ 'Uploads' }}</label>
    <div class="col-8">
    {{-- <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <i class="fa fa-circle"></i>
        </div>
    </div> --}}
        <input class="form-control form-control-file" name="uploads" type="file" id="uploads" value="{{ isset($order->uploads) ? $order->uploads : ''}}" >
{{-- </div> --}}
        <p class="help-block">Please choose pdf files only,<br><strong>Maximum 15MB allowed</strong></p>
    </div>
    {!! $errors->first('uploads', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('amount') ? 'is-validated' : ''}}">
    <label for="amount" class="col-4 col-form-label col-form-sm">{{ 'Amount' }}</label>
    <div class="col-8">
    <div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <div class="input-group-text">
        {{-- <i class="fa fa-circle"></i> --}}
            <i class="fas fa-rupee-sign    "></i>
        </div>
    </div>
        <input class="form-control " readonly name="amount" type="number" id="amount" value="{{ isset($order->amount) ? $order->amount : ''}}" required>
</div>


    </div>
    {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row {{ $errors->has('pin') ? 'is-validated' : ''}}">
    <label for="pin" class="col-4 col-form-label col-form-sm">{{ 'Inquiry PIN' }}</label>
    <div class="col-8">
    <input class="form-control" readonly name="pin" type="number" id="pin" value="{{ isset($order->pin) ? $order->pin : rand(1000,9999)}}">
    </div>
</div>

{{-- <div class="form-group row {{ $errors->has('franchise_id') ? 'is-validated' : ''}}">
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

<div class="form-group row {{ $errors->has('fiscal_id') ? 'is-validated' : ''}}">
    <label for="fiscal_id" class="col-4 col-form-label col-form-sm">{{ 'Fiscal Id' }}</label>
    <div class="col-8">
    <select class="select2-ajax form-control"
    name="fiscal_id"
data-route="{{url('admin/ajax')}}"
data-method="post"
data-function="select2relation"
data-path="configs"
data-column="name"
data-filtercol=""
data-filterval=""
required>
</select>

    </div>
    {!! $errors->first('fiscal_id', '<p class="help-block">:message</p>') !!}
</div> --}}


<div class="form-group d-none row {{ $errors->has('fiscal_id') ? 'is-validated' : ''}}">
    <label for="fiscal_id" class="col-4 col-form-label col-form-sm">{{ 'Fiscal' }}</label>
    <div class="col-8">
    <select class="form-control"
    name="fiscal_id">

@if($formMode === 'create')
<option value="{{session('fiscal_id')}}">{{session('fiscal')}}</option>
@else
    <option value="{{$order->fiscal_id}}">{{$order->fiscal->name}}</option>
@endif
</select>
    </div>
    {!! $errors->first('fiscal_id', '<p class="help-block">:message</p>') !!}
</div>

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
@isset($expense->franchise_id)
    <option value="{{$expense->franchise_id}}">{{$expense->franchise->name}}</option>
@endisset

@endif
</select>
    </div>
    {!! $errors->first('franchise_id', '<p class="help-block">:message</p>') !!}
</div>




<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

</div>
</div>

@section('adminlte_endjs')
    <script>
        $(function () {
            $('#requestwork_id').change(function (e) {
                e.preventDefault();
                $('#requestwork_id').singleById({
                    success: function(response){
                        $('#amount').val(response.charge_retailer);
                    }
                })
            });
        });
    </script>
@endsection
