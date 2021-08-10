<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class Admin extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;

    /**
     * Lỗi attempt
     * B1: Import :
     * use Illuminate\Auth\Authenticatable;
     * use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
     *
     * B2: implements AuthenticatableContract
     *
     * B3: use Authenticatable;
     */

    protected $guard = 'admin';

    protected $fillable = ['name', 'email', 'password',];

    protected $hidden = ['password', 'created_at', 'updated_at'];

    public function createAccount($request)
    {
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $admin;
    }
}
