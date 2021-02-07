@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Configs</div>
                    <div class="card-body">
                    @can('create_configs')
                        <a href="{{ url('/admin/configs/create') }}" class="btn btn-success btn-sm" title="Add New config">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    @endcan
                        <form method="GET" action="{{ url('/admin/configs') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Name</th><th>Type</th><th>Description</th><th>Active</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($configs as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->type }}</td><td>{{ $item->description }}</td><td>{{ $item->active }}</td>
                                        <td>
                                        @can('view_configs')
                                            <a href="{{ url('/admin/configs/' . $item->id) }}" title="View config"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        @endcan
                                        @can('edit_configs')
                                            <a href="{{ url('/admin/configs/' . $item->id . '/edit') }}" title="Edit config"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        @endcan
                                        @can('delete_configs')
                                            <form method="POST" action="{{ url('/admin/configs' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete config"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $configs->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
