@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
 

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Orders</div>
                    <div class="card-body">
                    @can('create_orders')
                        <a href="{{ url('/admin/orders/create') }}" class="btn btn-success btn-sm" title="Add New order">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    @endcan
                        <form method="GET" action="{{ url('/admin/orders') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            @hasrole('Admin')
                            <div class="form-group">
                                <select style="width: 150px" onchange="this.form.submit()" class="form-control" name="franchise" id="franchise">
                                    <option value="">--Franchise--</option>
                                    @foreach (App\Franchise::all() as $item)
                                        <option {{request('franchise')==$item->id?'selected':''}} value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endhasrole
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
                            <table class="table text-sm table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Applied On</th>
                                        <th>Applied By</th>
                                        <th>Work</th>
                                        <th>Current Status</th>
                                        <th>Description</th>
                                        {{-- <th>Uploads</th> --}}
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->applied_on }}</td>
                                        <td>{{ $item->franchise->name }}</td>
                                        <td>{{ $item->requestwork->name }}</td>
                                        <td>{{ $item->current_status }}</td>
                                        <td>{{ $item->description }}</td>
                                        {{-- <td>
                                        <a class="btn btn-sm btn-info" href="{{ Storage::url($item->uploads) }}">View</a>
                                        </td> --}}
                                        <td>{{ $item->amount }}</td>
                                        <td>
                                        @can('view_orders')
                                            <a href="{{ url('/admin/orders/' . $item->id) }}" title="View order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        @endcan
                                        {{-- @can('edit_orders')
                                            <a href="{{ url('/admin/orders/' . $item->id . '/edit') }}" title="Edit order"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        @endcan --}}
                                        @can('edit_orders')
                                        <a href="{{ url('/admin/orders/' . $item->id . '/edit') }}" title="Edit order"><button class="btn btn-primary btn-sm respond" data-id="{{$item->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Respond</button></a>
                                        @endcan
                                        @can('delete_orders')
                                            <form method="POST" action="{{ url('/admin/orders' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete order"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $orders->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                        <div class="modal fade" id="respond" tabindex="-1" role="dialog" aria-labelledby="respondid" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="POST" action="{{ url('/admin/orders/') }}" accept-charset="UTF-8" class="form-horizontal updateform" enctype="multipart/form-data">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h5 class="modal-title">Respond</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group row">
                                            <label for="resolved_on" class="col-4 col-form-label">Resolved On</label>
                                            <div class="col-8">
                                              <input readonly id="resolved_on" value="{{Carbon\Carbon::now()->toDateString()}}"
                                               name="resolved_on" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="admin_upload" class="col-4 col-form-label">File</label>
                                            <div class="col-8">
                                                <input readonly id="admin_upload"
                                                name="admin_upload" type="file" class="form-control-file">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('adminlte_endjs')
    <script>
        $(function () {
            $('.respond').click(function (e) {
                e.preventDefault();
                var path= $('.updateform').attr('action');
                $('.updateform').attr('action',path+'/'+$(this).data('id'));
                $('#respond').modal();
            });
        });
    </script>
@endsection
