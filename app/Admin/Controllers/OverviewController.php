<?php

namespace App\Admin\Controllers;

use App\Models\overview;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class OverviewController extends Controller
{
    public function index()
	{
		return Admin::content(function (Content $content){
			$userid=Admin::user()->id;
			$content->header('Overview');	
			#$content->row($usernamei);
		     $over=view('overview',compact('$userid'))->render();
		     $content->body($over);
		});
    }
}
