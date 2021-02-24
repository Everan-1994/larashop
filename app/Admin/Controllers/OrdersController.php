<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Order;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class OrdersController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Order('user'), function (Grid $grid) {
            // 只展示已支付的订单，并且默认按支付时间倒序排序
            $grid->model()->whereNotNull('paid_at')->orderBy('paid_at', 'desc');

            $grid->column('no', '订单号');
            $grid->column('user.name', '买家');
            $grid->column('total_amount', '总金额')->sortable();
            $grid->column('paid_at', '支付时间')->sortable();
            $grid->column('ship_status', '物流')->display(function ($value) {
                return Order::$shipStatusMap[$value];
            });
            $grid->column('refund_status', '退款状态')->display(function ($value) {
                return Order::$refundStatusMap[$value];
            });
            // 禁用创建按钮，后台不需要创建订单
            $grid->disableCreateButton();

            $grid->actions(function ($actions) {
                // 禁用删除和编辑按钮
                $actions->disableDelete();
                $actions->disableEdit();
            });
            $grid->tools(function ($tools) {
                // 禁用批量删除按钮
                $tools->batch(function ($batch) {
                    $batch->disableDelete();
                });
            });

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Order(), function (Show $show) {
            $show->field('id');
            $show->field('no');
            $show->field('user_id');
            $show->field('address');
            $show->field('total_amount');
            $show->field('remark');
            $show->field('paid_at');
            $show->field('payment_method');
            $show->field('payment_no');
            $show->field('refund_status');
            $show->field('refund_no');
            $show->field('closed');
            $show->field('reviewed');
            $show->field('ship_status');
            $show->field('ship_data');
            $show->field('extra');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

}
