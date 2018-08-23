<?php

namespace App\Admin\Controllers;

use App\Models\ClassModel;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ClassController extends Controller
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
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(ClassModel::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
		#	$grid->class('Class');
		#	$grid->vocational('V');
		#	$grid->branch('B');
		#	$grid->college('C');
		#	$grid->stuid('S');
		#	$grid->name('N');
		#	$grid->age('A');
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(ClassModel::class, function (Form $form) {

            $form->display('id', 'ID');
			#$form->text('class','Class');
			#$form->text('vocational','V');
			#$form->text('branch','B');
			#$form->text('college','C');
			#$form->text('stuid','S');
			#$form->text('name','N');
			#$form->text('age','A');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
