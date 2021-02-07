<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Ledger;
use Illuminate\Http\Request;

class LedgersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('view_ledgers');
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $ledgers = Ledger::where('name', 'LIKE', "%$keyword%")
                ->orWhere('contact', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('bank_ac_no', 'LIKE', "%$keyword%")
                ->orWhere('bank_ifsc', 'LIKE', "%$keyword%")
                ->orWhere('bank_branch', 'LIKE', "%$keyword%")
                ->fiscal()->franchise()
                ->latest()->paginate($perPage);
        } else {
            $ledgers = Ledger::latest()->fiscal()->franchise()->paginate($perPage);
        }
        return view('ledgers.index', compact('ledgers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create_ledgers');
        return view('ledgers.create');
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

        Ledger::create($requestData);

        return redirect('admin/ledgers')->with('success', 'Ledger added!');
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
        $this->authorize('show_ledgers');
        $ledger = Ledger::findOrFail($id);

        return view('ledgers.show', compact('ledger'));
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
        $this->authorize('edit_ledgers');
        $ledger = Ledger::findOrFail($id);

        return view('ledgers.edit', compact('ledger'));
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

        $ledger = Ledger::findOrFail($id);
        $ledger->update($requestData);

        return redirect('admin/ledgers')->with('success', 'Ledger updated!');
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
        $this->authorize('delete_ledgers');
        Ledger::destroy($id);

        return redirect('admin/ledgers')->with('success', 'Ledger deleted!');
    }
}
