<?php

namespace QH\Customer\Repositories\Elements;

use QH\Core\Base\Repository\BaseRepository;
use QH\Customer\Repositories\Interfaces\ShopRepositoryInterface;
use QH\Product\Models\Product\Product;

class ShopRepository extends BaseRepository implements ShopRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }
    public function getAllProducts()
    {
        return $this->model->where('status','active')->paginate(5);
    }
}
