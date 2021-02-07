@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">work {{ $work->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/works') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/works/' . $work->id . '/edit') }}" title="Edit work"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/works' . '/' . $work->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete work"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $work->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $work->name }} </td></tr><tr><th> Charge </th><td> {{ $work->charge }} </td></tr><tr><th> Bank Charge </th><td> {{ $work->bank_charge }} </td></tr><tr><th> Max Discount Percent </th><td> {{ $work->max_discount_percent }} </td></tr><tr><th> Min Days </th><td> {{ $work->min_days }} </td></tr><tr><th> Max Days </th><td> {{ $work->max_days }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
