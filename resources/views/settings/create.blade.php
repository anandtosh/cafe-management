@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create New setting</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/settings') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/settings') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('settings.form', ['formMode' => 'create'])

                        </form>
                        <!-- Button trigger modal -->


                        <!-- Modal -->


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
