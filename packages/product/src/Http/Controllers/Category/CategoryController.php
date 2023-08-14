<?php

namespace QH\Product\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use QH\Product\Http\Requests\Category\CategoryRequest;
use QH\Product\Models\Category\Category;
use QH\Product\Repositories\Category\Interface\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepo;
    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
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
        $request->except('_token');
        $data = $request;
        try {
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
        $data = $request->all();
        try {
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
