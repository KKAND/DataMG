<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users_data extends Model
{
	//
	public function admin_users()
	{
		return $this->hasOne(admin_users::class);
	}
}
