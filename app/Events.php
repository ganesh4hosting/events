<?php
namespace App;

use Illuminate\Database\Eloquent\model;


class Events extends Model
{
	protected $table = "events";
	protected $filable = array('event_name','cur_date');
	
	
}









?>
