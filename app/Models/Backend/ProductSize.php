<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    protected $table = 'product_sizes';

    protected $primary = 'id';

    protected $fillable = ['product_id', 'size_id'];

    protected $hidden = ['created_at', 'updated_at'];

    // Create product size
    public function createProductSize($request, $product)
    {
        foreach ($request->size as $size) {
            self::create([
                'product_id' => $product->id,
                'size_id' => $size,
            ]);
        }
    }

    // Delete product size by product id
    public function deleteProductSize($product_id)
    {
        self::where('product_id', $product_id)->delete();
    }


}
