<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('view_services');
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $services = Service::where('name', 'LIKE', "%$keyword%")
                ->orWhere('charge', 'LIKE', "%$keyword%")
                ->orWhere('bank_charge', 'LIKE', "%$keyword%")
                ->orWhere('max_discount_percent', 'LIKE', "%$keyword%")
                ->orWhere('min_days', 'LIKE', "%$keyword%")
                ->orWhere('max_days', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $services = Service::latest()->paginate($perPage);
        }

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create_services');
        return view('services.create');
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
        
        Service::create($requestData);

        return redirect('admin/services')->with('success', 'Service added!');
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
        $this->authorize('show_services');
        $service = Service::findOrFail($id);

        return view('services.show', compact('service'));
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
        $this->authorize('edit_services');
        $service = Service::findOrFail($id);

        return view('services.edit', compact('service'));
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
        
        $service = Service::findOrFail($id);
        $service->update($requestData);

        return redirect('admin/services')->with('success', 'Service updated!');
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
        $this->authorize('delete_services');
        Service::destroy($id);

        return redirect('admin/services')->with('success', 'Service deleted!');
    }
}
