<?php

namespace QH\Product\Repository\Product\Interface;

use QH\Core\Base\Repository\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getProduct();

    public function getAllCategories();
    public function getAllUsers();
    public function deleteAndUnlinkImage($id);
}
