<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Repos\ProductRepo;
use App\Repos\CategoryRepo;
use App\Http\Requests\CreateProductRequest;
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
