<?php

namespace App\Repos;

use App\Models\Product;
use App\Repos\BaseRepo;

class ProductRepo extends BaseRepo {

    /**
     * @return Object
     */
    public function model()
    {
        return new Product();
    }

    /**
     * @param int $id
     *
     * @return product
     */
    public function getProduct($id)
    {
        return $this->model()->findOrFail($id);
    }

    /**
     * @return products
     */
    public function getAllProducts()
    {
        return $this->model()->with('category')->get();
    }

    /**
     * @param UpdateProductRequest $request, $id
     */
    public function updateProduct($request, $id, $image_name)
    {
        $product = $this->model()->findOrFail($id);

        $product->update([
            'category_code' => $request->category_code,
            'title' => $request->title,
            'image' => $image_name,
            'color' => $request->color,
            'description' => $request->description,
        ]);
    }

    /**
     * @param $id
     */
    public function deleteProduct($id)
    {
        return $this->model()->findOrFail($id)->delete();
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