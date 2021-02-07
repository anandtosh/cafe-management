<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\AppFile;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AppfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('view_appfiles');
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $appfiles = AppFile::where('name', 'LIKE', "%$keyword%")
                ->orWhere('path', 'LIKE', "%$keyword%")
                ->orWhere('filename', 'LIKE', "%$keyword%")
                ->orWhere('extension', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $appfiles = AppFile::latest()->paginate($perPage);
        }

        return view('appfiles.index', compact('appfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create_appfiles');
        return view('appfiles.create');
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

        $requestData = $request->all();

        AppFile::create($requestData);

        return redirect('developer/appfiles')->with('success', 'AppFile added!');
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
        $this->authorize('show_appfiles');
        $appfile = AppFile::findOrFail($id);
        $path=$appfile->path.'/'.$appfile->filename.'.'.$appfile->extension;
        $result=File::get(base_path($path));
        return view('appfiles.editor', compact('path','result'));
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
        $this->authorize('edit_appfiles');
        $appfile = AppFile::findOrFail($id);

        return view('appfiles.edit', compact('appfile'));
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

        $requestData = $request->all();

        $appfile = AppFile::findOrFail($id);
        $appfile->update($requestData);

        return redirect('developer/appfiles')->with('success', 'AppFile updated!');
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
        $this->authorize('delete_appfiles');
        AppFile::destroy($id);

        return redirect('developer/appfiles')->with('success', 'AppFile deleted!');
    }

    public function savefile(Request $request)
    {

        if ($request->content == null)
        {
            return back()->with('info', 'No Change In File');
        } else
        {
            if(File::put(base_path($request->name), $request->content)){
            return back()->with('success', 'Succesfully Saved');
            }
            else
            back()->with('error', 'We Expereince Some Error While Saving This File');
        }
    }

}
