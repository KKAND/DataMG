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
	//民族
	public function ethnic()
	{
		$ethnic=DB::table('ethnic')->select('id','name as text')->get();
		return response()->json($ethnic);
	}
	public function province()
	{
		$dpro=DB::table('location_provinces')->select('code as id','name as text')->get();
		return response()->json($dpro);
	}
	public function city(Request $request)
	{
		//通过返回的id，确认下级表应该选择哪两列数据
		$pid=$request->get('q');
		$dcity=DB::table('location_cities')->where('provinceCode',$pid)->select('code as id','name as text')->get();
		return response()->json($dcity);
	}
	public function area(Request $request)
	{
		//通过返回的id，确认下级表应该选择哪两列数据
		$cid=$request->get('q');
		$darea=DB::table('location_areas')->where('cityCode',$cid)->select('code as id','name as text')->get();
		return response()->json($darea);
	}

}
