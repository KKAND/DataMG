<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiCollegeController extends Controller
{
	public function aa()
	{
		$dcollege=DB::table('datacollege')->get();
		return response()->json($dcollege);
	}
	public function voc(Request $request)
	{
		//通过返回的id，确认下级表应该选择哪两列数据
		$collegeid=$request->get('q');
		$dvoc=DB::table('datavoc')->where('pid',$collegeid)->select('id','text')->get();
		return response()->json($dvoc);
	}

}
