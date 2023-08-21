<?php

namespace QH\Product\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use QH\Product\Http\Requests\Category\CategoryRequest;
use QH\Product\Http\Services\Service;
use QH\Product\Models\Category\Category;
use QH\Product\Repositories\Category\Interface\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepo;
    public $service;
    public function __construct(CategoryRepositoryInterface $categoryRepo, Service $service)
    {
        $this->categoryRepo = $categoryRepo;
        $this->service = $service;
    }

    public function index()
    {
        $title = 'Danh sánh danh mục';
        $categories = $this->categoryRepo->getAll();
        return view('admin.category.index ', compact(
            'title',
            'categories'
        ));
    }

    public function create()
    {
        return view('admin.category.add', ['title' => 'Thêm danh mục mới']);
    }
    public function show($id)
    {
        $title = 'Sửa danh mục';
        $category = $this->categoryRepo->find($id);

        return view('admin.category.edit', compact(
            'title',
            'category'
        ));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->except('_token');
        try {
            $data['slug'] = $this->service->createSlug($request->input('name'));
            $this->categoryRepo->create($data);
            session()->flash('success', 'Thêm Danh Mục Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("admin.category.index");
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->except('_token');
        try {
            $data['slug'] = $this->service->createSlug($request->input('name'));
            $this->categoryRepo->update($category, $data);
            session()->flash('success', 'Sửa Danh Mục Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("admin.category.index");
    }
    public function destroy(Category $category)
    {
        try {
            $this->categoryRepo->delete($category);
            session()->flash('success', 'Xóa Danh Mục Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }

        return redirect()->route("admin.category.index");
    }
}
