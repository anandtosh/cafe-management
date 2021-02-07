@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">order {{ $order->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/orders') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        {{-- <a href="{{ url('/admin/orders/' . $order->id . '/edit') }}" title="Edit order"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/orders' . '/' . $order->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete order"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form> --}}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $order->id }}</td>
                                    </tr>
                                    <tr><th> Applied On </th><td> {{ $order->applied_on }} </td></tr>
                                    <tr><th> Resolved On </th><td> {{ $order->resolved_on }} </td></tr>
                                    <tr><th> Current Status </th><td> {{ $order->current_status }} </td></tr>
                                    <tr><th> Description </th><td> {{ $order->description }} </td></tr>
                                    <tr><th> Uploads </th><td><a class="btn btn-sm btn-info" href="{{ Storage::url($order->uploads) }}">View</a></td></tr>
                                    <tr><th> Response File </th><td><a class="btn btn-sm btn-info" href="{{ Storage::url($order->admin_upload) }}">View</a></td></tr>
                                    <tr><th> Amount </th><td> {{ $order->amount }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
