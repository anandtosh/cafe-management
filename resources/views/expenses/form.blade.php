<div class="row">
    <div class="col-md-6">

        <div class="form-group row {{ $errors->has('type') ? 'is-validated' : ''}}">
            <label for="type" class="col-4 col-form-label col-form-sm">{{ 'Type' }}</label>
            <div class="col-8">
            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <i class="fa fa-circle"></i>
                </div>
            </div>
                {{-- <input class="form-control" name="type" type="text" id="type" value="{{ isset($expense->type) ? $expense->type : ''}}" > --}}
                <select name="type" id="type" class="custom-select">
                    @foreach (App\Config::where('type','EXPENSE TYPE')->get() as $item)
                        <option value="{{$item->name}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            </div>
            {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group row {{ $errors->has('description') ? 'is-validated' : ''}}">
            <label for="description" class="col-4 col-form-label col-form-sm">{{ 'Description' }}</label>
            <div class="col-8">
            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <i class="fa fa-circle"></i>
                </div>
            </div>
                <input class="form-control" name="description" type="text" id="description" value="{{ isset($expense->description) ? $expense->description : ''}}" >
        </div>

            </div>
            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group row {{ $errors->has('amount') ? 'is-validated' : ''}}">
            <label for="amount" class="col-4 col-form-label col-form-sm">{{ 'Amount' }}</label>
            <div class="col-8">
            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <i class="fa fa-circle"></i>
                </div>
            </div>
                <input class="form-control" name="amount" type="number" id="amount" value="{{ isset($expense->amount) ? $expense->amount : ''}}" >
        </div>

            </div>
            {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
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
        data-filtercol="type"
        data-filterval="FISCAL YEAR"
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
            <option value="{{$expense->fiscal_id}}">{{$expense->fiscal->name}}</option>
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


