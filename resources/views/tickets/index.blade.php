@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tickets</div>
                    <div class="card-body">
                    @can('create_tickets')
                        <a href="{{ url('/admin/tickets/create') }}" class="btn btn-success btn-sm" title="Add New ticket">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    @endcan
                        <form method="GET" action="{{ url('/admin/tickets') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Description</th><th>Attatchment</th><th>Status</th><th>Admin Remark</th><th>Admin Attatchment</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tickets as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->description }}</td><td>{{ $item->attatchment }}</td><td>{{ $item->status }}</td><td>{{ $item->admin_remark }}</td><td>{{ $item->admin_attatchment }}</td>
                                        <td>
                                        @can('view_tickets')
                                            <a href="{{ url('/admin/tickets/' . $item->id) }}" title="View ticket"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        @endcan
                                        @can('edit_tickets')
                                            <a href="{{ url('/admin/tickets/' . $item->id . '/edit') }}" title="Edit ticket"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        @endcan
                                        @can('delete_tickets')
                                            <form method="POST" action="{{ url('/admin/tickets' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete ticket"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $tickets->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
