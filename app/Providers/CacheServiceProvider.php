<?php

namespace App\Providers;

use App\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use App\Setting;
use Carbon\Carbon;
use App\Franchise;

class CacheServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
            $settings=Setting::where('active',1)->get();
            foreach($settings as $item){
                if(!Cache::has($item->key))
                Cache::put($item->key, $item->value, 1200);
            }
            if(!Cache::has('configs')){
                Cache::put('configs', Config::all(), 300);
            }
            if(!session('fiscal')){
            $cfiscal=Carbon::now()->subMonth(3)->year;
            session(['fiscal'=>$cfiscal.'-'.($cfiscal+1)]);
            session(['fiscal_id'=>Config::where('name',session('fiscal'))->first()->id]);
            }

            if(!Cache::has('franchises')){
                Cache::put('franchises',Franchise::all(),1200);
            }
            // dd(session('franchise'));
    }
}
