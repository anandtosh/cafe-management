<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Requestwork;
use Illuminate\Http\Request;

class RequestworksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('view_requestworks');
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $requestworks = Requestwork::where('name', 'LIKE', "%$keyword%")
                ->orWhere('charge_retailer', 'LIKE', "%$keyword%")
                ->orWhere('charge_customer', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $requestworks = Requestwork::latest()->paginate($perPage);
        }

        return view('requestworks.index', compact('requestworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create_requestworks');
        return view('requestworks.create');
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
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        Requestwork::create($requestData);

        return redirect('admin/requestworks')->with('success', 'Requestwork added!');
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
        $this->authorize('show_requestworks');
        $requestwork = Requestwork::findOrFail($id);

        return view('requestworks.show', compact('requestwork'));
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
        $this->authorize('edit_requestworks');
        $requestwork = Requestwork::findOrFail($id);

        return view('requestworks.edit', compact('requestwork'));
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
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        $requestwork = Requestwork::findOrFail($id);
        $requestwork->update($requestData);

        return redirect('admin/requestworks')->with('success', 'Requestwork updated!');
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
        $this->authorize('delete_requestworks');
        Requestwork::destroy($id);

        return redirect('admin/requestworks')->with('success', 'Requestwork deleted!');
    }
}
