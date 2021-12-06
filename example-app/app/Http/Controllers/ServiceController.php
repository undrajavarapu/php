<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Taxyear;
class ServiceController extends Controller
{
    //
    
    function show()
    {
      $this->authorize('service');
       // return "Hello Form Controller";
      // return view('list');
      $data= Service::paginate(1);
      $taxi = Taxyear::all();
      return view('service',['services'=>$data],['taxyears'=>$taxi]);
    }

    function addservice(Request $req)
    {
       // return "Hello Form Controller";
      // return view('list');
      $service=new Service;
      $service->service=$req->service;
      $service->description=$req->description;
      $service->taxyearid=$req->taxyearid;
      $service->save();
      return redirect('service');
    }
    
}
