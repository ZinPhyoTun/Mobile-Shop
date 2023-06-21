<?php

namespace App\Repos;

use App\Models\Category;

class CategoryRepo {

    /**
     * @return Object
     */
    public function model()
    {
        return new Category();
    }

    /**
     * @param int $id
     *
     * @return category
     */
    public function getCategory($id)
    {
        return $this->model()->findOrFail($id);
    }

    /**
     * @return categorys
     */
    public function getAllCategories()
    {
        return $this->model()->get();
    }

    /**
     * @param CreateCategoryRequest $request
     */
    public function createCategory($request)
    {
        $this->model()->create([
            'c_name' => $request->c_name,
            'c_code' => $request->c_code,
        ]);
    }

    /**
     * @param category_name, category_code, id
     */
    public function updateCategory($c_name, $c_code, $id)
    {
        $category = $this->model()->findOrFail($id);

        $category->update([
            'c_name' => $c_name,
            'c_code' => $c_code
        ]);
    }

    /**
     * @param $id
     */
    public function deleteCategory($id)
    {
        return $this->model()->findOrFail($id)->delete();
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->model()->query();
    }
}