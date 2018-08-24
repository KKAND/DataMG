<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
	public static function getSelectOptions()
	{
	    $options = DB::table('cd')->select('id','name as text')->get();
	    $selectOption = [];
	    foreach ($options as $option){
		        $selectOption[$option->id] = $option->text;
		    }
	    return $selectOption;
	}
	
}
