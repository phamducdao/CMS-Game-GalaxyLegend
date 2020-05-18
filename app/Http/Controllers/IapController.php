<?php

namespace App\Http\Controllers;
use App\Model\iap;
use App\Model\trackingiap;
use App\Model\trackinginstall;
use Illuminate\Http\Request;

class IapController extends Controller
{
    //
    public function getiap(){
        $data['iap'] = iap::all();
        return view('iap.iap',$data);
    }
    public function gettrackingiap(){
        $data['trackingiap'] = trackingiap::paginate(50);
       // dd($data);
        return view('iap.trackingiap',$data);
    }
    public function gettrackinginstall(){
        $data['trackinginstall'] = trackinginstall::paginate(50);
        return view('iap.trackinginstall',$data);
    }
}
