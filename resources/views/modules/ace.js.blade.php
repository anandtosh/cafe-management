<script src="{{asset('vendor/ace/ace.js')}}"></script>
<!-- load ace static_highlight extension -->
<script src="{{asset('vendor/ace/ext-static_highlight.js')}}"></script>
<script>
    ace.require("ace/ext/language_tools");
    var editor = ace.edit("code");
    editor.session.setMode("ace/mode/html");
    editor.setTheme("ace/theme/tomorrow");
    // enable autocompletion. and snippets
    editor.setOptions({
        enableBasicAutocompletion: true,
        enableSnippets: true,
        enableLiveAutocompletion: true
    });
</script>

<pre style="min-height:300px" class="code" id="code" ace-mode="ace/mode/css" ace-theme="ace/theme/chrome" ace-gutter="true">
    .code {
        width: 50%;
        white-space: pre-wrap;
        border: solid lightgrey 1px
    }

</pre>



public function postcreatemodel(Request $request){
    $command ="crud:model ";
    $command.=$request->model;
    $command.=" --table=".$request->table;
    //Configure fillable fields
    $fields="";
    foreach($request->fillable as $field){
        $fields.="'".$field."'";
    }
    $fields="[".str_replace("''","','",$fields)."]";
    $command.=" --fillable=".$fields;
    $command.=" --pk=".$request->pk;
    //configuring relationships
    $relationQuery="";
    foreach($request->relationship as $relation){
        if($relation['name']&&$relation['type']&&$relation['modelto']){
            $relationQuery.=$relation['name']."#".$relation['type']."#".$relation['modelto'];
            if($relation['fk'])
            $relationQuery.="|".$relation['fk'];
            if($relation['rk'])
            $relationQuery.="|".$relation['rk'];
            $relationQuery.=";";
        }

    }
    // if($relationQuery);
    // $command.=" --relationships=".$relationQuery;
    // dd($command);
    // Artisan::call($command);
    dd($request->all(),$command,$fields,$relationQuery);
}
