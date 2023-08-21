<?php

namespace QH\Product\Http\Services;

class Service
{
    public function createSlug($name){
        return \Str::Slug($name, '-');
    }
}
