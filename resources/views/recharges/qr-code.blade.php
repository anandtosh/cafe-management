@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">QR Code</div>
                    <div class="card-body">
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
            if($('#transaction_id').val()==''){
                if($('#upload_file').val()==''){
                    alert('Please upload receipt');
                }else{
                    alert('Please enter transaction ID');
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
                });
            }
        });
    </script>
@endpush
