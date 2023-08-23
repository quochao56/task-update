<?php

namespace QH\Warehouse\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use QH\Warehouse\Http\Requests\WarehouseRequest;
use QH\Warehouse\Models\Warehouse;
use QH\Warehouse\Repositories\Warehouse\Interfaces\WarehouseRepositoryInterface;

class WarehouseController extends Controller
{
    protected $warehouseRepo;
    public function __construct(WarehouseRepositoryInterface $warehouseRepository)
    {
        $this->warehouseRepo = $warehouseRepository;
    }

    public function index()
    {
        $title = 'Danh sánh kho';
        $warehouses = $this->warehouseRepo->getAll();
        return view('admin.warehouse.warehouse.index ', compact(
            'title',
            'warehouses'
        ));
    }

    public function create()
    {
        return view('admin.warehouse.warehouse.add', ['title' => 'Thêm kho mới']);
    }
    public function show($id)
    {
        $title = 'Sửa kho';
        $warehouse = $this->warehouseRepo->find($id);

        return view('admin.warehouse.warehouse.edit', compact(
            'title',
            'warehouse'
        ));
    }

    public function store(WarehouseRequest $request)
    {
        $data = $request->except('_token');
        try {
            $this->warehouseRepo->create($data);
            session()->flash('success', 'Thêm kho Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("admin.warehouses.index");
    }

    public function update(WarehouseRequest $request, Warehouse $warehouse)
    {
        $data = $request->except('_token');
        try {
            $this->warehouseRepo->update($warehouse, $data);
            session()->flash('success', 'Sửa kho Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("admin.warehouse.index");
    }
    public function destroy(Warehouse $warehouse)
    {
        try {
            $this->warehouseRepo->delete($warehouse);
            session()->flash('success', 'Xóa kho Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }

        return redirect()->route("admin.warehouses.index");
    }
}
