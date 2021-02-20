<?php

namespace App\Admin\Repositories;

use App\Models\Product as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Product extends EloquentRepository
{

    const SALE_OFF = 0;
    const SALE_ON = 1;

    public static $status = [
        self::SALE_ON => '是',
        self::SALE_OFF => '否'
    ];

    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
