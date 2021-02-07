@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Change Password {{$user->name}}</div>
                    <div class="card-body">

                        <form method="POST" action="{{ url('/admin/changepw') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- <div class="row"> --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="oldpassword">Current Password</label>
                                      <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="newpass">New Password</label>
                                      <input type="password" class="form-control" name="newpass" id="newpass" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="newpass_confirm">Confirm Password</label>
                                      <input type="password" class="form-control" name="newpass_confirm" id="newpass_confirm" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Change">
                                </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
