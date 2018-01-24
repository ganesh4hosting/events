<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
	protected $table = "user";
	protected $filable = array('uname','pass','event_ids','update_date');
	
	protected $primarykey = "uname";
	public $incrementing = false;
	protected $keyType = "string";
	
}









?>
