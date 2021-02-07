<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\AppCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AppcommandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('view_appcommands');
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $appcommands = AppCommand::where('command', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('parameters', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $appcommands = AppCommand::latest()->paginate($perPage);
        }

        return view('appcommands.index', compact('appcommands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create_appcommands');
        return view('appcommands.create');
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
        $this->validate($request, [
			'command' => 'required'
		]);
        $requestData = $request->all();

        AppCommand::create($requestData);

        return redirect('developer/appcommands')->with('success', 'AppCommand added!');
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
        $this->authorize('show_appcommands');
        $appcommand = AppCommand::findOrFail($id);
        Artisan::call($appcommand->command);
        $output=Artisan::output();
        $output = str_replace("\r\n",'', $output);
        return back()->with('info',$output);
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
        $this->authorize('edit_appcommands');
        $appcommand = AppCommand::findOrFail($id);

        return view('appcommands.edit', compact('appcommand'));
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
        $this->validate($request, [
			'command' => 'required'
		]);
        $requestData = $request->all();

        $appcommand = AppCommand::findOrFail($id);
        $appcommand->update($requestData);

        return redirect('developer/appcommands')->with('success', 'AppCommand updated!');
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
        $this->authorize('delete_appcommands');
        AppCommand::destroy($id);

        return redirect('developer/appcommands')->with('success', 'AppCommand deleted!');
    }
}
