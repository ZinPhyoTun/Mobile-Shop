<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Repos\ProductRepo;
use App\Repos\CategoryRepo;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use DataTables;

class ProductController extends Controller
{
    /**
     * @var ProductRepo
     */
    protected $product_repo;

    /**
     * @var CategoryRepo
     */
    protected $category_repo;

    /**
     * @param ProductRepo $product_repo
     * @param CategoryRepo $category_repo
     */
    public function __construct(ProductRepo $product_repo, CategoryRepo $category_repo)
    {
        $this->product_repo = $product_repo;
        $this->category_repo = $category_repo;
    }

    /**
     * Show the application's Products Page.
     *
     * @return \Illuminate\View\View
     */
    public function getProductsPage()
    {
        return view('backend.admin.products.index');
    }

    /**
     * Show the application's Product Create Page.
     *
     * @return \Illuminate\View\View
     */
    public function createProductPage()
    {
        $categories = $this->category_repo->getAllCategories();

        return view('backend.admin.products.create', compact('categories'));
    }

    /**
     * Show the application's Update Page.
     *
     * @return \Illuminate\View\View
     */
    public function createProductUpdatePage($id)
    {
        $product = $this->product_repo->getProduct($id);

        $categories = $this->category_repo->getAllCategories();

        return view('backend.admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update Product.
     *
     * @return \Illuminate\View\View
     */
    public function updateProductData(UpdateProductRequest $request, $id)
    {
        $product = $this->product_repo->getProduct($id);

        if(!empty($request->image)) {
            
            $image_name = time(). '_' . $request->file('image')->getClientOriginalName();

            $request->image->move(public_path('uploaded_images'), $image_name);

            if(!empty($request->old_image_name)) {

                unlink(public_path('uploaded_images'). '/' . $request->old_image_name);
            }
        } else {
            $image_name = $request->old_image_name;
        }

        $this->product_repo->updateProduct($request, $id, $image_name);

        return redirect()->route('admin.products.index')->with('update_message', 'Updated Successfully!');
    }

    /**
     * Delete Product.
     *
     * @return \Illuminate\View\View
     */
    public function deleteProduct($id)
    {
        return $this->product_repo->deleteProduct($id);
    }

    /**
     * Show Product.
     *
     * @return \Illuminate\View\View
     */
    public function showProduct($id)
    {
        $product = $this->product_repo->getProduct($id);

        return view('backend.admin.products.show', compact('product'));
    }

    /**
     * Create Product.
     *
     * @return \Illuminate\View\View
     */
    public function storeProduct(CreateProductRequest $request)
    {
        $image_name = time(). '_' . $request->file('image')->getClientOriginalName();

        $request->image->move(public_path('uploaded_images'), $image_name);

        $this->product_repo->createProduct($request, $image_name);

        return redirect()->route('admin.products.index')->with('create_message', 'Created Successfully!');
    }

    /**
     * Show the application's Products.
     *
     * @return databable_data
     */
    public function getProducts()
    {
        $products = $this->product_repo->getForDataTable();

        return DataTables::of($products)
        ->editColumn('category_code', function ($product) {
            return $product->category->c_name;
        })
        ->editColumn('image', function ($product) {
            return $product->image ? $product->image : '-';
        })
        ->editColumn('created_at', function ($product) {
            return date_format($product->created_at, "Y-m-d H:i:s");
        })
        ->editColumn('updated_at', function ($product) {
            return date_format($product->updated_at, "Y-m-d H:i:s");
        })
        ->addColumn('action', function ($product) {
            return '<a href="/admin/products/show/'. $product->id .'"><i class="fa fa-eye"></i></a>'.'&nbsp;&nbsp;<a href="/admin/products/'. $product->id .'"><i class="fa fa-edit"></i></a>' . '&nbsp;&nbsp;<a href="#" class="delete" data-id='. $product->id .'><i class="fa fa-trash text-danger"></i></a>';
        })
        ->make(true);
    }
}
