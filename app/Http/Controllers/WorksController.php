<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Work;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('view_works');
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $works = Work::where('name', 'LIKE', "%$keyword%")
                ->orWhere('charge', 'LIKE', "%$keyword%")
                ->orWhere('bank_charge', 'LIKE', "%$keyword%")
                ->orWhere('max_discount_percent', 'LIKE', "%$keyword%")
                ->orWhere('min_days', 'LIKE', "%$keyword%")
                ->orWhere('max_days', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $works = Work::latest()->paginate($perPage);
        }

        return view('works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create_works');
        return view('works.create');
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
			'min_days' => 'required',
			'max_days' => 'required'
		]);
        $requestData = $request->all();
        
        Work::create($requestData);

        return redirect('admin/works')->with('success', 'Work added!');
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
        $this->authorize('show_works');
        $work = Work::findOrFail($id);

        return view('works.show', compact('work'));
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
        $this->authorize('edit_works');
        $work = Work::findOrFail($id);

        return view('works.edit', compact('work'));
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
			'min_days' => 'required',
			'max_days' => 'required'
		]);
        $requestData = $request->all();
        
        $work = Work::findOrFail($id);
        $work->update($requestData);

        return redirect('admin/works')->with('success', 'Work updated!');
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
        $this->authorize('delete_works');
        Work::destroy($id);

        return redirect('admin/works')->with('success', 'Work deleted!');
    }
}
