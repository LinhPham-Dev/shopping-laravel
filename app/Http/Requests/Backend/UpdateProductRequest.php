<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name,'.$this->id.'|max:255|min:10',
            // 'product_avatar' => 'required|image|mimes:jpg,jpeg,png',
            // 'image_details.*' => 'required|image|mimes:jpg,jpeg,png',
            'category_id' => 'required',
            'slug' => 'required|unique:products,name,' . $this->id . '|max:255|min:10',
            'price' => 'required|numeric',
            'color' => 'required',
            'size' => 'required',
            'status' => 'required',
            'description' => 'required',
        ];
    }
}
