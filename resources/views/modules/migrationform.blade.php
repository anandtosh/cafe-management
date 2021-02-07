<div class="row">
    <div class="col-6 border">
        <input type="hidden" value="{{$module->id}}" name="module_id">
        <div class="form-group row">
            <label for="table" class="col-4 col-form-label">Table Name</label>
            <div class="col-8">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-database"></i>
                  </div>
                </div>
                <input id="table" value="{{Str::lower($module->name)}}" name="table" type="text" class="form-control" readonly>
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
          <div class="row">
            <div class="col-3">Foriegn Table</div>
            <div class="col-3">FK(This)</div>
            <div class="col-2">RK(That)</div>
            <div class="col-4">On Delete</div>
          </div>
          @if(!$module->relationships->isEmpty())
         @foreach ($module->relationships as $item)
          <div class="row">
            <div class="col-3">
                <input type="hidden" name="foreign[{{$loop->iteration+100}}][old]" value="{{$item->id}}">
                <input value="{{$item->table}}" name="foreign[{{$loop->iteration+100}}][ft]" type="text" class="form-control" placeholder="items">
            </div>

            <div class="col-3">
                <input value="{{$item->fk_this}}" name="foreign[{{$loop->iteration+100}}][fk]" type="text" class="form-control" placeholder="item_id">
            </div>
            <div class="col-2">
                <input value="{{$item->rk_that}}" name="foreign[{{$loop->iteration+100}}][rk]" type="text" class="form-control" placeholder="id">
            </div>
            <div class="col-4">
                <select name="foreign[{{$loop->iteration+100}}][od]" type="text" class="form-control">
                    <option value="restrict">Restrict</option>
                    <option value="cascade">Cascade</option>
                </select>
            </div>
          </div>
          @endforeach
          @endif
          @for ($i = 0; $i < 8; $i++)
          <div class="row">
            <div class="col-3">
                <input name="foreign[{{$i}}][ft]" type="text" class="form-control" placeholder="items">
            </div>

            <div class="col-3">
                <input name="foreign[{{$i}}][fk]" type="text" class="form-control" placeholder="item_id">
            </div>
            <div class="col-2">
                <input name="foreign[{{$i}}][rk]" type="text" class="form-control" placeholder="id">
            </div>
            <div class="col-4">
                <select name="foreign[{{$i}}][od]" type="text" class="form-control">
                    <option value="restrict">Restrict</option>
                    <option value="cascade">Cascade</option>
                </select>
            </div>
          </div>
          @endfor
    </div>
    <div class="col-6 border">
        <div class="row">
            <div class="col-2">Field Name</div>
            <div class="col-2">Type</div>
            <div class="col-2">Length</div>
            <div class="col-2">Nullable</div>
            <div class="col-2">Default Value</div>
            <div class="col-1">Unique</div>
            <div class="col-1">Index</div>
        </div>
        <div class="form-group row">
            @foreach ($skeletons as $skeleton)
                <div class="row fields">
                <div class="col-md-2"><input value="{{$skeleton->field}}"  class="form-control" name="field[{{$loop->iteration}}][field]" readonly></div>
                <div class="col-md-2"><input value="{{$skeleton->type}}" class="form-control" name="field[{{$loop->iteration}}][type]" readonly></div>
                <div class="col-md-2"><input value="{{$skeleton->length}}" class="form-control" name="field[{{$loop->iteration}}][length]" readonly></div>
                <div class="col-md-2"><input value="{{$skeleton->nullable?'yes':'no'}}" class="form-control" name="field[{{$loop->iteration}}][nullable]" readonly></div>
                <div class="col-md-2"><input value="{{$skeleton->default}}" readonly class="form-control" name="field[{{$loop->iteration}}][default]"></div>
                <div class="col-md-1"><input type="checkbox" class="form-control" name="field[{{$loop->iteration}}][unique]"></div>
                <div class="col-md-1"><input type="checkbox" class="form-control" name="field[{{$loop->iteration}}][index]"></div>
             </div>
            @endforeach
        </div>

    </div>

</div>
<div class="form-group row centered">
    <div class="offset-4 col-8">
        <input type="hidden" value="{{$module->id}}" name="id">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
