<?php

namespace QH\Product\Repositories\Product\Element;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use QH\Core\Base\Repository\BaseRepository;
use QH\Product\Models\Category\Category;
use QH\Product\Models\Product\Product;
use QH\Product\Repositories\Product\Interface\ProductRepositoryInterface;
use App\Models\User;
use QH\Warehouse\Models\History\History;
use QH\Warehouse\Models\ProductWarehouse;


class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Product::class;
    }

    public function getProduct()
    {
        return $this->model->select('name')->take(2)->get();
    }

    public function getUserById($id)
    {
        return User::find($id)->first();
    }


    public function getAllUsers()
    {
        $users = User::all();
        return $users;
    }

    public function deleteAndUnlinkImage($product)
    {
        // $this->delete($id);
        $product = $this->model->find($product->id);
        $this->UnlinkImage($product);
        return parent::delete($product);
    }

    public function UnlinkImage($product)
    {
        if ($product) {
            $thumbnailPath = public_path($product->thumb);
            if (File::exists($thumbnailPath)) {
                try {
                    unlink($thumbnailPath);
                    // File deletion successful
                } catch (\Exception $e) {
                    \Log::error('Error deleting thumbnail: ' . $e->getMessage());
                }
            } else {
                \Log::error('File not found: ' . $thumbnailPath);
            }
        }
    }

    public function UnlinkImages($product)
    {
        $thumbs = explode(',', $product->thumbs);
        if ($product) {
            foreach ($thumbs as $thumb) {
                $thumbnailPath = public_path($thumb);
                if (File::exists($thumbnailPath)) {
                    try {
                        unlink($thumbnailPath);
                        // File deletion successful
                    } catch (\Exception $e) {
                        \Log::error('Error deleting thumbnail: ' . $e->getMessage());
                    }
                } else {
                    \Log::error('File not found: ' . $thumbnailPath);
                }
            }
        }
    }
    public function getTotal(){
        return $this->model->sum('qty');
    }

    public function getAllProducts()
    {
        return Product::with("category")->with("user")->orderBy("status", 'asc')->orderByDesc("id")->get();
    }

    public function getAllProductsP()
    {
        return Product::with("category")->with("user")->orderBy("status", 'asc')->orderByDesc("id")->paginate(5);
    }

    public function getActiveProducts()
    {
        return Product::with("category")->with("user")->where("status", 'active')->paginate(5);
    }

    public function createProduct($request)
    {
        try {
            DB::beginTransaction();
            $userId = auth()->user()->id;
            $author = $this->getUserById($userId);
            $request['author_id'] = $author->id;
            $request['author_type'] = $author->type;
            $data = $request->except('_token');
            $data['thumbs'] = implode(',', $data['thumbs']);
//            dd($data);
            $product = parent::create($data);
//dd($product);

//          increase product in Product Warehouse
            $warehouseId = $request->input('warehouse_id');
            $qty = $product->qty;
//            dd($product);

            $productWarehouse = ProductWarehouse::create([
                'product_id' => $product->id,
                'warehouse_id' => $warehouseId,
                'qty' => $qty,
            ]);

//            dd($productWarehouse);
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            session()->flash('error', 'Thêm sản phẩm lỗi');
            \Log::error('Error:', ['message' => $exception->getMessage()]);
            return false;
        }

    }

    public function updateProduct($product, $data)
    {
        if (isset($data['thumb']) && is_array($data['thumb']) && !empty($data['thumb'])) {
            $this->UnlinkImage($product);
        }
        if (isset($data['thumbs']) && is_array($data['thumbs']) && !empty($data['thumbs'])) {
            $this->UnlinkImages($product);
        }
        try {
            DB::beginTransaction();

            if (isset($data['thumbs']) && is_array($data['thumbs']) && !empty($data['thumbs'])) {
                $data['thumbs'] = implode(',', $data['thumbs']);
            }

            $product = parent::update($product, $data);
//            dd($product);
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            \Log::error('Error:', ['message' => $exception->getMessage()]);

            return false;
        }
        return parent::update($product, $data);
    }

    public function getProductBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
