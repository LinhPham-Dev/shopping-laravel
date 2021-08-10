<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';

<<<<<<< HEAD
    protected $fillable = ['name', 'slug', 'status'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function categoryActives()
    {
        return self::where('status', 1)->get();
    }
=======
    protected $fillable = ['name', 'status'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

>>>>>>> 854f89a54d47ff421d626e6899fa5f0c82422491
}
