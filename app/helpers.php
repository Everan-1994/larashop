<?php

use Illuminate\Support\Facades\Route;

/**
 * 路由名称转换为 CSS 类名称
 * @return string|string[]|null
 */
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}
