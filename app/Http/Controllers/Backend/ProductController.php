<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreProductRequest;
use App\Http\Requests\Backend\UpdateProductRequest;
use App\Models\Backend\Category;
use App\Models\Backend\Color;
use App\Models\Backend\Product;
use App\Models\Backend\ProductColor;
use App\Models\Backend\ProductImage;
use App\Models\Backend\ProductSize;
use App\Models\Backend\Size;
use App\Services\UploadService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $uploadService;
    protected $productColor;
    protected $productSize;
    protected $productImage;
    protected $color;
    protected $size;
    protected $category;
    /**
     * Constructing global variable
     */
    public function __construct(
        UploadService $uploadService,
        ProductColor $productColor,
        ProductImage $productImage,
        ProductSize $productSize,
        Category $category,
        Color $color,
        Size $size
    ) {
        $this->uploadService = $uploadService;
        $this->productColor = $productColor;
        $this->productSize = $productSize;
        $this->productImage = $productImage;
        $this->color = $color;
        $this->size = $size;
        $this->category = $category;
    }

    public function index()
    {
        $page = 'List Products';
        $products = Product::search()->paginate(3);
        return view('backend.products.index', compact('products', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = $this->color->colorActives();
        $sizes  = $this->size->sizeActives();
        $categories = $this->category->categoryActives();
        $page = 'Add Products';

        return view('backend.products.add', compact('colors', 'sizes', 'categories', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $productName = $request->name;

        // Upload Product Avatar Handler => ImageName
        if ($request->hasFile('product_avatar')) {
            $file = $request->file('product_avatar');

            // Method Upload
            $imageName = $this->uploadService->uploadImageHandler($file, $productName);
        }

        // Merge field image -> request
        $request->merge(['image' => $imageName]);

        // Insert products into the database
        $returnedProduct = Product::create($request->only(['name', 'image', 'category_id', 'slug', 'price', 'sale_price', 'status', 'description']));

        // Upload product image detail & Insert into database
        if ($request->hasFile('image_details')) {

            $files = $request->file('image_details');

            foreach ($files as $key => $file) {

                $imageNameDetail = $this->uploadService->uploadImageDetailHandler($file, $productName, $key);

                // Insert into database 'product_images'
                $this->productImage->createProductImage($returnedProduct, $imageNameDetail);
            }
        }

        // Insert product colors
        if ($request->color) {
            $this->productColor->createProductColor($request, $returnedProduct);
        }

        // Insert product sizes
        if ($request->size) {
            $this->productSize->createProductSize($request, $returnedProduct);
        }

        // Check Result
        return alertInsert($returnedProduct, true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colors = $this->color->colorActives();
        $sizes  = $this->size->sizeActives();
        $categories = $this->category->categoryActives();
        $productEdit = Product::find($id);
        $page = 'Edit Products';

        // Get colors exits
        $colors_exits = getItemExits($productEdit->productColors);

        // Get sizes exits
        $sizes_exits = getItemExits($productEdit->productSizes);

        return view('backend.products.edit', compact('colors', 'sizes', 'categories', 'page', 'productEdit', 'colors_exits', 'sizes_exits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {

        $productUpdate = Product::find($id);

        $productName = $request->name;

        // Upload Product Avatar Handler => ImageName
        if ($request->hasFile('product_avatar')) {

            $file = $request->file('product_avatar');

            // Remove old image
            $pathImageAvatar = 'uploads/products/product_avatar/';
            $this->uploadService->deleteFile($productUpdate->image, $pathImageAvatar);

            // Upload new file
            $imageName = $this->uploadService->uploadImageHandler($file, $productName);

            // Merge field image -> request
            $request->merge(['image' => $imageName]);
        }

        // Insert products into the database
        $returnedProduct = $productUpdate->update($request->all());

        // Upload product image detail & Insert into database
        if ($request->hasFile('image_details')) {

            $files = $request->file('image_details');

            // Remove old file
            if ($productUpdate->productImages) {
                foreach ($productUpdate->productImages as $imageFile) {
                    $pathImageDetail = 'uploads/products/product_details/';
                    $this->uploadService->deleteFile($imageFile->image_name, $pathImageDetail);
                }
            }

            // Upload new file
            foreach ($files as $key => $file) {
                $imageNameDetail = $this->uploadService->uploadImageDetailHandler($file, $productName, $key);

                // Insert into database 'product_images'
                $this->productImage->createProductImage($productUpdate, $imageNameDetail);
            }
        }

        // Insert product colors
        if ($request->color) {
            // Delete old colors
            $this->productColor->deleteProductColor($id);

            // Insert new colors
            $this->productColor->createProductColor($request, $productUpdate);
        }

        // Insert product sizes
        if ($request->size) {
            // Delete old sizes
            $this->productSize->deleteProductSize($id);

            // Insert new sizes
            $this->productSize->createProductSize($request, $productUpdate);
        }

        // Check Result
        return alertUpdate($returnedProduct, true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $productDelete = Product::find($id);

        $imageDetails = $productDelete->productImages;

        // Remove image from product_avatar
        $pathImageAvatar = 'uploads/products/product_avatar/';
        $this->uploadService->deleteFile($productDelete->image, $pathImageAvatar);

        // Remove image from product_details
        if ($imageDetails) {
            foreach ($imageDetails as $imageFile) {
                $pathImageDetail = 'uploads/products/product_details/';
                $this->uploadService->deleteFile($imageFile->image_name, $pathImageDetail);
            }
        }

        // Remove ProductColor & ProductSize & ProductImage
        $this->productColor->deleteProductColor($id);
        $this->productSize->deleteProductSize($id);
        $this->productImage->deleteProductImage($id);

        // Delete product
        $result = $productDelete->delete();

        return alertDelete($result, true);
    }
}
