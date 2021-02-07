@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Appcommands</div>
                    <div class="card-body">
                    @can('create_appcommands')
                        <a href="{{ url('/developer/appcommands/create') }}" class="btn btn-success btn-sm" title="Add New appcommand">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    @endcan
                        <form method="GET" action="{{ url('/developer/appcommands') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Command</th><th>Description</th><th>Parameters</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($appcommands as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->command }}</td><td>{{ $item->description }}</td><td>{{ $item->parameters }}</td>
                                        <td>
                                        @can('view_appcommands')
                                            <a href="{{ url('/developer/appcommands/' . $item->id) }}" title="Run appcommand"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-right" aria-hidden="true"></i> Run</button></a>
                                        @endcan
                                        @can('edit_appcommands')
                                            <a href="{{ url('/developer/appcommands/' . $item->id . '/edit') }}" title="Edit appcommand"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        @endcan
                                        @can('delete_appcommands')
                                            <form method="POST" action="{{ url('/developer/appcommands' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete appcommand"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $appcommands->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
