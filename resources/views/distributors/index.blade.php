@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">distributors</div>
                    <div class="card-body">
                    @can('create_distributors')
                        <a href="{{ url('/admin/distributors/create') }}" class="btn btn-success btn-sm" title="Add New franchise">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    @endcan
                        <form method="GET" action="{{ url('/admin/distributors') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact Person</th>
                                        <th>Contact Number</th>
                                        <th>Email</th>
                                        <th>Docs Pdf</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($distributors as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->contact_person }}</td>
                                        <td>{{ $item->contact_number }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td><a class="btn btn-sm btn-primary {{isset($item->docs_pdf)?'':'disabled'}}"  href="{{ url('storage/'.$item->docs_pdf) }}" role="button"><i class="fas fa-file-pdf    "></i> Render</a> </td>
                                        <td>
                                        @can('view_distributors')
                                            <a href="{{ url('/admin/distributors/' . $item->id) }}" title="View franchise"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        @endcan
                                        @can('edit_distributors')
                                            <a href="{{ url('/admin/distributors/' . $item->id . '/edit') }}" title="Edit franchise"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        @endcan
                                        @can('delete_distributors')
                                            <form method="POST" action="{{ url('/admin/distributors' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete franchise"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $distributors->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
