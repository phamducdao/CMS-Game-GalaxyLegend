<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Model\trackingiap ;
class chartController extends Controller
{ 
    
    public function report(){
        $data['source'] = trackingiap::select('source')->distinct()->get()->count();
        $data['customer'] = trackingiap::select('playerid')->distinct()->get()->count();
        $data['sales'] =trackingiap::count();
        $stats= DB::table('trackingiap as t')->leftjoin('iap as i','t.packageiap','=','i.packageiap')->groupBy('t.packageiap')->get([
            DB::raw('price'),
            DB::raw('count(t.packageiap) as value')
        ]);
        $arr=array();
        foreach($stats as $value){      
            $a= $value->value;
            $b= $value->price;
            array_push($arr,$a*$b);
        }
        $data['sum'] = number_format(array_sum($arr));
        return view('index1',$data);
    }
    public function getchart(){
        return view('iap.chart');
    }
    public function getchart1(){
        $days = Input::get('day');
        $range = Carbon::now()->subDays($days);
        $stats =DB::table('trackingiap')->where('createdate', '>=', $range)->groupBy('createdate')->orderBy('createdate', 'ASC')->get([
        DB::raw('Date(createdate) as date'),
        DB::raw('COUNT(*) as value'),
        
        ]);
        return $stats;
    }
    public function gettotal(){
        $days = Input::get('day');
        $range = Carbon::now()->subDays($days);
        $stats = DB::table('trackingiap as t')->leftjoin('iap as i','t.packageiap','=','i.packageiap')->where('t.createdate','>=',$range)->get([
            DB::raw('SUM(price) as total')
        ])->toArray();
        foreach($stats as $value){
            $sum=$value->total;
        }
        return number_format($sum).' VND' ;
    }
    public function gettotalcustom(Request $request){
        $days1 = $request->day['start_date'];
        $days2 = $request->day['end_date'];
        $stats = DB::table('trackingiap as t')->leftjoin('iap as i','t.packageiap','=','i.packageiap')->whereBetween('createdate',[$days1,$days2])->get([
            DB::raw('SUM(price) as total')
        ])->toArray();
        foreach($stats as $value){
            $sum=$value->total;
        }
        return number_format($sum).' VND' ;

    }
    public function getchart2(){
        $days = Input::get('day');
        $range = date(Carbon::now()->subDays($days));
        $stats =  DB::table('trackingiap')->where('createdate','>=',$range)->groupBy('source')->get([
            DB::raw('source'),
            DB::raw('count(source) as value')
        ]);
         return $stats;
    }

    public function getchart3(){
        $days = Input::get('day');
        $range = date(Carbon::now()->subDays($days));
        $stats =  DB::table('trackingiap as t')->leftjoin('iap as i','i.packageiap','=','t.packageiap')->where('t.createdate','>=',$range)->groupBy('t.packageiap')->get([
            DB::raw('i.name'),
            DB::raw('count(t.packageiap) as value'),
            DB::raw('t.packageiap')
        ]);
         return $stats;
    }
    public function totaliap(){
        $days = Input::get('day');
        $range = Carbon::now()->subDays($days);
        $stats = DB::table('trackingiap')->where('createdate','>=',$range)->get([
            DB::raw('count(packageiap) as total')
        ])->toArray();
        foreach($stats as $value){
            $sum=$value->total;
        }
        return number_format($sum) ;
    }
    public function getchart4(){
        $days = Input::get('day');
        $range = date(Carbon::now()->subDays($days));
        $stats = DB::table('trackingiap as t')->leftjoin('player as p','t.playerid','=','p.id')
        ->where('t.createdate','>=',$range)->groupBy('playerid')->get([
            DB::raw('count(playerid) as value'),
            DB::raw('p.name')
            
        ]);
         return $stats;
    }
    public function getchart5(Request $request){
        $days1 = $request->day['start_date'];
        $days2 = $request->day['end_date'];
        $stats = DB::table('trackingiap')->whereBetween('createdate',[$days1,$days2])->groupBy('createdate')->get([
            DB::raw('createdate as date'),
            DB::raw('count(createdate) as value')
        ]);
        return $stats ;
    }
    public function getchartcustomsource(Request $request){
        $days1 = $request->day['start_date'];
        $days2 = $request->day['end_date'];
        $stats = DB::table('trackingiap')->whereBetween('createdate',[$days1,$days2])->groupBy('source')->get([
            DB::raw('source as source'),
            DB::raw('count(source) as value')
        ]);
        return $stats ;
    }
    public function totaliapcustom(Request $request){
        $days1 = $request->day['start_date'];
        $days2 = $request->day['end_date'];
        $stats = DB::table('trackingiap as t')->whereBetween('createdate',[$days1,$days2])->get([
            DB::raw('COUNT(source) as total')
        ])->toArray();
        foreach($stats as $value){
            $sum=$value->total;
        }
        return number_format($sum) ;
    }
    public function getcustomercustom(Request $request){
        $days1 = $request->day['start_date'];
        $days2 = $request->day['end_date'];
        $stats =  DB::table('trackingiap as t')->leftjoin('iap as i','i.packageiap','=','t.packageiap')->whereBetween('t.createdate',[$days1,$days2])->groupBy('t.packageiap')->get([
            DB::raw('i.name'),
            DB::raw('count(t.packageiap) as value'),
            DB::raw('t.packageiap')
        ]);
         return $stats;
    }
    public function gettotalcustomercustom(Request $request){
        $days1 = $request->day['start_date'];
        $days2 = $request->day['end_date'];
        $stats = DB::table('trackingiap as t')->whereBetween('createdate',[$days1,$days2])->get([
            DB::raw('COUNT(packageiap) as total')
        ])->toArray();
        foreach($stats as $value){
            $sum=$value->total;
        }
        return number_format($sum) ;
    }
    public function gettylesource(){
        $totalsource= trackingiap::count();
        $facebook = trackingiap::where('source','facebook')->count();
        $google = trackingiap::where('source','google')->count();
        $zalo = trackingiap::where('source','zalo')->count();
        $unity = trackingiap::where('source','unity')->count();
        $data['facebook'] = ROUND(($facebook/$totalsource)* 100) ;
        $data['google'] = ROUND(($google/$totalsource)*100);
        $data['zalo'] = ROUND(($zalo/$totalsource)*100);
        $data['unity'] = 100-($data['facebook']+$data['google']+$data['zalo']);
        $result = [] ;
        foreach($data as $key=>$value){           
            array_push($result, ['label' => $key, 'value' => $value]);
        }
        return($result) ;
    }

}
