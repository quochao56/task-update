<?php

namespace QH\Product\Http\Services\Product;

use Carbon\Carbon;

class UploadService
{
    public function uploadImage($request){
        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName();
            $pathFull = 'uploads/' . Carbon::now()->timestamp;

            $request->file('file')->storeAs(
                'public/' . $pathFull . '.' . $name
            );

            $url = '/storage/' . $pathFull . '.' . $name;
        }
        $request['thumb'] = $url;
        return $request;
    }
}
