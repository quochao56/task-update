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
            'user_id' => auth()->user()->id
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
            'user_id' => $request->input('user_id')
        ];
        return $data;
    }
}
