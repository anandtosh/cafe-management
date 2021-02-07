@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create {{Str::ucfirst($typeform)}}</div>
                    <div class="card-body">
                        <a href="{{ url('/developer/modules') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        <br/>

                        @if($typeform=='model')
                        <form method="POST" action="{{ url('/developer/modules/createmodel') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('modules.modelform', ['formMode' => 'create'])

                        </form>
                        @endif
                        @if($typeform=='migration')
                        <form method="POST" action="{{ url('/developer/modules/createmigration') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('modules.migrationform', ['formMode' => 'create'])

                        </form>
                        @endif
                        @if($typeform=='controller')
                        <form method="POST" action="{{ url('/developer/modules/createcontroller') }}" accept-charset="UTF-8" class="form-horizontal " enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('modules.controllerform', ['formMode' => 'create'])

                        </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
