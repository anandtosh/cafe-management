<div class="row">
    <div class="col-md-4 border border-danger">
        <p class="title font-weight-bold font-italic">Customer & Work Details</p>
        <div class="form-group row {{ $errors->has('client_id') ? 'is-validated' : ''}}">
            <label for="client_id" class="col-4 col-form-label col-form-sm">{{ 'Cash/Client' }}</label>
            <div class="col-8">
            <select class="select2-ajax form-control"
            name="client_id"
        data-route="{{url('admin/ajax')}}"
        data-method="post"
        data-function="select2relation"
        data-path="ledgers"
        data-column="name"
        data-filtercol="franchise_id"
            data-filterval="{{session('franchise_id')}}"
        >
        @isset($sale->client_id)<option value="{{$sale->client_id}}">{{$sale->client->name}}</option>@endisset
        </select>

            </div>
            {!! $errors->first('client_id', '<p class="help-block">:message</p>') !!}
        </div>


        <div class="form-group row {{ $errors->has('work_id') ? 'is-validated' : ''}}">
            <label for="work_id" class="col-4 col-form-label col-form-sm">{{ 'Work Id' }}</label>
            <div class="col-8">
            <select class="select2-ajax form-control"
            name="work_id"
        data-route="{{url('admin/ajax')}}"
        data-method="post"
        data-function="select2relation"
        data-path="works"
        data-column="name"
        data-filtercol=""
        data-filterval=""
        required>
        @isset($sale->work_id)<option value="{{$sale->work_id}}">{{$sale->work->name}}</option>@endisset
        </select>

            </div>
            {!! $errors->first('work_id', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group row {{ $errors->has('name') ? 'is-validated' : ''}}">
            <label for="name" class="col-4 col-form-label col-form-sm">{{ 'Name' }}</label>
            <div class="col-8">
            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <i class="fa fa-user"></i>
                </div>
            </div>
                <input class="form-control" name="name" type="text" id="name" value="{{ isset($sale->name) ? $sale->name : ''}}" >
        </div>

            </div>
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group row {{ $errors->has('contact_number') ? 'is-validated' : ''}}">
            <label for="contact_number" class="col-4 col-form-label col-form-sm">{{ 'Contact Number' }}</label>
            <div class="col-8">
            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <i class="fa fa-phone"></i>
                </div>
            </div>
                <input class="form-control" name="contact_number" type="text" id="contact_number" value="{{ isset($sale->contact_number) ? $sale->contact_number : ''}}" >
        </div>

            </div>
            {!! $errors->first('contact_number', '<p class="help-block">:message</p>') !!}
        </div>

    </div>
    <div class="col-md-4 border border-danger">
        <p class="title font-weight-bold font-italic">Pricing Details</p>



        <div class="form-group row {{ $errors->has('qty') ? 'is-validated' : ''}}">
            <label for="qty" class="col-4 col-form-label col-form-sm">{{ 'Qty' }}</label>
            <div class="col-8">
            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <i class="fa fa-list-ol"></i>
                </div>
            </div>
                <input min="1" class="form-control" name="qty" type="number" id="qty" value="{{ isset($sale->qty) ? $sale->qty : '1'}}" >
        </div>

            </div>
            {!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group row {{ $errors->has('rate') ? 'is-validated' : ''}}">
            <label for="rate" class="col-4 col-form-label col-form-sm">{{ 'Rate' }}</label>
            <div class="col-8">
            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <i class="fas fa-rupee-sign    "></i>

                </div>
            </div>
                <input class="form-control" name="rate" type="number" id="rate" value="{{ isset($sale->rate) ? $sale->rate : ''}}" >
        </div>

            </div>
            {!! $errors->first('rate', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group row {{ $errors->has('bank_fee') ? 'is-validated' : ''}}">
            <label for="bank_fee" class="col-4 col-form-label col-form-sm">{{ 'Bank Fee' }}</label>
            <div class="col-8">
            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <div class="input-group-text">
                {{-- <i class="fa fa-circle"></i> --}}
                <i class="fas fa-university    "></i>
                </div>
            </div>
                <input class="form-control" name="bank_fee" type="number" id="bank_fee" value="{{ isset($sale->bank_fee) ? $sale->bank_fee : ''}}" >
        </div>

            </div>
            {!! $errors->first('bank_fee', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group row {{ $errors->has('bank_fee_extra_charge') ? 'is-validated' : ''}}">
            <label for="bank_fee_extra_charge" class="col-4 col-form-label col-form-sm">{{ 'Bank Fee Extra Charge' }}</label>
            <div class="col-8">
            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <div class="input-group-text">
                {{-- <i class="fa fa-circle"></i> --}}
                <i class="fas fa-rupee-sign    "></i>
                </div>
            </div>
                <input class="form-control" name="bank_fee_extra_charge" type="number" id="bank_fee_extra_charge" value="{{ isset($sale->bank_fee_extra_charge) ? $sale->bank_fee_extra_charge : ''}}" >
        </div>

            </div>
            {!! $errors->first('bank_fee_extra_charge', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4 border border-danger">
        <p class="title font-weight-bold font-italic">Billing Details</p>
        <div class="form-group row {{ $errors->has('total') ? 'is-validated' : ''}}">
            <label for="total" class="col-4 col-form-label col-form-sm">{{ 'Total' }}</label>
            <div class="col-8">
            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <div class="input-group-text">
                {{-- <i class="fa fa-circle"></i> --}}
                <i class="fas fa-coins    "></i>
                </div>
            </div>
                <input readonly class="form-control" name="total" type="number" id="total" value="{{ isset($sale->total) ? $sale->total : ''}}" >
        </div>

            </div>
            {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group row {{ $errors->has('receivable') ? 'is-validated' : ''}}">
            <label for="receivable" class="col-4 col-form-label col-form-sm">{{ 'Receivable' }}</label>
            <div class="col-8">
            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <div class="input-group-text">
                {{-- <i class="fa fa-circle"></i> --}}
                <i class="fas fa-wallet    "></i>
                </div>
            </div>
                <input class="form-control" name="receivable" type="number" id="receivable" value="{{ isset($sale->receivable) ? $sale->receivable : ''}}" >
        </div>

            </div>
            {!! $errors->first('receivable', '<p class="help-block">:message</p>') !!}
        </div>

        <p class="title font-weight-bold font-italic">Received From Customer</p>
        {{-- <hr> --}}

        <div class="form-group row">
            <label for="ledger_id" class="col-4 col-form-label">Account</label>
            <div class="col-8">
              <select required id="ledger_id" name="ledger_id" class="custom-select">
                @foreach (App\Ledger::where('fiscal_id',session('fiscal_id'))->franchise()->get() as $item)
                    <option {{ isset($sale->receipts) && $sale->receipts->count() ? $sale->receipts->first()->ledger_id == $item->id?'selected':'' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                @endforeach

              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="amount" class="col-4 col-form-label">Amt. Received</label>
            <div class="col-8">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-rupee-sign"></i>
                  </div>
                </div>
                <input required min="0"id="amount" value="{{ isset($sale->receipts) && $sale->receipts->count() ? $sale->receipts->first()->amount : ''}}" name="amount" type="number" class="form-control ">
              </div>
            </div>
          </div>










        {{-- <div class="form-group row {{ $errors->has('ledger_id') ? 'is-validated' : ''}}">
            <label for="ledger_id" class="col-4 col-form-label col-form-sm">{{ 'Account' }}</label>
            <div class="col-8">
                <select class="custom-select custom-select-sm" name="ledger_id" id="ledger_id">              >
                    @foreach(App\Ledger::where('franchise_id',session('franchise_id'))->fiscal()->get() as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row {{ $errors->has('amount') ? 'is-validated' : ''}}">
            <label for="amount" class="col-4 col-form-label col-form-sm">{{ 'Amount' }}</label>
            <div class="col-8">
                <input class="form-control form-control-sm" name="amount" type="number" id="amount">
            </div>
        </div> --}}


    </div>
</div>







{{-- not displaying part --}}


<div class="form-group d-none row {{ $errors->has('fiscal_id') ? 'is-validated' : ''}}">
    <label for="fiscal_id" class="col-4 col-form-label col-form-sm">{{ 'Fiscal' }}</label>
    <div class="col-8">
    <select class="form-control"
    name="fiscal_id">

@if($formMode === 'create')
<option value="{{session('fiscal_id')}}">{{session('fiscal')}}</option>
@else
    <option value="{{$sale->fiscal_id}}">{{$sale->fiscal->name}}</option>
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
@isset($sale->franchise_id)
    <option value="{{$sale->franchise_id}}">{{$sale->franchise->name}}</option>
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
    <option value="{{$sale->user_id}}">{{$sale->user->name}}</option>

@endif
</select>
    </div>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


{{-- end not displaying part --}}

<div class="row pt-3">
    <div class="col-md-4">


<div class="form-group row">
  <label class="col-form-label col-4" for="status">Status</label>
  <div class="col-8">
  <select class="form-control" name="status" id="status" required>
    <option value="">--NONE--</option>
    <option value="NEW">NEW</option>
    <option value="DONE">DONE</option>
    <option value="DELIVERED">DELIVERED</option>
  </select>
  </div>
</div>

    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-form-label col-4" for="received">Payment Status</label>
            <div class="col-8">
            <select readonly="true" class="form-control" name="received" id="received" required>
              <option value="">--NONE--</option>
              <option value="DONE">DONE</option>
              <option value="CREDIT">CREDIT</option>
              <option value="EXTRA">EXTRA</option>
            </select>
            </div>
          </div>

    </div>
    <div class="col-md-4">

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

</div>
</div>

@section('adminlte_endjs')
    <script>
        $(function () {
            function totalcalc(){
                var total=0;
                var qty = $('#qty').val();
                var rate = $('#rate').val();
                var bankfee = $('#bank_fee').val();
                var bankextra = $('#bank_fee_extra_charge').val();
                total=qty*(1*rate+1*bankfee)+1*bankextra;
                $('#total').val(total);
                $('#receivable').val(total);
                // $('#amount').attr('max',total);

            }

            // $('#receivable').keyup(function (e) {
            //     $('#amount').attr('max',this.value);
            // });

            $('#amount').keyup(function (e) {
                e.preventDefault();
                if(1*this.value<1*$('#receivable').val()){
                    $('#received').val('CREDIT');
                }else if(1*this.value>1*$('#receivable').val()){
                    $('#received').val('EXTRA');
                }else{
                    $('#received').val('DONE');
                }
            });

            $('#qty, #rate, #bank_fee, #bank_fee_extra_charge').change(function (e) {
                e.preventDefault();
                totalcalc();
            });

            $('[name="client_id"]').change(function (e) {
                e.preventDefault();
                $(this).singleById({
                    success: function(response){
                        $('#name').val(response.name);
                        $('#contact_number').val(response.contact);
                    }
                });
            });
            $('[name="work_id"]').change(function (e) {
                e.preventDefault();
                $(this).singleById({
                    success: function(response){
                        if(response.charge)
                        {
                            $('#rate').val(response.charge);
                            $('#rate').attr('readonly',true);
                        }else
                        {
                            $('#rate').val('');
                            $('#rate').attr('readonly',false);
                        }
                        if(response.bank_charge)
                        {
                            $('#bank_fee').val(response.bank_charge);
                            $('#bank_fee').attr('readonly',true);
                        }else
                        {
                            $('#bank_fee').val('');
                            $('#bank_fee').attr('readonly',false);
                        }
                        totalcalc();
                        if(response.min_days*response.max_days>1){
                            $('#status').val('NEW');
                        }else{
                            $('#status').val('DELIVERED');
                        }
                    }
                });
            });
        });
    </script>
@endsection
