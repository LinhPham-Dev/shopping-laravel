<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
<<<<<<< HEAD

    protected $fillable = ['name', 'image', 'category_id', 'slug', 'price', 'sale_price', 'status', 'description'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    // *** Query *** \\
    public function scopeSearch($query)
    {
        if (request()->key) {
            $query = $query->where('name', 'LIKE', '%' . request()->key . '%');
        }

        return $query;
    }

    // Get the category of product
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Get all colors
    public function productColorsExist()
    {
        return $this->hasMany(ProductColor::class);
    }

    // Get all sizes
    public function productSizesExist()
    {
        return $this->hasMany(ProductSize::class);
    }

    // Get the color of product
    public function productColors()
    {
        return $this->belongsToMany(Color::class, ProductColor::class);
    }

    // Get the size of product
    public function productSizes()
    {
        return $this->belongsToMany(Size::class, ProductSize::class);
    }

    // Get image detail
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    // *** Method Query data *** \\
    public function getAllProducts()
    {
        return self::all();
    }
=======
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'image', 'category_id', 'price', 'sale_price'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
>>>>>>> 854f89a54d47ff421d626e6899fa5f0c82422491
}
