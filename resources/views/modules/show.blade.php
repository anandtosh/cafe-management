@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
          

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Module {{ $module->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/developer/modules') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/developer/modules/' . $module->id . '/edit') }}" title="Edit Module"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('developer/modules' . '/' . $module->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Module" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $module->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $module->name }} </td></tr><tr><th> Model </th><td> {{ $module->model }} </td></tr><tr><th> Controller </th><td> {{ $module->controller }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
