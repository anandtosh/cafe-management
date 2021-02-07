@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Wallet</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                  <h3> {{session('franchise_id')?\App\Franchise::find(session('franchise_id'))->credit_limit:''}} </h3>

                                  <p>Credit Limit</p>
                                </div>
                                <div class="icon">
                                  <i class="fas fa-wallet    "></i>
                                </div>
                                <p class="small-box-footer">Amount which you are allowed to make orders</p>
                              </div>

                        </div>
                        <div class="col-md-4">
                            <div class="small-box bg-success">
                                <div class="inner">
                                  <h3> {{session('franchise_id')?\App\Franchise::find(session('franchise_id'))->opening:''}} </h3>

                                  <p>Opening Balance</p>
                                </div>
                                <div class="icon">
                                  <i class="fas fa-wallet    "></i>
                                </div>
                                <p class="small-box-footer">Current fiscal year opening balance</p>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                  <h3> {{session('franchise_id')?\App\Order::where('franchise_id',session('franchise_id'))->pluck('amount')->sum():''}} </h3>

                                  <p>Used Balance</p>
                                </div>
                                <div class="icon">
                                  <i class="fas fa-wallet    "></i>
                                </div>
                                <p class="small-box-footer">Amount which you used to order</p>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="small-box bg-success">
                                <div class="inner">
                                  <h3> {{session('franchise_id')?\App\Franchise::find(session('franchise_id'))->credit_limit-\App\Order::where('franchise_id',session('franchise_id'))->pluck('amount')->sum()+\App\Recharge::where('franchise_id',session('franchise_id'))->pluck('amount')->sum():''}} </h3>

                                  <p>Available Credit</p>
                                </div>
                                <div class="icon">
                                  <i class="fas fa-wallet    "></i>
                                </div>
                                <p class="small-box-footer">Amount remaining in account make orders</p>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="small-box bg-success">
                                <div class="inner">
                                  <h3> {{session('franchise_id')?\App\Franchise::find(session('franchise_id'))->opening-\App\Order::where('franchise_id',session('franchise_id'))->pluck('amount')->sum()+\App\Recharge::where('franchise_id',session('franchise_id'))->pluck('amount')->sum():''}} </h3>

                                  <p>Current Balance</p>
                                </div>
                                <div class="icon">
                                  <i class="fas fa-wallet    "></i>
                                </div>
                                <p class="small-box-footer">Amount has to be paid to cafemanagment.in</p>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="small-box bg-success">
                                <div class="inner">
                                  <h3> {{session('franchise_id')?\App\Recharge::where('franchise_id',session('franchise_id'))->pluck('amount')->sum():''}} </h3>

                                  <p>Recharge Done</p>
                                </div>
                                <div class="icon">
                                  <i class="fas fa-wallet    "></i>
                                </div>
                                <p class="small-box-footer">Amount you done recharges for your wallet</p>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                      <h2>Recharge History</h2>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Amount</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach (App\Recharge::where('franchise_id',session('franchise_id'))->get() as $item)
                            <tr>
                              <td> {{$loop->iteration}}</td>
                              <td>{{$item->amount}}</td>
                              <td>{{$item->created_at->toDateString()}}</td>
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
