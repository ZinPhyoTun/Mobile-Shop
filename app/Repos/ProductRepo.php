<?php

namespace App\Repos;

use App\Models\Product;

class ProductRepo {

    /**
     * @return Object
     */
    public function model()
    {
        return new Product();
    }

    /**
     * @param CreateProductRequest $request, $image_name
     */
    public function createProduct($request, $image_name)
    {
        $this->model()->create([
            'category_code' => $request->category_code,
            'title' => $request->title,
            'image' => $image_name,
            'color' => $request->color,
            'description' => $request->description
        ]);
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->model()->with('category');
    }
}