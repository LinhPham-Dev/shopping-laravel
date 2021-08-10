<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    protected $primary = 'id';

    protected $fillable = ['product_id', 'image_name'];

    protected $hidden = ['created_at', 'updated_at'];

    // Insert images detail
    public function createProductImage($product, $imageName)
    {
        ProductImage::create([
            'product_id' => $product->id,
            'image_name' => $imageName,
        ]);
    }

    // Delete product image by product id
    public function deleteProductImage($product_id)
    {
        self::where('product_id', $product_id)->delete();
    }
}
