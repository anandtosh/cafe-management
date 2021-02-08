<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Distributor;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DistributorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('view_distributor');
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $distributors = Distributor::where('name', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('contact_person', 'LIKE', "%$keyword%")
                ->orWhere('contact_number', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('docs_pdf', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $distributors = Distributor::latest()->paginate($perPage);
        }

        return view('distributors.index', compact('distributors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create_distributors');
        return view('distributors.create');
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
			// 'email' => 'unique:distributors',
			'docs_pdf' => 'mimes:pdf'
		]);
        $requestData = $request->all();
                if ($request->hasFile('docs_pdf')) {
            $requestData['docs_pdf'] = $request->file('docs_pdf')
                ->store('uploads', 'public');
        }

        Distributor::create($requestData);

        $user['password']=Hash::make($requestData['email']);
        $user['email'] = $requestData['email'];
        $user['name']=$requestData['name'];

        $user=User::create($user);
        $user->assignRole('Distributor');


        return redirect('admin/distributors')->with('success', 'Distributor added!');
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
        $this->authorize('show_distributors');
        $distributors = Distributor::findOrFail($id);

        return view('distributors.show', compact('distributors'));
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
        $this->authorize('edit_distributors');
        $distributors = Distributor::findOrFail($id);

        return view('distributors.edit', compact('distributors'));
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
			// 'email' => 'unique:distributors',
			'docs_pdf' => 'mimes:pdf'
		]);
        $requestData = $request->all();
                if ($request->hasFile('docs_pdf')) {
            $requestData['docs_pdf'] = $request->file('docs_pdf')
                ->store('uploads', 'public');
        }

        $distributors = Distributor::findOrFail($id);
        $distributors->update($requestData);

        return redirect('admin/distributors')->with('success', 'Distributor updated!');
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
        $this->authorize('delete_distributors');
        Distributor::destroy($id);

        return redirect('admin/distributors')->with('success', 'Distributor deleted!');
    }
}
