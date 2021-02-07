<div class="row">
    <input type="hidden" value="{{$module->id}}" name="id">
<div class="col-6">
    <div class="form-group row">
        <label for="crudname" class="col-4 col-form-label">Crud Name</label>
        <div class="col-8">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-database"></i>
              </div>
            </div>
            <input id="crudname" name="crudname" value="{{Str::lower($module->name)}}" type="text" class="form-control">
          </div>
        </div>
      </div>
  <div class="form-group row">
    <label for="controllerpath" class="col-4 col-form-label">Controller Namespace</label>
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-home"></i>
          </div>
        </div>
        <input id="controllerpath" name="controllerpath" placeholder="e.g. Http\Controllers\Admin" type="text" aria-describedby="controllerpathHelpBlock" class="form-control">
      </div>
      <span id="controllerpathHelpBlock" class="form-text text-muted">Default Path Will Be Http\Controllers</span>
    </div>
  </div>
  <div class="form-group row">
    <label for="modelname" class="col-4 col-form-label">Model Name</label>
    <div class="col-8">
      <input id="modelname" {{$module->model?'readOnly':''}} name="modelname" value="{{Str::ucfirst(Str::singular($module->name))}}" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="modelpath" class="col-4 col-form-label">Model Namespace</label>
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-home"></i>
          </div>
        </div>
        <input id="modelpath" {{$module->modelpath?'value='.$module->modelpath.' readOnly':''}} name="modelpath" placeholder="e.g. Admin" type="text" class="form-control" aria-describedby="modelpathHelpBlock">
      </div>
      <span id="modelpathHelpBlock" class="form-text text-muted">Default Path Will Be App\</span>
    </div>
  </div>
{{-- ending half col-4 --}}
</div>
<div class="col-6">

    <div class="form-group row">
        <label for="routegroup" class="col-4 col-form-label">Route Group Prefix</label>
        <div class="col-8">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-lock"></i>
              </div>
            </div>
            <input value="admin" id="routegroup" name="routegroup" placeholder="e.g. admin" type="text" class="form-control">
          </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="paignation" class="col-4 col-form-label">Pagination</label>
        <div class="col-8">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-list-ol"></i>
              </div>
            </div>
            <input id="paignation" name="paignation" placeholder="e.g. 50 (default is 25)" type="text" class="form-control">
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="pk" class="col-4 col-form-label">Primary Key</label>
        <div class="col-8">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-key"></i>
              </div>
            </div>
            <input id="pk" {{$module->primary?'value='.$module->primary.' readonly':''}} name="pk" placeholder="default will be id" type="text" class="form-control">
            <div class="input-group-append">
              <div class="input-group-text">id</div>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-4">Generate Views</label>
        <div class="col-8">
          <div class="custom-control custom-radio custom-control-inline">
            <input checked name="genviews" id="genviews_0" type="radio" class="custom-control-input" value="yes">
            <label for="genviews_0" class="custom-control-label">Yes</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input name="genviews" id="genviews_1" type="radio" class="custom-control-input" value="no">
            <label for="genviews_1" class="custom-control-label">No</label>
          </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="viewspath" class="col-4 col-form-label ">Views Path</label>
        <div class="col-8">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-home"></i>
              </div>
            </div>
            <input id="viewspath" name="viewspath" placeholder="Admin" type="text" class="form-control">
          </div>
        </div>
      </div>

</div>
</div>
<div class="row">
{{-- additional rows from module data --}}
<div class="col-12">
    <div class="row">
        <div class="col-2 border">Field Name</div>
        <div class="col-2 border">Field Type</div>
        <div class="col-8 text-center border">Validation Rules</div>
@isset($skeletons)
@foreach ($skeletons as $skeleton)
    <div class="row">
    <div class="col-2"><input readonly value="{{$skeleton->field}}"  class="form-control" name="field[{{$loop->iteration}}][field]" required></div>
    <div class="col-2"><input readonly value="{{$skeleton->type}}" class="form-control" name="field[{{$loop->iteration}}][type]" required></div>
    <div class="col-2"><input class="form-control validate" name="field[{{$loop->iteration}}][rule1]"></div>
    <div class="col-2"><input class="form-control validate" name="field[{{$loop->iteration}}][rule2]"></div>
    <div class="col-2"><input class="form-control validate" name="field[{{$loop->iteration}}][rule3]"></div>
    <div class="col-1"><input class="form-control validate" name="field[{{$loop->iteration}}][rule4]"></div>
    <div class="col-1"><input class="form-control validate" name="field[{{$loop->iteration}}][rule5]"></div>

    </div>

@endforeach
@endisset
<h3>RelationShips</h3>
<div class="container">
<div class="row">
    <div class="col-2">Name</div>
    <div class="col-2">Function</div>
    <div class="col-1">Required</div>
    <div class="col-1">Column</div>
    <div class="col-1">Filter Col</div>
    <div class="col-1">Filter Val</div>
    <div class="col-1">Table</div>
</div>
@if(!$module->relationships->isEmpty())
@foreach($module->relationships as $item)

<div class="row">
<div class="col-2"><input value="{{$item->fk_this}}" class="form-control" name="relation[{{$loop->iteration+100}}][field]"></div>
<div class="col-2"><input value="select2relation" class="form-control" name="relation[{{$loop->iteration+100}}][type]"></div>
<div class="col-1"><input type="checkbox" class="form-control" name="relation[{{$loop->iteration+100}}][required]"></div>
<div class="col-1"><input value="name" type="text" class="form-control" name="relation[{{$loop->iteration+100}}][column]"></div>
<div class="col-1"><input type="text" class="form-control" name="relation[{{$loop->iteration+100}}][filtercol]"></div>
<div class="col-1"><input type="text" class="form-control" name="relation[{{$loop->iteration+100}}][filterval]"></div>
<div class="col-2"><input value="{{$item->table}}" type="text" class="form-control" name="relation[{{$loop->iteration+100}}][table]"></div>
</div>

@endforeach
@endif
</div>

</div>
</div>
</div>
<div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

  @section('adminlte_css')
  <link rel="stylesheet" href="{{ asset('vendor/jquery/jquery-ui.min.css') }}">
  @endsection

  @section('adminlte_endjs')

  <script src="{{ asset('vendor/jquery/jquery-ui.min.js') }}"></script>
  <script type="text/javascript">
      var availableTags=[
          'accepted','required','alpha','alpha_dash','alpha_num','boolean','confirmed:another_field',
          'date','different:another_field','active_url','after_date:2020-01-25',
          'after_or_equal:2020-01-25','before:2020-01-25','before_or_equal:2020-01-25',
          'between:8,20','date_equals:2020-01-25','digits_between:10,20',
          'dimensions:min_width=100,min_height=400','dimensions:ratio=1.5,width=450',
          'email:rfc','ends_with:ton,ias,es','exists:table,column','file','gt:field',
          'gte:field','image','in:zone1,zone2,zone3','integer','ip','ipv4','ipv6','json',
          'lt:field','lte:field','max:50','mimetypes:video/avi','mimes:jpg,pdf,png',
          'min:40','not_in:mode,great,this','numeric','required','same:field',
          'size:25','start_with:the,my,32','string','unique:table,column'
      ];
      $( function() {

          $( ".validate" ).autocomplete({
          source: availableTags
          });
      });
    </script>
    @endsection
