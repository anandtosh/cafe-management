@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sales</div>
                    <div class="card-body">
                    @can('create_sales')
                        <a href="{{ url('/admin/sales/create') }}" class="btn btn-success btn-sm" title="Add New sale">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    @endcan
                        <form method="GET" action="{{ url('/admin/sales') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="form-group">
                                <select onchange="this.form.submit()" class="form-control" name="status" id="status">
                                    <option value="">--STATUS--</option>
                                    <option {{request('status')=='NEW'?'selected':''}} value="NEW">NEW</option>
                                    <option {{request('status')=='DONE'?'selected':''}} value="DONE">DONE</option>
                                    <option {{request('status')=='DELIVERED'?'selected':''}} value="DELIVERED">DELIVERED</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select onchange="this.form.submit()" class="form-control" name="pstatus" id="pstatus">
                                    <option value="">--PAYMENT STATUS--</option>
                                    <option {{request('pstatus')=='DONE'?'selected':''}} value="DONE">DONE</option>
                                    <option {{request('pstatus')=='CREDIT'?'selected':''}} value="CREDIT">CREDIT</option>
                                    <option {{request('pstatus')=='EXTRA'?'selected':''}} value="EXTRA">EXTRA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select style="width: 150px" onchange="this.form.submit()" class="form-control" name="work" id="work">
                                    <option value="">--WORK--</option>
                                    @foreach (App\Work::all() as $item)
                                        <option {{request('work')==$item->id?'selected':''}} value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
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
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Work</th>
                                        <th>Total</th>
                                        <th>Received</th>
                                        <th>Balance</th>

                                        <th>Status</th>
                                        <th>Payment Status</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sales as $item)
                                    <tr class="
                                    @switch($item->status)
                                    @case('DONE') {{'table-warning'}} @break
                                    @case('NEW') {{'table-danger'}} @break
                                    @case('DELIVERED') {{'table-success'}} @break
                                    @endswitch">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->created_at->toDateString() }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->contact_number }}</td>
                                        <td>{{ Str::limit($item->work->name,20) }}</td>
                                        <td>{{ $item->receivable }}</td>
                                        <td>{{ $item->receipts->pluck('amount')->sum() }}</td>
                                        <td>{{ $item->receivable-$item->receipts->pluck('amount')->sum() }}</td>

                                        <td>
                                        <a data-name="{{ $item->name }}" data-id="{{$item->id}}" data-status="{{ $item->status }}" name="change_status" id="change_status" style="width: 100px" class="btn btn-sm btn-outline-dark chstatus" href="#" role="button">{{ $item->status }}</a>
                                        </td>
                                        <td>{{ $item->received }}</td>

                                        <td class="bg-white">

                                        <a data-amount="{{ $item->receivable-$item->receipts->pluck('amount')->sum() }}" data-name="{{$item->name}}" data-id="{{$item->id}}" title="Receive Amount" class="add_modal"><button class="btn btn-outline-success btn-sm"><i class="fas fa-rupee-sign    "></i></button></a>
                                        @can('view_sales')
                                            <a href="{{ url('/admin/sales/' . $item->id) }}" title="View sale"><button class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        @endcan
                                        @can('edit_sales')
                                            <a href="{{ url('/admin/sales/' . $item->id . '/edit') }}" title="Edit sale"><button class="btn btn-outline-primary btn-sm"><i class="fas fa-pencil-alt    "></i></button></a>
                                        @endcan

                                        <a data-contact="{{$item->contact_number}}" class="btn btn-sm btn-outline-success whatsapp_msg" href="#" role="button"> <i class="fab fa-whatsapp    "></i> </a>
                                        @can('delete_sales')
                                            <form method="POST" action="{{ url('/admin/sales' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-outline-danger btn-sm swalconfirm" title="Delete sale"><i class="fas fa-trash-alt    "></i></button>
                                            </form>
                                        @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $sales->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="addreceipt" tabindex="-1" role="dialog" aria-labelledby="addreceipttitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ url('/admin/receipt/sales') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title">Add Receipt</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="id" class="col-4 col-form-label">Sale ID</label>
                            <div class="col-8">
                              <input readonly id="id" name="id" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="name" class="col-4 col-form-label">Name</label>
                            <div class="col-8">
                              <input readonly id="name" name="name" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="amount" class="col-4 col-form-label">Amount*</label>
                            <div class="col-8">
                              <input id="amount" name="amount" type="number" class="form-control" required="required">
                            </div>
                          </div>
                            <input type="hidden" id="defaultamt">
                          <div class="form-group row">
                            <label for="ledger_id" class="col-4 col-form-label">Account*</label>
                            <div class="col-8">
                              <select id="ledger_id" name="ledger_id" class="custom-select" required="required">
                                @foreach (App\Ledger::where('fiscal_id',session('fiscal_id'))->franchise()->get() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="received" class="col-4 col-form-label">Payment Status</label>
                            <div class="col-8">
                              <select id="received" name="received" class="custom-select" required="required">
                                <option value="DONE">DONE</option>
                                <option value="CREDIT">CREDIT</option>
                                <option value="EXTRA">EXTRA</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="remark" class="col-4 col-form-label">Remark*</label>
                            <div class="col-8">
                              <input id="remark" name="remark" type="text" class="form-control" required="required">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-4 col-8">
                              {{-- <button name="submit" type="submit" class="btn btn-primary">Submit</button> --}}
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

        {{-- modal for status change --}}

        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#chstatus">
          Launch
        </button> --}}

        <!-- Modal -->
        <div class="modal fade" id="chstatus" tabindex="-1" role="dialog" aria-labelledby="chstatusid" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ url('/admin/status/sales') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title">Change Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="id" class="col-4 col-form-label">Sale ID</label>
                            <div class="col-8">
                              <input readonly id="cs_id" name="id" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="name" class="col-4 col-form-label">Name</label>
                            <div class="col-8">
                              <input readonly id="cs_name" name="name" type="text" class="form-control">
                            </div>
                          </div>

                        <div class="form-group row">
                            <label for="status" class="col-4 col-form-label">Status*</label>
                            <div class="col-8">
                              <select id="cs_status" name="status" class="custom-select" required="required">
                                <option value="">--NONE--</option>
                                <option  value="NEW">NEW</option>
                                <option value="DONE">DONE</option>
                                <option value="DELIVERED">DELIVERED</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="application_number" class="col-4 col-form-label">Application Number</label>
                            <div class="col-8">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fa fa-barcode"></i>
                                  </div>
                                </div>
                                <input id="application_number" name="application_number" type="text" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="other_details" class="col-4 col-form-label">Other Details</label>
                            <div class="col-8">
                              <textarea id="other_details" name="other_details" cols="40" rows="3" class="form-control"></textarea>
                            </div>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- modal for status change --}}


        {{-- modal for whatsapp message --}}

        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#whatsappmsg">
          Launch
        </button> --}}

        <!-- Modal -->
        <div class="modal fade" id="whatsappmsg" tabindex="-1" role="dialog" aria-labelledby="whatsappmsgid" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Send Whatsapp Msg</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group row">
                            <label for="name" class="col-4 col-form-label">Contact</label>
                            <div class="col-8">
                              <input readonly id="wa_contact" name="wa_contact" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="message" class="col-4 col-form-label">Message</label>
                            <div class="col-8">
                              <textarea id="message" name="message" cols="40" rows="3" class="form-control"></textarea>
                            </div>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a target="blank" id="sendmsg" type="button" href="#" class="btn btn-primary">Send</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal for whatsapp message --}}


@endsection

@section('adminlte_endjs')
    <script>
        $(function () {
            $('.add_modal').click(function (e) {
                e.preventDefault();
                $('#id').val($(this).data('id'));
                $('#name').val($(this).data('name'));
                $('#amount').val($(this).data('amount'));
                $('#defaultamt').val($(this).data('amount'));
                $('#addreceipt').modal();
            });
            $('#amount').keyup(function (e) {
                if(1*this.value<1*$('#defaultamt').val()){
                    $('#received').val('CREDIT');
                }else if(1*this.value>1*$('#defaultamt').val()){
                    $('#received').val('EXTRA');
                }else{
                    $('#received').val('DONE');
                }
            });

            $('.chstatus').click(function (e) {
                e.preventDefault();
                $('#cs_id').val($(this).data('id'));
                $('#cs_name').val($(this).data('name'));
                $('#cs_status').val($(this).data('status'));
                $('#chstatus').modal();
            });
            $('.whatsapp_msg').click(function (e) {
                e.preventDefault();
                $('#sendmsg').attr('href','');
                $('#wa_contact').val('');
                $('#wa_contact').val('91'+$(this).data('contact'));
                $('#whatsappmsg').modal();
                $('#message').val('');
                $('#message').keyup(function (e) {
                    $('#sendmsg').attr('href','http://wa.me/'+$('#wa_contact').val()+'?text='+this.value);
                });
            });
        });
    </script>
@endsection
