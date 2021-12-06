<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taxyear;
class TaxyearController extends Controller
{
    //
    function show()
    {
      $this->authorize('taxyear');
       // return "Hello Form Controller";
      // return view('list');
      $data= Taxyear::paginate(5);
      return view('taxyear',['taxyears'=>$data]);
    }

    function addtaxyear(Request $req)
    {
       // return "Hello Form Controller";
      // return view('list');
      $taxyear=new Taxyear;
      $taxyear->taxyear=$req->taxyear;
     
      $taxyear->save();
      return redirect('taxyear');
    }

  public  function taxyears($id){
        taxyear::all();
    }

    public function __construct()
    {
    
        $this->middleware("auth");
    
    }
}
