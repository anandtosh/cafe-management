@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">sale {{ $sale->id }}</div>
                    <div class="card-body">
                        <div class="d-print-none">
                        <a href="{{ url('/admin/sales') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/sales/' . $sale->id . '/edit') }}" title="Edit sale"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/sales' . '/' . $sale->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete sale"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>
                        </div>
                        <div class="row text-center border border-dark">
                            <div class="col-md-12">
                                <h2>{{session('franchise')}}</h2>
                                <h6>{{auth()->user()->franchise_id?App\Franchise::find(auth()->user()->franchise_id)->address:''}}</h6>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $sale->id }}</td><th>ID</th><td>{{ $sale->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $sale->name }} </td><th> Contact Number </th><td> {{ $sale->contact_number }} </td></tr>
                                    <tr><th> Date </th><td> {{ $sale->created_at->toDateString() }} </td><th> Work </th><td> {{ $sale->work->name }} </td></tr>
                                    <tr><th> Qty </th><td> {{ $sale->qty }} </td><th> Rate </th><td> {{ $sale->rate }} </td></tr>
                                    <tr><th> Bank Fee </th><td> {{ $sale->bank_fee }} </td><th> Bank Fee Extra Charge </th><td> {{ $sale->bank_fee_extra_charge }} </td></tr>
                                    <tr><th> Total </th><td> {{ $sale->total }} </td><th> Receivable </th><td> {{ $sale->receivable }} </td></tr>
                                    <tr><th> Status </th><td> {{ $sale->status }} </td><th> Payment Status </th><td> {{ $sale->received }} </td></tr>
                                </tbody>
                            </table>
                            <p class="d-print-none" >Amount Received</p>
                            <table class="table table-sm d-print-none">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Remark</th>
                                        <th>Amount</th>
                                        <th>Account</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sale->receipts as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $item->created_at->toDateString() }}</td>
                                            <td>{{$item->remark}}</td>
                                            <td>{{$item->amount}}</td>
                                            <td>{{$item->ledger->name}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p class="d-print-none">Status History</p>
                            <table class="table table-sm d-print-none">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Application Number</th>
                                        <th>Other Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	
                                    @foreach ($sale->statuses as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->created_at->toDateString() }}</td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->application_number}}</td>
                                            <td>{{$item->other_details}}</td>
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
