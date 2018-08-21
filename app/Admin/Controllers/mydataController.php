<?php

namespace App\Admin\Controllers;

use App\Models\mydataModel;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Show;

class mydataController extends Controller
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
     * Show interface.
     *
     * @param $id
     * @return Content
     */
    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Detail');
            $content->description('description');
            $content->body(Admin::show(mydataModel::findOrFail($id), function (Show $show) {

                $show->id();
				$show->name();
				$show->age();
				$show->stuid();
                $show->created_at();
                $show->updated_at();
			}));
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
        return Admin::grid(mydataModel::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
			$grid->name('Name');
			$grid->age('Age');
			$grid->stuid('Stuid');
            $grid->created_at();
			$grid->updated_at();
		   #$grid->disableExport();
		   #$grid->disableActions();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(mydataModel::class, function (Form $form) {

            $form->display('id', 'ID');
			$form->text('name','Name');
			$form->text('age','Age');
			$form->text('stuid','Stuid');
            $form->display('created_at', 'Created At');
			$form->display('updated_at', 'Updated At');
			#$form->disableExport();
        });
    }
}
