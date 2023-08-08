<?php
namespace QH\Product\Http\Controllers\Product;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller{
    protected $upload;

    public function store(Request $request){
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');
            try {
                $name = $request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/' . Carbon::now()->timestamp;

                $request->file('file')->storeAs(
                    'public/' . $pathFull . '.' . $name
                );

                $url = '/storage/' . $pathFull . '.' . $name;
            } catch (\Exception $error) {
                $url = false;
            }
            if ($url !== false) {
                return response()->json([
                    'error' => false,
                    'url'   => $url
                ]);
            }

            return response()->json(['error' => true]);
        }
    }

}
