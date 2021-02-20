<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;

class UserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name', '用户名');
            $grid->column('email', '邮箱');
            $grid->email_verified_at('已验证邮箱')->display(function ($value) {
                return $value ? '是' : '否';
            });
            // 判断是否有权限操作状态
            if (Admin::user()->can('member-status')) {
                $grid->column('status', '状态')->switch();
            }

            $grid->column('created_at', '注册时间');

            // 不在页面显示 `新建` 按钮，因为我们不需要在后台新建用户
            $grid->disableCreateButton();
            // 同时在每一行也不显示 `编辑` 按钮
            $grid->disableActions();

            $grid->tools(function ($tools) {
                // 禁用批量删除按钮
                $tools->batch(function ($batch) {
                    $batch->disableDelete();
                });
            });

            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel(); // 面板搜索
                $filter->equal('name', '用户名')->width(2);
            });
        });
    }

    /**
     * @return Form
     */
    protected function form()
    {
        return Form::make(new User(), function (Form $form) {
            $form->display('id');
            $form->switch('status');
        });
    }

}
