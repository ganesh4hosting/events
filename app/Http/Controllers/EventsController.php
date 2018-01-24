<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Events;

class EventsController extends Controller {
   
 
   public function checklogin(Request $request)
   { 
       $username = $request->input('username');
       $password = $request->input('pwd');
       
       $request->session()->put('uname', $username);
       $datarr = array('uname' => $username); 
       if($username == 'admin' && $password == 'admin')
       {
            return view('adminpage', $datarr);
       }else
       { 
		   $alldata =  User::selectRaw('event_ids')->where(array(array(DB::raw('LOWER(uname)'),'=', strtolower($username)), array('pass','=',$password)))->get();
			
         
            if(!empty($alldata))
            {
				$eventids =  trim($alldata[0]->event_ids, ",");
				$eventidarr = array_filter(explode("," , $eventids));
				
				$eventarr =  Events::selectRaw('event_name')->whereIn('id', $eventidarr)->get();
				
				return view('userpage', compact('eventarr','datarr'));
				
				
			}else
			{ 
				  $arr = array('isvalid', '0');
				  return view('index',  array('isvalid' => '0'));
			}
	   }
   }
   
   
   function assignuser(Request $request)
   { 
	   $uname = $request->session()->get('uname');
	   if($uname == 'admin')
	   {
		   $username = $request->input('username');
		   $password = $request->input('pwd');
		   
		   $allevents =  Events::all();
		   $alluser =  User::all();
		
	
       
         return view('assignuser', compact('allevents','alluser'));
	  }
	  else
	  {
		  echo "Not Authorised User!"; 
	  }
       
   }
   
   function logout(Request $request)
   {
	 
		$request->session()->put('uname','');
	
        return view('index', array('isvalid' => true));
   }
}




?>
