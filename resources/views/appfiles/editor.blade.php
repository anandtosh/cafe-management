@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('/developer/appfiles') }}" title="Back"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        <form method="POST" action="{{ url('/developer/appfiles/savefile') }}" accept-charset="UTF-8" style="display:inline">
                            <input type="hidden" value="{{$path}}" name="name">
                            <input type="hidden" id="editcontent" value="" name="content">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger swalsave" title="Save Model"><i class="fa fa-trash-o" aria-hidden="true"></i>Save</button>
                        </form>
                        </div>
                    <div class="card-body">

                            <pre style="min-height:400px" class="code" id="code" ace-gutter="true">{{$result}}</pre>

                                @section('adminlte_endjs')
                                    <script src="{{asset('vendor/ace/ace.js')}}"></script>
                                    <!-- load ace static_highlight extension -->
                                    <script src="{{asset('vendor/ace/ext-static_highlight.js')}}"></script>
                                    <script src="{{asset('vendor/ace/ext-language_tools.js')}}"></script>
                                    {{-- <script src="{{asset('vendor/ace/ext-emmet.js')}}"></script> --}}
                                    <script>
                                        ace.require("ace/ext/language_tools");
                                        var editor = ace.edit("code");
                                        editor.session.setMode("ace/mode/php");
                                        editor.setTheme("ace/theme/xcode");
                                        // enable autocompletion. and snippets
                                        editor.setOptions({
                                            enableBasicAutocompletion: true,
                                            enableSnippets: true,
                                            enableLiveAutocompletion: true,
                                            enableEmmet:true
                                        });
                                        $(document).ready(function(){
                                            $('#code').change(function(){
                                                var formdata = editor.getValue();
                                                $('#editcontent').val(formdata);
                                            });
                                        });
                                    </script>
                                @endsection

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
