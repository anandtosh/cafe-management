@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">QR Code</div>
                    <div class="card-body">
                        @hasrole('Operator')
                        <div class="media">
                            <a class="container text-center" href="#">
                                  <img class="" src="{{asset('5f6577f1-04bc-4b2a-843f-49b3e0104cc0.png')}}" alt="qr-code" width="300">
                            </a>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="transaction_id">Transaction ID</label>
                                    <input type="text"
                                    class="form-control" name="transaction_id" id="transaction_id" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" min="0" step="1"
                                    class="form-control" name="amount" id="amount" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="upload_file">Upload</label>
                                    <input type="file" class="form-control-file" name="upload_file" id="upload_file" placeholder="" aria-describedby="fileHelpId">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary upload-form mt-4">Submit</button>
                            </div>
                        </div>
                        @endhasrole
                        @hasrole('Developer|Admin|Distributor')
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <a class="btn btn-primary" href="{{route('online-recharge',['q'=>'last_50_approved'])}}" role="button">Last 50 Approved Requests</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-primary" href="{{route('online-recharge',['q'=>'last_50_failed'])}}" role="button">Last 50 Failed Requests</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-primary" href="{{route('online-recharge')}}" role="button">All Pending Requests</a>
                            </div>
                        </div>
                        @endhasrole
                        <div class="row">
                            @hasrole('Developer|Admin|Distributor')
                            @php
                                if(request('q')=='')
                                $receipts = DB::table('recharge_receipts')->where('status','PENDING')->get();
                                elseif(request('q')=='last_50_approved')
                                $receipts = DB::table('recharge_receipts')->where('status','APPROVED')->get();
                                elseif(request('q')=='last_50_failed')
                                $receipts = DB::table('recharge_receipts')->where('status','FAILED')->get();
                            @endphp
                            @endhasrole
                            @hasrole('Operator')
                            @php
                                $receipts = DB::table('recharge_receipts')->where('franchisee_id',Auth::user()->franchise_id)->get()
                            @endphp
                            @endhasrole
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        @hasrole('Developer|Admin|Distributor')
                                        <th>Franchisee</th>
                                        @endhasrole
                                        <th>Amount</th>
                                        <th>File</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        @hasrole('Developer|Admin|Distributor')
                                        <th>Action</th>
                                        @endhasrole
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($receipts as $receipt)
                                    <tr>
                                        <td scope="row"> {{$loop->iteration}}</td>
                                        @hasrole('Developer|Admin|Distributor')
                                        <td>{{DB::table('franchises')->where('id',$receipt->franchisee_id)->first()->name}}</td>
                                        @endhasrole
                                        <td>{{$receipt->amount}}</td>
                                        <td><a class="btn btn-sm btn-primary {{isset($receipt->file)?'':'disabled'}}"  href="{{ url('storage/'.$receipt->file) }}" role="button"><i class="fas fa-file-pdf    "></i> View File</a></td>
                                        <td>{{$receipt->status}}</td>
                                        <td>{{\Carbon\Carbon::parse($receipt->created_at)->format('d, M - Y')}}</td>
                                        @hasrole('Developer|Admin|Distributor')
                                        <td>
                                            @if($receipt->status=='PENDING')
                                            <a class="btn btn-sm btn-success text-white" href="{{route('recharge-receipt-approve',['id'=>$receipt->id])}}" role="button"> Approved</a>
                                            <a class="btn btn-sm btn-danger text-white" role="button" href="{{route('recharge-receipt-failed',['id'=>$receipt->id])}}"> Failed</a>
                                            @else
                                            <a class="btn btn-sm btn-primary text-white" role="button" href="{{route('recharge-receipt-pending',['id'=>$receipt->id])}}"> Revert To Pending</a>
                                            @endif
                                        </td>
                                        @endhasrole
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $('.upload-form').click(function (e) {
            e.preventDefault();
            if($('#transaction_id').val()==''&&$('#upload_file').val()==''&&$('#amount').val()==''){
                if($('#transaction_id').val()==''){
                    alert('Please upload receipt');
                }
                if($('#upload_file').val()==''){
                    alert('Please enter transaction ID');
                }
                if($('#amount').val()==''){
                    alert('Please enter amount');
                }
            }else{
                let data = new FormData();
                data.append('file', document.getElementById('upload_file').files[0]);
                data.append('transaction_id', document.getElementById('transaction_id').value);
                data.append('amount', document.getElementById('amount').value);
                axios.post('{{route("recharge-receipt-post")}}',data,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(function(response){
                    if(typeof response.data.state != 'undefined'){
                        Swal.fire({
                            title:'Success!',
                            text:'Your recharge request has been submitted successfully.',
                            icon:'success',
                            timer:3500,
                            toast:true,
                            position:'top-end'
                        });
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endpush
