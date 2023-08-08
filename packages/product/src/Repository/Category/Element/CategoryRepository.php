<?php

namespace QH\Product\Repository\Category\Element;

use QH\Core\base\Repository\BaseRepository;
use QH\Product\Models\Category\Category;
use QH\Product\Repository\Category\Interface\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Category::class;
    }

    public function getProduct()
    {
        return $this->model->select('name')->take(2)->get();
    }
}
