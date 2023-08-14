<?php

namespace QH\Product\Repositories\Category\Interface;

use QH\Core\Base\Repository\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getProduct();
}
