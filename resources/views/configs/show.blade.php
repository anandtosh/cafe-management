@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">config {{ $config->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/configs') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/configs/' . $config->id . '/edit') }}" title="Edit config"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/configs' . '/' . $config->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete config"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $config->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $config->name }} </td></tr><tr><th> Type </th><td> {{ $config->type }} </td></tr><tr><th> Description </th><td> {{ $config->description }} </td></tr><tr><th> Active </th><td> {{ $config->active }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
