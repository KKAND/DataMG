<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mydataModel extends Model
{
    use SoftDeletes;

    protected $table = 'mydata';
}
