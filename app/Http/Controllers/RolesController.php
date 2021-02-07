<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class RolesController extends Controller
{
    use HasRoles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $roles = Role::where('name', 'LIKE', "%$keyword%")
                ->orWhere('guard_name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $roles = Role::latest()->paginate($perPage);
        }

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $permissions=Permission::all()->toArray();

        return view('roles.create')->with(compact('permissions'));
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
        if($request->item==null){return back()->with('error','Add Some Permissions');}
        $keys=array_keys($request->item);
        $requestData = $request->all();
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $reponse = Role::create($requestData);
        $reponse->syncPermissions($keys);
        return redirect('admin/roles')->with('success', 'Role added!');
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
        $role = Role::findOrFail($id);

        return view('roles.show', compact('role'));
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
        $permissions =Permission::all();
        $role = Role::findOrFail($id);
        $checked=$role->getAllPermissions()->map(function($role){
            return $role['name'];
        });
        return view('roles.edit', compact('role','permissions','checked'));
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
        $request->item?$keys=array_keys($request->item):"";
        $requestData = $request->all();
        $role = Role::findOrFail($id);
        $request->item?$role->syncPermissions($keys):$role->syncPermissions();
        $role->update($requestData);

        return redirect('admin/roles')->with('success', 'Role updated!');
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
        Role::destroy($id);

        return redirect('admin/roles')->with('success', 'Role deleted!');
    }
}
