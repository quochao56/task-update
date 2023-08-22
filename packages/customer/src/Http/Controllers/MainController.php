<?php

namespace QH\Customer\Http\Controllers;

use App\Http\Controllers\Controller;
use QH\Customer\Repositories\Interfaces\ShopRepositoryInterface;

class MainController extends Controller
{
    protected $shopRepo;
    public function __construct(ShopRepositoryInterface $shopRepository)
    {
        $this->shopRepo = $shopRepository;
    }

    public function index()
    {
        return view('user.home', [
            'title' => 'Shop sách Quốc Hảo',
            'products' => $this->shopRepo->getAllProducts()
        ]);
    }
    public function shop(){
        return view('user.shop', [
            'title' => 'Shop sách Quốc Hảo',
        ]);
    }
    public function detail($slug=''){
        return view('user.detail', [
            'title' => 'Shop sách Quốc Hảo',
        ]);
    }
    public function cart(){
        return view('user.cart', [
            'title' => 'Shop sách Quốc Hảo',
        ]);
    }
}
