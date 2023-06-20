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