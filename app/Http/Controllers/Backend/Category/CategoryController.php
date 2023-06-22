<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
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
     * Show the application's Category Create Page.
     *
     * @return \Illuminate\View\View
     */
    public function createCategoryPage()
    {
        return view('backend.admin.categories.create');
    }

    /**
     * Create Category.
     *
     * @return \Illuminate\View\View
     */
    public function storeCategory(CreateCategoryRequest $request)
    {
        $this->category_repo->createCategory($request);

        return redirect()->route('admin.categories.index')->with('create_message', 'Created Successfully!');
    }

    /**
     * Show the application's Update Page.
     *
     * @return \Illuminate\View\View
     */
    public function createCategoryUpdatePage($id)
    {
        $category = $this->category_repo->getCategory($id);

        return view('backend.admin.categories.edit', compact('category'));
    }

    /**
     * Update Category.
     *
     * @return \Illuminate\View\View
     */
    public function updateCategoryData(UpdateCategoryRequest $request, $id)
    {
        $category = $this->category_repo->model()->findOrFail($id);

        $cat_names = $this->category_repo->model()->get()->pluck('c_name');

        $cat_codes = $this->category_repo->model()->get()->pluck('c_code');

        if ($request->c_name != $category->c_name) {

            if (in_array($request->c_name, json_decode($cat_names))) {

                return redirect()->back()->withInput()->withErrors(['c_name' => 'Category Name has already been taken.']);
            } else {
                $c_name = $request->c_name;
            }
        } elseif ($request->c_name == $category->c_name) {
            $c_name = $request->c_name;
        }

        if ($request->c_code != $category->c_code) {

            if (in_array($request->c_code, json_decode($cat_codes))) {

                return redirect()->back()->withInput()->withErrors(['c_code' => 'Category Code has already been taken.']);
            } else {
                $c_code = $request->c_code;
            }
        } elseif ($request->c_code == $category->c_code) {
            $c_code = $request->c_code;
        }

        $this->category_repo->updateCategory($c_name, $c_code, $id);

        return redirect()->route('admin.categories.index')->with('update_message', 'Updated Successfully!');
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
