<?php

namespace QH\Product\Repositories\Product\Interface;

use QH\Core\Base\Repository\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getProduct();
    public function getAllUsers();
    public function deleteAndUnlinkImage($id);
}
