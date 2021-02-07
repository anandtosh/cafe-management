@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Ledgers</div>
                    <div class="card-body">
                    @can('create_ledgers')
                        <a href="{{ url('/admin/ledgers/create') }}" class="btn btn-success btn-sm" title="Add New ledger">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    @endcan
                        <form method="GET" action="{{ url('/admin/ledgers') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Bank Ac No</th>
                                        <th>Bank Ifsc</th>
                                        <th>Bank Branch</th>
                                        <th>Dr.</th>
                                        <th>Cr.</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ledgers as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->contact }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->bank_ac_no }}</td>
                                        <td>{{ $item->bank_ifsc }}</td>
                                        <td>{{ $item->bank_branch }}</td>
                                        <td>{{ $item->sales->pluck('receivable')->sum() }}</td>
                                        <td>{{ $item->receipts->pluck('amount')->sum() }}</td>
                                        <td>
                                        @can('view_ledgers')
                                            <a href="{{ url('/admin/ledgers/' . $item->id) }}" title="View ledger"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        @endcan
                                        @can('edit_ledgers')
                                            <a href="{{ url('/admin/ledgers/' . $item->id . '/edit') }}" title="Edit ledger"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        @endcan
                                        @can('delete_ledgers')
                                            <form method="POST" action="{{ url('/admin/ledgers' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm swalconfirm" title="Delete ledger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $ledgers->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
