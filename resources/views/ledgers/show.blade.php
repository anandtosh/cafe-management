@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ledger {{ $ledger->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/ledgers') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/ledgers/' . $ledger->id . '/edit') }}" title="Edit ledger"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/ledgers' . '/' . $ledger->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete ledger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $ledger->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $ledger->name }} </td></tr><tr><th> Contact </th><td> {{ $ledger->contact }} </td></tr><tr><th> Address </th><td> {{ $ledger->address }} </td></tr><tr><th> Bank Ac No </th><td> {{ $ledger->bank_ac_no }} </td></tr><tr><th> Bank Ifsc </th><td> {{ $ledger->bank_ifsc }} </td></tr><tr><th> Bank Branch </th><td> {{ $ledger->bank_branch }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
