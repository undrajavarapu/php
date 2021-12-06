<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Ticket;
use App\Models\Service;
//use Auth;

class TicketController extends Controller
{
    //

    function show()
    {
      //$this->authorize('ticket');
       // return "Hello Form Controller";
      // return view('list');
      $user = Auth::user();
      $id = Auth::id();
     // echo $id;
     if($user->role!='admin'){
      $data= Ticket::join('users','users.id','=','tickets.userid')
                     ->join('services','services.id','=','tickets.serviceid')
                     ->where('userid','=',$id)
                     ->get(['tickets.id','users.name','services.service'])
                    
                     
                    ;
                  }
                  else{
                    $data= Ticket::join('users','users.id','=','tickets.userid')
                     ->join('services','services.id','=','tickets.serviceid')
                     
                     ->get(['tickets.id','users.name','services.service'])
                    
                     
                    ;

                  }   


      $taxi = Service::all();
      return view('ticket',['tickets'=>$data],['services'=>$taxi]);
    }

    function addticket(Request $req)
    {
       // return "Hello Form Controller";
      // return view('list');
      
      $ticket=new Ticket;
      $ticket->serviceid=$req->serviceid;
      $ticket->userid=Auth::id();
      $ticket->save();
      return redirect('ticket');
    }


    public function __construct()
{

    $this->middleware("auth");

}
 
}
