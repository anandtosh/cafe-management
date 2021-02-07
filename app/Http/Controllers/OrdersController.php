<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Order;
use App\Franchise;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listi-ng of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('view_orders');
        $keyword = $request->get('search');
        $franchise = $request->get('franchise');
        $perPage = 25;

        if (!empty($keyword)) {
            $orders = Order::where('applied_on', 'LIKE', "%$keyword%")
                ->orWhere('resolved_on', 'LIKE', "%$keyword%")
                ->orWhere('current_status', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('uploads', 'LIKE', "%$keyword%")
                ->orWhere('amount', 'LIKE', "%$keyword%")
                ->orWhere('created_at', 'LIKE', "%$keyword%")
                ->latest();
        } else {
            $orders = Order::latest();
        }
        if(!empty($franchise)){
            $orders= $orders->where('franchise_id',$franchise);
        }
        $orders=auth()->user()->hasAnyRole('Developer','Admin')?$orders:$orders->franchisefil();

        $orders=$orders->paginate($perPage);
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create_orders');
        if(session('franchise_id'))
        {
            if(Franchise::find(session('franchise_id'))->opening-Order::where('franchise_id',session('franchise_id'))->pluck('amount')->sum()+\App\Recharge::where('franchise_id',session('franchise_id'))->pluck('amount')->sum()<=0)
            {
                return back()->with('error','Credit Limit Exceeded');
            } 
        }
        return view('orders.create');
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
			'applied_on' => 'required',
			'description' => 'required',
            'amount' => 'required',
            'uploads'=> 'mimes:pdf',
            'uploads'=>'max:15600',
		]);
        $requestData = $request->all();
                if ($request->hasFile('uploads')) {
            $requestData['uploads'] = $request->file('uploads')
                ->store('uploads', 'public');
        }
        $requestData['current_status']='PENDING';
        Order::create($requestData);

        return redirect('admin/orders')->with('success', 'Order added!');
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
        $this->authorize('show_orders');
        $order = Order::findOrFail($id);

        return view('orders.show', compact('order'));
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
        $this->authorize('edit_orders');
        $order = Order::findOrFail($id);

        return view('orders.edit', compact('order'));
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
			'admin_upload' => 'required',
			'admin_upload'=> 'mimetypes:application/pdf',
            'admin_upload'=>'max:15600',
		]);
        $requestData = $request->all();
                if ($request->hasFile('admin_upload')) {
            $requestData['admin_upload'] = $request->file('admin_upload')
                ->store('uploads', 'public');
        }
        $requestData['current_status']='DONE';
        $order = Order::findOrFail($id);
        $order->update($requestData);

        return redirect('admin/orders')->with('success', 'Order updated!');
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
        $this->authorize('delete_orders');
        Order::destroy($id);

        return redirect('admin/orders')->with('success', 'Order deleted!');
    }

    public function wallet(){

        return view('orders.wallet');
    }



}
