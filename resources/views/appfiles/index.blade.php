@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Appfiles</div>
                    <div class="card-body">
                    @can('create_appfiles')
                        <a href="{{ url('/developer/appfiles/create') }}" class="btn btn-success btn-sm" title="Add New appfile">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New File
                        </a>
                    @endcan
                        <form method="GET" action="{{ url('/developer/appfiles') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Name</th><th>Path</th><th>Filename</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($appfiles as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->path }}</td><td>{{ $item->filename }}</td>
                                        <td>
                                        @can('view_appfiles')
                                            <a href="{{ url('/developer/appfiles/' . $item->id) }}" title="Edit appfile"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Open Editor</button></a>
                                        @endcan
                                        @can('edit_appfiles')
                                            <a href="{{ url('/developer/appfiles/' . $item->id . '/edit') }}" title="Edit appfile config"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Configuration</button></a>
                                        @endcan
                                        @can('delete_appfiles')
                                            <form method="POST" action="{{ url('/developer/appfiles' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Remove appfile"><i class="fa fa-trash-o" aria-hidden="true"></i> Remove</button>
                                            </form>
                                        @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $appfiles->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
