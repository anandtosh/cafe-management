<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use DB;
use App\Recharge;
use Illuminate\Http\Request;

class RechargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('view_recharges');
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $recharges = Recharge::where('amount', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $recharges = Recharge::latest()->paginate($perPage);
        }

        return view('recharges.index', compact('recharges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create_recharges');
        return view('recharges.create');
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
			'amount' => 'required'
		]);
        $requestData = $request->all();

        Recharge::create($requestData);

        return redirect('admin/recharges')->with('success', 'Recharge added!');
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
        $this->authorize('show_recharges');
        $recharge = Recharge::findOrFail($id);

        return view('recharges.show', compact('recharge'));
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
        $this->authorize('edit_recharges');
        $recharge = Recharge::findOrFail($id);

        return view('recharges.edit', compact('recharge'));
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
			'amount' => 'required'
		]);
        $requestData = $request->all();

        $recharge = Recharge::findOrFail($id);
        $recharge->update($requestData);

        return redirect('admin/recharges')->with('success', 'Recharge updated!');
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
        $this->authorize('delete_recharges');
        Recharge::destroy($id);

        return redirect('admin/recharges')->with('success', 'Recharge deleted!');
    }

    public function showQRCode()
    {
        return view('recharges.qr-code');
    }

    public function receiptPost(Request $request){
        $franchise_id = Auth::user()->franchise_id;
        if ($request->hasFile('file')) {
            $file = $request->file('file')
                ->store('uploads', 'public');
        }
        DB::table('recharge_receipts')->insert([
            'transaction_id'=>$request->transaction_id,
            'amount' => $request->amount,
            'file' => $file,
            'status' => 'PENDING',
            'franchisee_id' => $franchise_id,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        return response()->json(['state'=>'reload']);
    }

    public function approve($id){
        if(Auth::user()->hasRole('Admin|Developer')){
            DB::table('recharge_receipts')->where('id',$id)->update([
                'status' => 'APPROVED',
            ]);
        }
        return redirect()->route('online-recharge');
    }

    public function failed($id){
        if(Auth::user()->hasRole('Admin|Developer')){
            DB::table('recharge_receipts')->where('id',$id)->update([
                'status' => 'FAILED',
            ]);
        }
        return redirect()->route('online-recharge');
    }

    public function pending($id){
        if(Auth::user()->hasRole('Admin|Developer')){
            DB::table('recharge_receipts')->where('id',$id)->update([
                'status' => 'PENDING',
            ]);
        }
        return redirect()->route('online-recharge');
    }

}
