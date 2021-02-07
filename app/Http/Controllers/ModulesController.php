<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Module;
use App\Permission;
use App\Relationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\AssignOp\Mod;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('view_modules');
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $modules = Module::where('name', 'LIKE', "%$keyword%")
                ->orWhere('model', 'LIKE', "%$keyword%")
                ->orWhere('controller', 'LIKE', "%$keyword%")
                ->orWhere('views', 'LIKE', "%$keyword%")
                ->orWhere('migration', 'LIKE', "%$keyword%")
                ->orWhere('menu', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $modules = Module::latest()->paginate($perPage);
        }

        return view('modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create_modules');
        return view('modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // requesting fields for skeleton
        $fields = $request->field;
        $requestData = $request->all();
        $mod = Module::create($requestData);
        $data = $this->fieldsbinder($fields, $mod->id);
        DB::table('skeletons')->insert($data);
        return redirect('developer/modules')->with('flash_message', 'Module added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $this->authorize('show_modules');
        $module = Module::findOrFail($id);

        return view('modules.show', compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $this->authorize('edit_modules');
        $module = Module::findOrFail($id);
        $skeletons = DB::table('skeletons')->where('module_id', '=', $id)->get();
        return view('modules.edit', compact('module', 'skeletons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        // requesting fields for skeleton
        $fields = $request->field;

        $requestData = $request->all();

        $module = Module::findOrFail($id);
        $module->update($requestData);

        // Deletes old data first in skeletons
        DB::table('skeletons')->where('module_id', '=', $id)->delete();
        // Adds New data to skeleton
        if (!$fields)
            return back()->with('error', 'You Did Something Wrong! Add Fields');
        $data = $this->fieldsbinder($fields, $id);
        DB::table('skeletons')->insert($data);

        return redirect('developer/modules')->with('flash_message', 'Module updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->authorize('delete_modules');
        Module::destroy($id);

        return redirect('developer/modules')->with('success', 'Deleted Successfully');
    }

    public function fieldsbinder($fields, $id)
    {
        //Here we split fields data for insert
        // sorting skeleton field for database insert
        foreach ($fields as $row) {
            $data[] = [
                "nullable" => isset($row['nullable']),
                "type" => $row['type'],
                "field" => $row['field'],
                "default" => isset($row['default']) ? $row['default'] : null,
                "length" => isset($row['length']) ? $row['length'] : null,
                "module_id" => $id,
            ];
        }
        return $data;
    }
    public function createcontroller($id)
    {
        $module = Module::findOrFail($id);
        $skeletons = DB::table('skeletons')->where('module_id', '=', $id)->get();
        return view('modules.modelcreate', compact('module', 'skeletons'))->with('typeform', 'controller');
    }

    public function postcreatecontroller(Request $request)
    {
        $name = $request->crudname;
        $namecaps = Str::ucfirst($name);
        $controllerNamespace = $request->controllerpath ? $request->controllerpath . '\\' : null;
        $modelName = $request->modelname;
        $modelNamespace = $request->modelpath ? $request->modelpath . '\\' : null;
        $routeGroup = $request->routegroup;
        $perPage = $request->pagination ? $request->pagination : 25;
        $viewPath = $request->viewspath;
        $primaryKey = $request->pk ? $request->pk : 'id';
        $formHelper = 'html';
        $items = $request->field;
        $fields = '';
        $validations = '';
        foreach ($items as $item) {
            if($item['field']){
            $fields .= $item['field'] . "#" . $item['type'] . ";";
            }
            if ($item['rule1']) {
                $validations .= $item['field'] . '#' . $item['rule1'] . ";";
            }
            if ($item['rule2']) {
                $validations .= $item['field'] . '#' . $item['rule2'] . ";";
            }
            if ($item['rule3']) {
                $validations .= $item['field'] . '#' . $item['rule3'] . ";";
            }
            if ($item['rule4']) {
                $validations .= $item['field'] . '#' . $item['rule4'] . ";";
            }
            if ($item['rule5']) {
                $validations .= $item['field'] . '#' . $item['rule5'] . ";";
            }
        }
        $relation='';
        if(isset($request->relation))
        foreach($request->relation as $item){
            if($item['field']&& $item['type'])
            $relation.=$item['field']."#".$item['type'];
            if($item['column']){$relation.='#'.$item['column'];}
            if($item['table']){$relation.='#'.$item['table'];}
            if(isset($item['required'])){$relation.='#'.$item['required'];}
            if($item['filtercol']){$relation.='#'.$item['filtercol'];}
            if($item['filterval']){$relation.='#'.$item['filterval'];}
            $relation.=';';
        }
        $validations = rtrim($validations, ';');
        $fields = rtrim($fields, ';');
        $module = Module::findOrFail($request->id);
        Artisan::call('crud:controller', ['name' => $controllerNamespace . $namecaps . 'Controller', '--crud-name' => $name, '--model-name' => $modelName, '--model-namespace' => $modelNamespace, '--view-path' => $viewPath, '--route-group' => $routeGroup, '--pagination' => $perPage, '--fields' => $fields, '--validations' => $validations]);
        if ($request->genviews == 'yes') {
            Artisan::call('crud:view', ['name' => $name, '--fields' => $fields, '--validations' => $validations, '--view-path' => $viewPath, '--route-group' => $routeGroup, '--pk' => $primaryKey, '--form-helper' => $formHelper,'--relationships'=>$relation]);
        }
        $module->update([
            'controller' => 'App\Http\Controllers' . '\\' . $controllerNamespace . $namecaps . 'Controller.php',
            'viewspath' => $viewPath, 'views' => $request->genviews, 'modelpath' => $request->modelnamespace,
            'primary' => $primaryKey, 'controllerpath' => $request->controllerpath, 'modelpath' => $request->modelpath,
            'routegroup' => $routeGroup,
        ]);
            Artisan::call('permission:create-permission',['name'=>'view_'.$name,'guard'=>'web']);
            Artisan::call('permission:create-permission',['name'=>'create_'.$name,'guard'=>'web']);
            Artisan::call('permission:create-permission',['name'=>'edit_'.$name,'guard'=>'web']);
            Artisan::call('permission:create-permission',['name'=>'show_'.$name,'guard'=>'web']);
            Artisan::call('permission:create-permission',['name'=>'delete_'.$name,'guard'=>'web']);

        return redirect('developer/modules')->with('success', 'Succesfully Created Controller,Views and Permissions');
    }

    public function editcontroller($id){
        $module = Module::findOrFail($id);
        $result = File::get(base_path($module->controller));
        $path=$module->controller;
        return view('modules.editor', compact('result','path'));
    }

    public function createmodel($id)
    {
        $module = Module::findOrFail($id);
        $skeleton = DB::table('skeletons')->where('module_id', '=', $id)->get();
        return view('modules.modelcreate', compact('module', 'skeleton'))->with('typeform', 'model');
    }

    public function postcreatemodel(Request $request)
    {
        $modelname = $request->model;
        $modelNamespace = $request->modelnamespace ? $request->modelnamespace . '\\' : '';
        $softDeletes = $request->softdelete;
        $table = $request->table;
        //Configure fillable fields
        $fields = "";
        foreach ($request->fillable as $field) {
            $fields .= "'" . $field . "'";
        }
        $fields = "[" . str_replace("''", "','", $fields) . "]";
        $fillable = $fields;
        $pk = $request->pk ? $request->pk : 'id';
        //configuring relationships
        $relationQuery = "";

        foreach ($request->relationship as $relation) {
            if ($relation['name'] && $relation['type'] && $relation['modelto']) {
                $relationQuery .= $relation['name'] . "#" . $relation['type'] . "#" . $relation['modelto'];
                if ($relation['fk'])
                    $relationQuery .= "|" . $relation['fk'];
                if ($relation['rk'])
                    $relationQuery .= "|" . $relation['rk'];
                $relationQuery .= ";";
                if($relation['old']){
                    Relationship::find($relation['old'])->update([
                        'name'=>$relation['name'],
                        'type'=>$relation['type'],
                        'model'=>$relation['modelto'],
                    ]);
                }
            }
        }
        Artisan::call('crud:model', ['name' => $modelNamespace . $modelname, '--fillable' => $fillable, '--table' => $table, '--pk' => $pk, '--relationships' => $relationQuery, '--soft-deletes' => $softDeletes]);
        $module = Module::findOrFail($request->id);
        $module->update(['model' => 'App\\' . $modelNamespace . $modelname . '.php', 'modelpath' => $request->modelnamespace, 'primary' => $pk, 'softdelete' => $softDeletes]);

        return redirect('developer/modules')->with('success', 'Succesfully Created Model');
    }

    public function editmodel($id)
    {
        $module = Module::findOrFail($id);
        $result = File::get(base_path($module->model));
        $path=$module->model;
        return view('modules.editor', compact('result','path'));
    }
    public function createmigration($id)
    {
        $module = Module::findOrFail($id);
        $skeletons = DB::table('skeletons')->where('module_id', '=', $id)->get();
        if (!$skeletons->count())
            return back()->with('question', 'Did you added Fields');
        return view('modules.modelcreate', compact('module', 'skeletons'))->with('typeform', 'migration');
    }
    // after posting migration form here we could generate migration and table for that
    public function postcreatemigration(Request $request)
    {
        $migrationName = $request->table;
        $primaryKey = $request->pk ? $request->pk : 'id';
        $migrationFields = '';
        $foreignKeys = '';
        $indexes = '';
        // sorting fields keys through loop
        foreach ($request->field as $item) {

            $migrationFields .= $item['field'];
            $migrationFields .= "#" . $item['type'];
            $item['nullable'] == 'yes' ? $migrationFields .= "#" . "nullable" : '';
            $item['default'] ? $migrationFields .= "#" ."default#". $item['default'] : '';
            $migrationFields .= ";";
            $indexes .= isset($item['index']) ? $item['field'] . ',' : '';
            $indexes .= isset($item['unique']) ? $item['field'] . '#unique,' : '';
        }
        $indexes = rtrim($indexes, ',');
        // sorting foreign keys through loop
        foreach ($request->foreign as $item) {
            if ($item['ft'] && $item['fk'] && $item['rk'] && $item['od']) {
                $foreignKeys .= $item['fk'] . "#" . $item['rk'] . "#" . $item['ft'] . "#" . $item['od'] . ",";
                $migrationFields .= $item['fk'] . "#bigint#unsigned;";
                $relationdata=['fk_this'=>$item['fk'],'rk_that'=>$item['rk'],'table'=>$item['ft'],'ondelete'=>$item['od'],'module_id'=>$request->module_id];
                if (isset($item['old'])) {
                    Relationship::find($item['old'])->update($relationdata);
                }else{
                    Relationship::insert($relationdata);
                }
            }
        }
        $softDeletes = $request->softdelete;

        Artisan::call('crud:migration', [
            'name' => $migrationName, '--schema'
            => $migrationFields, '--pk' => $primaryKey,
            '--indexes' => $indexes, '--foreign-keys' => $foreignKeys,
            '--soft-deletes' => $softDeletes
        ]);
        Artisan::call('migrate');
        $module = Module::findOrFail($request->id);
        $module->update(['migration' => 'create_' . $migrationName . '_table.php', 'primary' => $primaryKey, 'softdelete' => $softDeletes]);
        return redirect('developer/modules')->with('success', 'Succesfully Created Migration');
    }

    public function editmigration($id)
    {
        $files = File::files(base_path('database/migrations'));
            $module = Module::findOrFail($id);
            foreach ($files as $file) {
                if (Str::endsWith($file->getfilename(), $module->migration))
                    $migrationFile = $file->getfilename();
            }
        $path='database/migrations/'.$migrationFile;
        $result = File::get(base_path($path));
        $filetype='migration';
        return view('modules.editor', compact('result','path','filetype'));
    }
    public function deletemoduledata(Request $request)
    {
        $filetype = $request->filetype;
        $id = $request->id;
        switch ($filetype) {
                // delete files and simulteneously updates module table
            case "model":
                $module = Module::findOrFail($id);
                $result = File::delete(base_path($module->model));
                if ($result) {
                    Module::find($id)->update(['model' => null, 'modelpath' => null]);
                    $moduleupdate = Module::findOrFail($id);
                    if ((!$moduleupdate->model) && (!$moduleupdate->controller) && (!$moduleupdate->migration))
                        $moduleupdate->update(['primary' => null, 'softdelete' => null]);
                    return back()->with('success', 'Just Deleted A Model');
                } else
                    return back()->with('error', 'Cannot Deleted This Model');
                break;
            case "migration":
                $files = File::files(base_path('database/migrations'));
                $module = Module::findOrFail($id);
                foreach ($files as $file) {
                    if (Str::endsWith($file->getfilename(), $module->migration))
                        $migrationDel = $file->getfilename();
                }
                $result = File::delete(base_path('database/migrations/' . $migrationDel));
                if ($result) {
                    Schema::drop($module->name);
                    $module->update(['migration' => null]);
                    $moduleupdate = Module::findOrFail($id);
                    if ((!$moduleupdate->model) && (!$moduleupdate->controller) && (!$moduleupdate->migration))
                        $moduleupdate->update(['primary' => null, 'softdelete' => null]);
                    return back()->with('success', 'Just Deleted A Migration');
                } else
                    return back()->with('error', 'Cannot Deleted This Migration');
                break;
            case "controller":
                $module = Module::findOrFail($id);
                $viewsdel = false;
                Permission::where('name','LIKE','%_'.$module->name)->delete();
                app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
                $result = File::delete(base_path($module->controller));
                if ($result) {
                    Module::find($id)->update(['controller' => null, 'controllerpath' => null]);
                    $moduleupdate = Module::findOrFail($id);
                    if ((!$moduleupdate->model) && (!$moduleupdate->controller) && (!$moduleupdate->migration)) {
                        $moduleupdate->update(['primary' => null, 'softdelete' => null,'routegroup'=>null]);
                    }
                    if ($moduleupdate->views == 'yes') {
                        $viewspath = $module->viewspath ? $module->viewspath . '/' : '';
                        $viewsdel = File::deleteDirectory(base_path('Resources/views/' . $viewspath . $module->name));
                        $moduleupdate->update(['views'=>null,'viewspath'=>null]);
                    }
                    if ($viewsdel) {
                        return back()->with('success', "Just Deleted A Controller and Its views");
                    } else
                        return back()->with('success', 'Just Deleted A Controller');
                } else
                    return back()->with('error', 'Cannot Deleted This Controller');
                break;
        }
    }

    public function savefile(Request $request)
    {

        if ($request->content == null)
        {
            return back()->with('info', 'No Change In File');
        } else
        {
            if(File::put(base_path($request->name), $request->content)){
                if($request->filetype=='migration'){
                    Artisan::call('migrate:rollback', ['--realpath'=>$request->name]);
                    Artisan::call('migrate', ['--realpath'=>$request->name]);
                }
            return back()->with('success', 'Succesfully Saved');
            }
            else
            back()->with('error', 'We Expereince Some Error While Saving This File');
        }
    }
}
