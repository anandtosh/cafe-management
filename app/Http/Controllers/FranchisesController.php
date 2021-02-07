<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Franchise;
use Illuminate\Http\Request;

class FranchisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('view_franchises');
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $franchises = Franchise::where('name', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('contact_person', 'LIKE', "%$keyword%")
                ->orWhere('contact_number', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('docs_pdf', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $franchises = Franchise::latest()->paginate($perPage);
        }

        return view('franchises.index', compact('franchises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create_franchises');
        return view('franchises.create');
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
			'name' => 'required',
			'address' => 'required',
			// 'contact_number' => 'min:10',
			// 'contact_number' => 'max:10',
			// 'email' => 'unique:franchises',
			'docs_pdf' => 'mimes:pdf'
		]);
        $requestData = $request->all();
                if ($request->hasFile('docs_pdf')) {
            $requestData['docs_pdf'] = $request->file('docs_pdf')
                ->store('uploads', 'public');
        }

        Franchise::create($requestData);

        return redirect('admin/franchises')->with('success', 'Franchise added!');
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
        $this->authorize('show_franchises');
        $franchise = Franchise::findOrFail($id);

        return view('franchises.show', compact('franchise'));
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
        $this->authorize('edit_franchises');
        $franchise = Franchise::findOrFail($id);

        return view('franchises.edit', compact('franchise'));
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
			'name' => 'required',
			'address' => 'required',
			// 'contact_number' => 'min:10',
			// 'contact_number' => 'max:10',
			// 'email' => 'unique:franchises',
			'docs_pdf' => 'mimes:pdf'
		]);
        $requestData = $request->all();
                if ($request->hasFile('docs_pdf')) {
            $requestData['docs_pdf'] = $request->file('docs_pdf')
                ->store('uploads', 'public');
        }

        $franchise = Franchise::findOrFail($id);
        $franchise->update($requestData);

        return redirect('admin/franchises')->with('success', 'Franchise updated!');
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
        $this->authorize('delete_franchises');
        Franchise::destroy($id);

        return redirect('admin/franchises')->with('success', 'Franchise deleted!');
    }
}
