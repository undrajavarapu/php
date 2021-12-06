<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    //
    
    function show()
    {
      $this->authorize('list');
       // return "Hello Form Controller";
      // return view('list');
      $data= Member::paginate(1);
      return view('list',['members'=>$data]);
    }

    function add(Request $req)
    {
       // return "Hello Form Controller";
      // return view('list');
      $member=new Member;
      $member->name=$req->name;
      $member->email=$req->email;
      $member->save();
      return redirect('list');
    }

    public function __construct()
    {
    
        $this->middleware("auth");
    
    }
}