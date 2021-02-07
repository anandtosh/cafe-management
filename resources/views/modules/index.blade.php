@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Modules</div>
                    <div class="card-body">
                    @can('create_modules')
                        <a href="{{ url('/developer/modules/create') }}" class="btn btn-success btn-sm" title="Add New Module">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    @endcan
                        <form method="GET" action="{{ url('/developer/modules') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Name</th><th>Model</th><th>Controller</th><th>Migration</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($modules as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if(!$item->model)
                                            <a href="{{url("/developer/modules/". $item->id.'/createmodel')}}" title="View Module"><button class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Create</button></a>
                                            @else
                                            <a href="{{url("/developer/modules/". $item->id.'/editmodel')}}" title="View Module"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Edit</button></a>
                                            <form method="POST" action="{{ url('/developer/modules/deletemodule') }}" accept-charset="UTF-8" style="display:inline">
                                                <input type="hidden" value="{{$item->id}}" name="id">
                                                <input type="hidden" value="model" name="filetype">
                                                {{ csrf_field('PUT') }}
                                                <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete Model"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$item->controller)
                                            <a href="{{url("/developer/modules/". $item->id.'/createcontroller')}}" title="View Module"><button class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Create</button></a>
                                            @else
                                            <a href="{{url("/developer/modules/". $item->id.'/editcontroller')}}" title="View Module"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Edit</button></a>
                                            <form method="POST" action="{{ url('/developer/modules/deletemodule') }}" accept-charset="UTF-8" style="display:inline">
                                                <input type="hidden" value="{{$item->id}}" name="id">
                                                <input type="hidden" value="controller" name="filetype">
                                                {{ csrf_field('PUT') }}
                                                <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete Controller"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$item->migration)
                                            <a href="{{url("/developer/modules/". $item->id.'/createmigration')}}" title="View Module"><button class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Create</button></a>
                                            @else
                                            <a href="{{url("/developer/modules/". $item->id.'/editmigration')}}" title="View Module"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Edit</button></a>
                                            <form method="POST" action="{{ url('/developer/modules/deletemodule') }}" accept-charset="UTF-8" style="display:inline">
                                                <input type="hidden" value="{{$item->id}}" name="id">
                                                <input type="hidden" value="migration" name="filetype">
                                                {{ csrf_field('PUT') }}
                                                <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete Migration"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            @endif
                                        </td>
                                        <td>
                                        @can('view_modules')
                                            <a href="{{ url('/developer/modules/' . $item->id) }}" title="View Module"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        @endcan
                                        @can('edit_modules')
                                            <a href="{{ url('/developer/modules/' . $item->id . '/edit') }}" title="Edit Module"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        @endcan
                                        @can('delete_modules')
                                            <form method="POST" action="{{ url('/developer/modules' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Module" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $modules->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
