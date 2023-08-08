<?php

namespace QH\Product\Repository\Category\Interface;

use QH\Core\base\Repository\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getProduct();
}
