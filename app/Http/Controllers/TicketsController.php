<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('view_tickets');
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $tickets = Ticket::where('description', 'LIKE', "%$keyword%")
                ->orWhere('attatchment', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('admin_remark', 'LIKE', "%$keyword%")
                ->orWhere('admin_attatchment', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tickets = Ticket::latest()->paginate($perPage);
        }

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create_tickets');
        return view('tickets.create');
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
			'description' => 'required',
			'attatchment' => 'mimes:jpg,pdf,png',
			'admin_attatchment' => 'mimes:jpg,pdf,png'
		]);
        $requestData = $request->all();
                if ($request->hasFile('attatchment')) {
            $requestData['attatchment'] = $request->file('attatchment')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('admin_attatchment')) {
            $requestData['admin_attatchment'] = $request->file('admin_attatchment')
                ->store('uploads', 'public');
        }

        Ticket::create($requestData);

        return redirect('admin/tickets')->with('success', 'Ticket added!');
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
        $this->authorize('show_tickets');
        $ticket = Ticket::findOrFail($id);

        return view('tickets.show', compact('ticket'));
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
        $this->authorize('edit_tickets');
        $ticket = Ticket::findOrFail($id);

        return view('tickets.edit', compact('ticket'));
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
			'description' => 'required',
			'attatchment' => 'mimes:jpg,pdf,png',
			'admin_attatchment' => 'mimes:jpg,pdf,png'
		]);
        $requestData = $request->all();
                if ($request->hasFile('attatchment')) {
            $requestData['attatchment'] = $request->file('attatchment')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('admin_attatchment')) {
            $requestData['admin_attatchment'] = $request->file('admin_attatchment')
                ->store('uploads', 'public');
        }

        $ticket = Ticket::findOrFail($id);
        $ticket->update($requestData);

        return redirect('admin/tickets')->with('success', 'Ticket updated!');
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
        $this->authorize('delete_tickets');
        Ticket::destroy($id);

        return redirect('admin/tickets')->with('success', 'Ticket deleted!');
    }
}
