@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">requestwork {{ $requestwork->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/requestworks') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/requestworks/' . $requestwork->id . '/edit') }}" title="Edit requestwork"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/requestworks' . '/' . $requestwork->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete requestwork"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $requestwork->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $requestwork->name }} </td></tr><tr><th> Charge Retailer </th><td> {{ $requestwork->charge_retailer }} </td></tr><tr><th> Charge Customer </th><td> {{ $requestwork->charge_customer }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
