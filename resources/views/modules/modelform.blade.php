<div class="row">
    <div class="col-md-6 border">
        <div class="form-group row">
            <label for="model" class="col-4 col-form-label">Model Name</label>
            <div class="col-8">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-home"></i>
                  </div>
                </div>
                <input value="{{Str::ucfirst(Str::singular($module->name))}}" id="model" name="model" type="text" class="form-control" required="required" readonly>

              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="table" class="col-4 col-form-label">Table Name</label>
            <div class="col-8">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-database"></i>
                  </div>
                </div>
                <input id="table" value="{{Str::lower($module->name)}}" name="table" type="text" class="form-control" required="required" readonly>

              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-4">Fillable Fields</label>
            <div class="col-8">
            @isset($skeleton)
                @foreach ($skeleton as $item)
              <div class="custom-control custom-checkbox custom-control-inline">
                <input id="fillable[{{$loop->iteration}}]" name="fillable[{{$loop->iteration}}]" type="checkbox" checked="checked" class="custom-control-input" value="{{$item->field}}">
                <label for="fillable[{{$loop->iteration}}]" class="custom-control-label">{{$item->field}}</label>
              </div>

              @endforeach
              @endisset
              @if(!$module->relationships->isEmpty())
                @foreach ($module->relationships as $item)
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input id="fillable[{{$loop->iteration+100}}]" name="fillable[{{$loop->iteration+100}}]" type="checkbox" checked="checked" class="custom-control-input" value="{{$item->fk_this}}">
                    <label for="fillable[{{$loop->iteration+100}}]" class="custom-control-label">{{$item->fk_this}}</label>
                  </div>
                @endforeach
                @endif
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
            <label for="modelnamespace" class="col-4 col-form-label">Model NameSpace</label>
            <div class="col-8">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-folder-open"></i>
                  </div>
                </div>
                <input id="modelnamespace" name="modelnamespace" placeholder="e.g. Admin" type="text" class="form-control">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-4">Use soft delete</label>
            <div class="col-8">
              <div class="custom-control custom-radio custom-control-inline">
                <input {{$module->softdelete=='no'?'disabled':'checked'}} name="softdelete" id="softdelete_0" type="radio" class="custom-control-input" value="yes">
                <label for="softdelete_0" class="custom-control-label">Yes</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input {{$module->softdelete=='yes'?'disabled':'checked'}} name="softdelete" id="softdelete_1" type="radio" class="custom-control-input" value="no">
                <label for="softdelete_1" class="custom-control-label">No</label>
              </div>
            </div>
          </div>


    </div>

    <div class="col-md-6 border">
        <div class="row"><p class="text-center font-weight-bold">Relationships  <code>(Maximum 4)</code></p></div>
        <div class="row">
            <div class="col-3">Name</div>
            <div class="col-2">Type</div>
            <div class="col-3">Relative Model</div>
            <div class="col-2">Foreign Key</div>
            <div class="col-2">Ref Key</div>
        </div>
        @if(!$module->relationships->isEmpty())
        @foreach ($module->relationships as $item)
        <div class="form-group row">
            <input type="hidden" name="relationship[{{$loop->iteration+100}}][old]" value="{{$item->id}}">
            <div class="col-3">
                <input value="{{$item->name}}" name="relationship[{{$loop->iteration+100}}][name]" type="text" class="form-control" placeholder="e.g. invoice">
            </div>
            <div class="col-2">
                <select name="relationship[{{$loop->iteration+100}}][type]" class="custom-select">
                    <option value="">None</option>
                    <option value="belongsTo">belongsTo</option>
                    <option value="hasOne">hasOne</option>
                    <option value="belongsToMany">belongsToMany</option>
                    <option value="hasMany">hasMany</option>
                </select>
            </div>
            <div class="col-3">
                <input value="{{$item->model}}" name="relationship[{{$loop->iteration+100}}][modelto]" type="text" class="form-control" placeholder="e.g. App\User">
            </div>
            <div class="col-2">
                <input value="{{$item->fk_this}}" name="relationship[{{$loop->iteration+100}}][fk]" type="text" class="form-control">
            </div>
            <div class="col-2">
                <input value="{{$item->rk_that}}" name="relationship[{{$loop->iteration+100}}][rk]" type="text" class="form-control" >
            </div>
        </div>
        @endforeach
        @endif
        @for ($i = 0; $i < 8; $i++)
        <div class="form-group row">
            <div class="col-3">
                <input name="relationship[{{$i}}][name]" type="text" class="form-control" placeholder="e.g. invoice">
            </div>
            <div class="col-2">
                <select name="relationship[{{$i}}][type]" class="custom-select">
                    <option value="">None</option>
                    <option value="belongsTo">belongsTo</option>
                    <option value="hasOne">hasOne</option>
                    <option value="belongsToMany">belongsToMany</option>
                    <option value="hasMany">hasMany</option>
                </select>
            </div>
            <div class="col-3">
                <input name="relationship[{{$i}}][modelto]" type="text" class="form-control" placeholder="e.g. App\User">
            </div>
            <div class="col-2">
                <input name="relationship[{{$i}}][fk]" type="text" class="form-control">
            </div>
            <div class="col-2">
                <input name="relationship[{{$i}}][rk]" type="text" class="form-control" >
            </div>
        </div>
        @endfor


    </div>

</div>

    <div class="form-group row centered">
        <div class="offset-4 col-8">
            <input type="hidden" value="{{$module->id}}" name="id">
          <button name="submit" type="submit" class="btn btn-primary">Submit</button>


        </div>
      </div>

