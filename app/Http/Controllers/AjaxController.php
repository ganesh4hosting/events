<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Database\QueryException;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Events;

class AjaxController extends Controller {
   
  
   
   function adduser(Request $request)
   {
	   
    $username = $request->input('uname');
      
    $alldata =  User::all(); 
    $exist = false; 
    $emtyflg = (empty($alldata)) ? true : false; 
   
    if($emtyflg == false)
    {
		foreach($alldata as $key => $user)
		{
			if(strtolower($username) == strtolower($user->uname))
			{
				$exist = true;
			}
			
		}
	}
    
    if($exist ==  false)
    {
		$data = array('uname' => $username, 'pass' => '123456' , 'update_date' => date('Y-m-d H:i:s'));
		DB::table('user')->insert($data);
		echo "User Added Successfully !";
	}
	else
	{
		echo "User Already Exist !";
	}
    
   }
   
   
    function addevent(Request $request)
	{
			$event = $request->input('event');
			
			$alldata =  Events::all(); 
			$exist = false;
			
			$emtyflg = (empty($alldata)) ? true : false; 
			
			if($emtyflg == false)
			{
				foreach($alldata as $key => $eventobj)
				{
					if(strtolower($event) == strtolower($eventobj->event_name))
					{
						$exist = true;
					}
					
				}
			}
			
			if($exist ==  false)
			{
				$data = array('event_name' => $event, 'cur_date' => date('Y-m-d H:i:s'));
				DB::table('events')->insert($data);
				echo "Event Added Successfully !";
			}
			else
			{
				echo "Event Already Exist !";
			}
    
	}
	
	function assignuser(Request $req)
	{
		$uid   = $req->input('uid');
		$eventid   = $req->input('eventid');
		$alldata =  User::selectRaw('event_ids')->where('id', $uid)->get();
		//$alldata =  DB::select('select event_ids from user where id = "'.$uid.'" ');
		
		$eventidsarr = array_filter(explode("," , $alldata[0]->event_ids));
		
		if(in_array($eventid, $eventidsarr) && !empty($eventidsarr))
		{
			echo "Event Already Assigned to this user !";
		}else
		{
			array_push($eventidsarr, $eventid);
			
			$eventidsarr = array_unique($eventidsarr);
			$eventids = trim(implode(",",$eventidsarr) , ",");
			
			
			DB::table('user')->where('id', $uid)->update(['event_ids' => $eventids]); 
			
			echo "Event Assigned to the user !";
		}
	}
}




?>
