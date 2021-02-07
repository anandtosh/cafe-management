<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class AjaxController extends Controller
{

    public function root(Request $request)
    {
        // dd($request->all());
        $function=$request->function;
        $requestData=$request;
        return $this->$function($requestData);
    }
    //
    public function useid(Request $request){
        $value=$request->value;
        $table=$request->path;
        $result=DB::table($table)->find($value);
        if($result)
        return response()->json($result);
        else
        return 1;
    }

    public function singleget(Request $request){
        $col=$request->column;
        $table=$request->path;
        $value=$request->value;
        $result=DB::table($table)->where($col,$value)->first();
        if($result)
        return response()->json($result);
        else
        return 1;
    }

    public function multipleget(Request $request){
        $col=$request->column;
        $table=$request->path;
        $value=$request->value;
        $result=DB::table($table)->where($col,$value)->get();
        if($result)
        return response()->json($result);
        else
        return 1;
    }
    public function multiplematch(Request $request){
        $col=$request->column;
        $table=$request->path;
        $value=$request->value;
        $result=DB::table($table)->where($col,'like',"%$value%")->get();
        if($result)
        return response()->json($result);
        else
        return 1;
    }

    // here we ajaxify all select 2 relations
    public function select2relation(Request $request){
        $col=$request->column;
        $table=$request->path;
        $value=$request->value;
        $data=[];
        $data[]=['id'=>'','text'=>'None'];
        if($value){
            $result=DB::table($table)->where($col,'like',"%$value%")->get();
            if($request->filtercol!=null)
            $result=$result->where($request->filtercol,$request->filterval);
        }else{
            $result=DB::table($table)->limit(5)->get();
            if($request->filtercol!=null)
            $result=$result->where($request->filtercol,$request->filterval);
        }
        if($result){
            foreach ($result as $item) {
                $data[]=['id'=>$item->id,'text'=>$item->$col];
            }
        return json_encode($data);
        }
    }

    // ajax controller for sale calculation
    public function salecalculation(Request $request){
        $fromdate = $request->fromdate;
        $todate =$request->todate;
        if($fromdate!=null&&$todate!=null&&session('fiscal_id')&&session('franchise_id')){
            $totalsale=DB::table('sales')->where('fiscal_id',session('fiscal_id'))
            ->where('franchise_id',session('franchise_id'))
            ->where('created_at','>=',$fromdate)->where('created_at','<=',$todate)
            ->pluck('receivable')->sum();
            $totalwork=DB::table('sales')->select(DB::raw('sum(rate*qty) as totalwork'))->where('fiscal_id',session('fiscal_id'))
            ->where('franchise_id',session('franchise_id'))
            ->where('created_at','>=',$fromdate)->where('created_at','<=',$todate)
            ->pluck('totalwork')->sum();
            $totalbank=DB::table('sales')->select(DB::raw('sum(bank_fee*qty) as totalfee'))->where('fiscal_id',session('fiscal_id'))
            ->where('franchise_id',session('franchise_id'))
            ->where('created_at','>=',$fromdate)->where('created_at','<=',$todate)
            ->pluck('totalfee')->sum();
            $totalbankextra=DB::table('sales')->select(DB::raw('sum(bank_fee_extra_charge*qty) as totalextra'))->where('fiscal_id',session('fiscal_id'))
            ->where('franchise_id',session('franchise_id'))
            ->where('created_at','>=',$fromdate)->where('created_at','<=',$todate)
            ->pluck('totalextra')->sum();
            $data =['totalsale'=> $totalsale,'totalwork'=>$totalwork,
                    'totalbank'=>$totalbank,'totalbankextra'=>$totalbankextra];
            return $data;
        }
        return 1;
    }


}
