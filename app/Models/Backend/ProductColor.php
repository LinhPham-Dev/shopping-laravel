<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $table = 'product_colors';

    protected $primary = 'id';

    protected $fillable = ['product_id', 'color_id'];

    protected $hidden = ['created_at', 'updated_at'];

    // Create product color
    public function createProductColor($request, $product)
    {
        foreach ($request->color as $color) {
            self::create([
                'product_id' => $product->id,
                'color_id' => $color,
            ]);
        }
    }

    // Delete product color by product id
    public function deleteProductColor($product_id)
    {
        self::where('product_id', $product_id)->delete();
    }
}
