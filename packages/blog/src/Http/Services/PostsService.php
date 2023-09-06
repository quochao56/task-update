<?php

namespace QH\Blog\Http\Services;

class PostsService
{
    public function storePost($request){
        $slug = \Str::Slug($request->title, '-');
        $newImageName = uniqid() . '-' . $slug . '.' . $request->thumb->extension();

        $request->thumb->move(public_path('qh/blog/images'), $newImageName);

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => $slug,
            'content' => $request->input('content'),
            'thumb' => $newImageName,
            'user_id' => auth()->guard('admin')->user()->id,
            'author_name' => auth()->guard('admin')->user()->name
        ];
        return $data;
    }

    public function updatePost($request)
    {
        $newSlug = \Str::Slug($request->title, '-');

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => $newSlug,
            'content' => $request->input('content'),
            'status' => $request->input('status'),
            'user_id' => $request->input('user_id'),
            'author_name' => $request->input('author_name')
        ];
        return $data;
    }
}
