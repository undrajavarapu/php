<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    function index(Request $req)
    {
        $this->authorize('upload');
       // return "Hello Form Controller";
       return $req->file('file')->store('docs');
    }

    public function __construct()
    {
    
        $this->middleware("auth");
    
    }

}
