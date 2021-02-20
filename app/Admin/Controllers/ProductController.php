<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Product;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;

class ProductController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Product(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('image', '商品封面')->image('', 100, 100);
            $grid->column('title', '商品名称')->limit(50);
            $grid->column('on_sale', '已上架')->switch();

            $grid->column('price', '价格');
            $grid->column('rating', '评分');
            $grid->column('sold_count', '销量');
            $grid->column('review_count', '评论数');

            $grid->actions(function ($actions) {
                $actions->disableView();
                $actions->disableDelete();
            });

            // 禁用批量删除按钮
            $grid->disableBatchDelete();


            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    protected function form()
    {
        // 需要显式地指定关联关系
        $builder = Product::with('skus');

        return Form::make($builder, function (Form $form) {
            $form->display('id');
            $form->text('title', '商品名称')->required();
            $form->image('image', '封面图片')->rules('required|image');
            $form->editor('description', '商品描述')->required();
            $form->radio('on_sale', '上架')->options(Product::$status)->default(Product::SALE_OFF);

            // sku 一对多
            $form->hasMany('skus', 'SKU 列表', function (Form\NestedForm $form) {
                $form->text('title', 'SKU 名称')->required();
                $form->text('description', 'SKU 描述')->required();
                $form->text('price', '单价')->rules('required|numeric|min:0.01');
                $form->text('stock', '剩余库存')->rules('required|integer|min:0');
            });

            // 定义事件回调，当模型即将保存时会触发这个回调
            $form->saving(function (Form $form) {
                $form->price = collect($form->input('skus'))->where(Form::REMOVE_FLAG_NAME, 0)->min('price') ?: 0;
            });
        });
    }

}
