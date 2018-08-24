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

class InformationController extends Controller
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
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Detail');
            $content->description('Information');
            $content->body(Admin::show(InformationModel::findOrFail($id), function (Show $show) {
				$show->class('班级');
				$show->vocational('专业');
				$show->branch();
				$show->college();
				$show->stuid();
				$show->name();
				$show->age();
				$show->gender();
				$show->nation();
				$show->phone();
				$show->level();
				$show->partybranch();
				$show->data_cact();
				$show->date_cpre();
				$show->data_tpre();
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
			$grid->model()->where('id','=',Admin::user()->id);
			$grid->college('学院')->display( function ($college){
				$dcollege=DB::table('datacollege')->where('id',$college)->get();
				return($dcollege[0]->text);
			});
			
			$grid->name('姓名');
			$grid->branch('支部');
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
			
				$form->display('id','ID');
				$form->text('class','班级');
			#	$form->text('college','学院');
				$form->select('college','学院')->options('/api/user/college')->load('vocational','/api/user/voc');
			    $form->select('vocational','专业');
				#$form->text('branch','支部');
				#$form->text('college','院系');
				#$form->text('stuid','学生号');
				#$form->text('name','姓名');
				#$form->text('age','年龄');
				#$form->text('gender','性别');
				#$form->text('nation','民族');
				#$form->text('phone','电话');
				#$form->text('level','党员性质');
				#$form->text('partybranch','党支部');
				#$form->text('data_cact','入党申请书日期');
				#$form->text('date_cpre','转为预备党员日期');
				#$form->text('data_tpre','预备党员转正日期');
				$form->display('created_at','创建');
				$form->display('updated_at','更新');
        });
    }
}
