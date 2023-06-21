<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Repos\ProductRepo;
use App\Repos\CategoryRepo;
use App\Http\Requests\CreateProductRequest;

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
        $image_name = uniqid() . '_' . time(). '_' . $request->file('image')->getClientOriginalName();

        $request->image->move(public_path('uploaded_images'), $image_name);

        $this->product_repo->createProduct($request, $image_name);

        return redirect()->route('admin.products.index');
    }
}
