<?php

namespace QH\Customer\Http\Controllers;

use App\Http\Controllers\Controller;
use QH\Customer\Repositories\Interfaces\ShopRepositoryInterface;
use QH\Product\Repositories\Category\Interface\CategoryRepositoryInterface;
use QH\Product\Repositories\Product\Interface\ProductRepositoryInterface;

class MainController extends Controller
{
    protected $shopRepo;
    protected $categoryRepo;
    protected $productRepo;

    public function __construct(ShopRepositoryInterface $shopRepository, CategoryRepositoryInterface $categoryRepository, ProductRepositoryInterface $productRepository)
    {
        $this->shopRepo = $shopRepository;
        $this->categoryRepo = $categoryRepository;
        $this->productRepo = $productRepository;
    }

    public function index()
    {
        return view('user.home', [
            'title' => 'Shop sách Quốc Hảo',

        ]);
    }

    public function shop()
    {
        return view('user.shop', [
            'title' => 'Shop sách Quốc Hảo',
            'categories' => $this->categoryRepo->getActive(),
            'products' => $this->productRepo->getActiveProducts()
        ]);
    }

    public function detail($slug = '')
    {
        return view('user.detail', [
            'title' => 'Chi tiết sản phẩm',
            'product' => $this->productRepo->getProductBySlug($slug)
        ]);
    }

    public function cart()
    {
        return view('user.cart', [
            'title' => 'Giỏ hàng',

        ]);
    }
}
