@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Hello Site Users!</strong> On behalf of <a href="https://www.dctsoftware.com">DCTsoftware</a>, Last Update in website as on 1:37 AM 19-08-2020.
                        <br>You can directly provide suggestions/error info in <a href="http://cafemanagement.in">cafemanagement.in</a>  at following link  <a href="https://wa.me/919870740539">Click Here</a>
                    </div> --}}
                    {{-- You are logged in! --}}
                    <h3>Pending Works</h3>
                    {{-- sales red --}}
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

                                    {{-- <th>Status</th> --}}
                                    <th>Payment Status</th>

                                    <th>Show In Sales</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Sale::where('status','NEW')->franchisefil()->fiscal()->get() as $item)
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

                                    {{-- <td>
                                    <a data-name="{{ $item->name }}" data-id="{{$item->id}}" data-status="{{ $item->status }}" name="change_status" id="change_status" style="width: 100px" class="btn btn-sm btn-outline-dark chstatus" href="#" role="button">{{ $item->status }}</a>
                                    </td> --}}
                                    <td>{{ $item->received }}</td>

                                    <td class="bg-white text-center">

                                    @can('view_sales')
                                        <a href="{{ url('/admin/sales?byid=' . $item->id) }}" title="View sale"><button class="btn btn-outline-info btn-sm"> <i class="fa fa-angle-right" aria-hidden="true"></i> </button></a>
                                    @endcan

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- sales red --}}
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="fromdate">From Date</label>
                            <input type="date"
                                class="form-control" name="fromdate" id="fromdate" aria-describedby="fromhelp" placeholder="">
                            <small id="fromhelp" class="form-text text-muted">Enter date from which you want to show data.</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="todate">To Date</label>
                            <input type="date"
                                class="form-control" name="todate" id="todate" aria-describedby="tohelp" placeholder="">
                            <small id="tohelp" class="form-text text-muted">Enter date til which you want to show data.</small>
                            </div>
                        </div>
                    </div>

                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Work Charges</th><td id="ajaxtotalwork"></td>
                            </tr>
                            <tr>
                                <th>Bank Charges</th><td id="ajaxtotalbank"></td>
                            </tr>
                            <tr>
                                <th>Bank Extra Charges</th><td id="ajaxtotalbankextra"></td>
                            </tr>
                            <tr>
                                <th>Discount (If Any)</th><td id="ajaxtotaldis"></td>
                            </tr>
                            <tr>
                                <th>Actual Sale</th><td id="ajaxtotalsale"></td>
                            </tr>
                            <tr>
                                <th>Sale After Discount</th><td id="ajaxtotalactual"></td>
                            </tr>


                        </tbody>
                    </table>
                    <hr>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('adminlte_endjs')
    <script>
        $(document).ready(function () {
            $('#fromdate,#todate').change(function (e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "{{url('admin/ajax')}}",
                    data: {function:'salecalculation',fromdate:$('#fromdate').val(),todate:$('#todate').val(),_token:"{{csrf_token()}}"},
                    dataType: "json",
                    success: function (response) {
                        if(response!=1){
                            $('#ajaxtotalsale').text(response.totalsale);
                            $('#ajaxtotalwork').text(response.totalwork);
                            $('#ajaxtotalbank').text(response.totalbank);
                            $('#ajaxtotalbankextra').text(response.totalbankextra);
                            $('#ajaxtotaldis').text(response.totalsale-response.totalwork-response.totalbank-response.totalbankextra);
                            $('#ajaxtotalactual').text(response.totalwork+response.totalbank+response.totalbankextra);
                        }
                    }
                });
            });
        });
    </script>
@endsection
