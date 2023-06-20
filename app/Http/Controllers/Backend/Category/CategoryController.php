<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Repos\CategoryRepo;
use DataTables;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepo
     */
    protected $category_repo;

    /**
     * @param CategoryRepo $category_repo
     */
    public function __construct(CategoryRepo $category_repo)
    {
        $this->category_repo = $category_repo;
    }

    /**
     * Show the application's Category Page.
     *
     * @return \Illuminate\View\View
     */
    public function getCategoriesPage()
    {
        return view('backend.admin.categories.index');
    }

    /**
     * Delete Category.
     *
     * @return \Illuminate\View\View
     */
    public function deleteCategory($id)
    {
        return $this->category_repo->deleteCategory($id);
    }

    /**
     * Show the application's Categories.
     *
     * @return databable_data
     */
    public function getCategories()
    {
        $categories = $this->category_repo->getForDataTable();

        return DataTables::of($categories)
        ->editColumn('c_name', function ($category) {
            return $category->c_name;
        })
        ->editColumn('c_code', function ($category) {
            return $category->c_code;
        })
        ->editColumn('created_at', function ($category) {
            return date_format($category->created_at, "Y-m-d H:i:s");
        })
        ->editColumn('updated_at', function ($category) {
            return date_format($category->updated_at, "Y-m-d H:i:s");
        })
        ->addColumn('action', function ($category) {
            return '<a href="/admin/categories/'. $category->id .'"><i class="fa fa-edit"></i></a>' . '&nbsp;&nbsp;<a href="#" class="delete" data-id='. $category->id .'><i class="fa fa-trash text-danger"></i></a>';
        })
        ->make(true);
    }
}
