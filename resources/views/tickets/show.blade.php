@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ticket {{ $ticket->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/tickets') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/tickets/' . $ticket->id . '/edit') }}" title="Edit ticket"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/tickets' . '/' . $ticket->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete ticket"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $ticket->id }}</td>
                                    </tr>
                                    <tr><th> Description </th><td> {{ $ticket->description }} </td></tr><tr><th> Attatchment </th><td> {{ $ticket->attatchment }} </td></tr><tr><th> Status </th><td> {{ $ticket->status }} </td></tr><tr><th> Admin Remark </th><td> {{ $ticket->admin_remark }} </td></tr><tr><th> Admin Attatchment </th><td> {{ $ticket->admin_attatchment }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
