<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('view_sales');
        $keyword = $request->get('search');
        $status = $request->get('status');
        $pstatus = $request->get('pstatus');
        $work = $request->get('work');
        $byid = $request->get('byid');
        $perPage = 25;

        if (!empty($keyword)) {
            $sales = Sale::where('name', 'LIKE', "%$keyword%")
                ->orWhere('contact_number', 'LIKE', "%$keyword%")
                ->orWhere('qty', 'LIKE', "%$keyword%")
                ->orWhere('rate', 'LIKE', "%$keyword%")
                ->orWhere('bank_fee', 'LIKE', "%$keyword%")
                ->orWhere('bank_fee_extra_charge', 'LIKE', "%$keyword%")
                ->orWhere('total', 'LIKE', "%$keyword%")
                ->orWhere('receivable', 'LIKE', "%$keyword%")
                ->orWhere('created_at', 'LIKE', "%$keyword%")
                ->latest()->fiscal()->franchisefil();
        } else {
            $sales = Sale::latest()->fiscal()->franchisefil();
        }
        if(!empty($status)){
            $sales= $sales->where('status',$status);
        }
        if(!empty($pstatus)){
            $sales= $sales->where('received',$pstatus);
        }
        if(!empty($work)){
            $sales= $sales->where('work_id',$work);
        }
        if(!empty($byid)){
            $sales= $sales->where('id',$byid);
        }
        $sales =$sales->paginate($perPage);
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create_sales');
        return view('sales.create');
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
        $sale=Sale::create($requestData);
        if($requestData['amount']!=null&&$requestData['amount']!=0){
            $sale->receipts()->create($requestData);
            return redirect('admin/sales')->with('success', 'Sale added! With amount received');
        }
        return redirect('admin/sales')->with('info', 'Sale added! Without amount');
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
        $this->authorize('show_sales');
        $sale = Sale::findOrFail($id);

        return view('sales.show', compact('sale'));
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
        $this->authorize('edit_sales');
        $sale = Sale::findOrFail($id);

        return view('sales.edit', compact('sale'));
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
        // dd($requestData);
        $sale = Sale::findOrFail($id);
        $sale->update($requestData);

        return redirect('admin/sales')->with('success', 'Sale updated!');
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
        $this->authorize('delete_sales');
        Sale::destroy($id);

        return redirect('admin/sales')->with('success', 'Sale deleted!');
    }

    public function postreceipt(Request $request){
        $data=$request->all();
        $sale=Sale::findOrFail($data['id']);
        $sale->update($data);
        if($data['amount']!=null&&$data['remark']!=null&&$data['amount']!=0){
            $sale->receipts()->create($data);
            return redirect('admin/sales')->with('success', 'Successfully Updated Receipt');
        }
        return redirect('admin/sales')->with('error', 'You Just Missed Something');
    }
    public function poststatus(Request $request){
        $data=$request->all();
        $sale=Sale::findOrFail($data['id']);
        $sale->update($data);
        if($data['status']!=null){
            $sale->statuses()->create($data);
            return redirect('admin/sales')->with('success', 'Successfully Updated Status');
        }
        return redirect('admin/sales')->with('error', 'You Just Missed Something');
    }
}
