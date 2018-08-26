<?php

namespace App\Admin\Controllers;

use App\Models\InformationModel;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class GeneralmanagerController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Show interface.
     *
     * @param $id
     * @return Content
     */
    public function show($id)
	{

		/*	$iddata=DB::table('usersdata')->where('id',$id)->get();
		return Admin::content(function (Content $content){
			$over=view('information',compact('$iddata'))->render();;
		    $content->body($over);
		});*/
		

        return Admin::content(function (Content $content) use ($id) {

            $content->header('Detail');
            $content->description('Information');
			$content->body(Admin::show(InformationModel::findOrFail($id), function (Show $show) {
				$show->name('姓名');
				$show->gender('性别');
				$show->nation('民族');
				$show->age('年龄');
				$show->birth('出生日期');
				$show->idcard('身份证号');
				$show->stuid('学生号');
				$show->class('班级');
				$show->grade('年级');
				$show->phone('电话');
				$show->qq('QQ');
				$show->college('学院')->display(function ($college){
					$dcollege=DB::table('datacollege')->where('id',$college)->get();
					return($dcollege[0]->text);
				} );
			//	$show->province('省份');
			//	$show->city('市');
			//	$show->area('地区');
				$show->areadetail('详情');
				$show->level('党员属性');
				$show->partybranch('所在支部');
				$show->data_aact('确认积极分子日期');
				$show->data_cact('确认积极分子日期');
				$show->data_cpre('确认积极分子日期');
				$show->data_tpre('预备党员转正日期');
			}));
		});
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(InformationModel::class, function (Grid $grid) {
			#修改数据源，获取当前登录id数据
			//$grid->model()->where('id','=',Admin::user()->id);

			$grid->name('姓名');
			$grid->gender('性别');
			$grid->stuid('学号');
			$grid->class('班级');
			$grid->grade('年级');
			$grid->college('学院')->display( function ($college){
				$dcollege=DB::table('datacollege')->where('id',$college)->get();
				//dd($dcollege);
				return($dcollege[0]->text);
			});
			$grid->partybranch('支部');
			$grid->level('党员属性');
			$grid->disableExport();
			$grid->disableCreateButton();
			
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(InformationModel::class, function (Form $form) {
		    $form->row(function ($row) use ($form)
		    {
			    //$row->display('id','ID');
				$row->width(4)->text('name','姓名');
				$row->width(4)->text('gender','性别');
				$row->width(4)->select('nation','民族')->options('/api/user/ethnic');
				$row->width(4)->text('age','年龄');
				$row->width(4)->text('birth','出生日期');
				$row->width(4)->text('idcard','身份证号');
				$row->width(4)->text('stuid','学号');
				$row->width(4)->text('class','班级');
				$row->width(4)->text('grade','年级');
				$row->width(6)->text('phone','电话');
				$row->width(6)->text('qq','QQ');
				$row->width(6)->select('college','学院')->options('/api/user/college')->load('vocational','/api/user/voc');
				$row->width(6)->select('vocational','专业');
				$row->width(3)->select('province','省')->options('/api/user/province')->load('city','/api/user/city');
				$row->width(3)->select('city','市')->load('area','/api/user/area');
				$row->width(3)->select('area','区/县/旗');
				$row->width(3)->text('areadetail','详细地址');
				$row->width(6)->text('level','党员属性');
				$row->width(6)->text('partybranch','党支部');
				$row->width(6)->text('data_aact','入党申请日期');
				$row->width(6)->text('data_cact','确认积极分子日期');
				$row->width(6)->text('data_cpre','确认预备党员日期');
				$row->text('data_tpre','预备党员转正日期');
				//$row->width(6)->display('created_at','创建');
				//$row->width(6)->display('updated_at','更新');

		    },$form); 
        });
    }
}
