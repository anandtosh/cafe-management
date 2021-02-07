<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('view_users');
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $users = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('role', 'LIKE', "%$keyword%")
                ->latest();
        } else {
            $users = User::latest();
        }
        $users=$users->whereNotIn('id',[2])->paginate($perPage);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create_users');
        $roles=DB::table('roles')->whereNotIn('name',['Admin','Developer'])->get();
        return view('users.create',compact('roles'));
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
        // dd($request->all());
        $this->validate($request, [
			'name' => 'required',
			'email' => 'required',
            'email' => 'email:rfc',
			'password' => 'required',
			'password' => 'confirmed',
            'password_confirmation' => 'required',
            'role' => 'required'
        ]);
        $requestData = $request->all();
        $requestData['password']=Hash::make($requestData['password']);
        $user=User::create($requestData);
        $user->assignRole($request->role);
        return redirect('admin/users')->with('success', 'User added!');
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
        $this->authorize('show_users');
        $user = User::findOrFail($id);
        // dd($user->getRoleNames());
        return view('users.show', compact('user'));
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
        $this->authorize('edit_users');
        $user = User::findOrFail($id);
        $roles=DB::table('roles')->whereNotIn('name',['Admin','Developer'])->get();
        $assigned=$user->getRoleNames();
        return view('users.edit', compact('user','roles','assigned'));
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
        // dd($request->all());
        $this->validate($request, [
			'name' => 'required',
			'email' => 'required',
			'email' => 'email:rfc',
			'password' => 'required',
			'password' => 'confirmed',
            'password_confirmation' => 'required',
            'role'=>'required'
		]);
        $requestData = $request->all();
        $requestData['password']=Hash::make($requestData['password']);
        $user = User::findOrFail($id);
        $user->update($requestData);
        $user->assignRole($request->role);
        return redirect('admin/users')->with('success', 'User updated!');
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
        $this->authorize('delete_users');
        User::destroy($id);

        return redirect('admin/users')->with('success', 'User deleted!');
    }

    public function changepass(){
        $user =Auth::user();
        return view('users.changepass',compact('user'));
    }
    public function postchangepass(Request $request){
        $user =Auth::user();
        $change=User::find($user->id);
        if(Hash::check($request->oldpassword,$change->password)){
            if($request->newpass==$request->newpass_confirm){
                $change->update(['password'=> Hash::make($request->newpass)]);
                return back()->with('success','Password succesfully changed');
            }else{
                return back()->with('error','Please Confirm Password');
            }
        }else{
            return back()->with('error','Old Password Do not Matched');
        }
        // return view('users.changepass',compact('user'));
    }

}
