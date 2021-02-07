@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">franchise {{ $franchise->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/franchises') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/franchises/' . $franchise->id . '/edit') }}" title="Edit franchise"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/franchises' . '/' . $franchise->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete franchise"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $franchise->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $franchise->name }} </td></tr><tr><th> Address </th><td> {{ $franchise->address }} </td></tr><tr><th> Contact Person </th><td> {{ $franchise->contact_person }} </td></tr><tr><th> Contact Number </th><td> {{ $franchise->contact_number }} </td></tr><tr><th> Email </th><td> {{ $franchise->email }} </td></tr><tr><th> Docs Pdf </th><td> {{ $franchise->docs_pdf }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
