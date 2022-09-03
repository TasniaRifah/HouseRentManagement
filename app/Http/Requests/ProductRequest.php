<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(ProductRequest::isMethod('post')){
            return [
                'address' => 'required|max:100',
                'description' => 'min:3|max:100',
                'image' => 'required',
                'rent'=>'required'

            ];
        }
        else{
            return [
                // 'categories_name' => 'required|max:100|unique:categories,categories_name,'.$this->route('category')->id,
                // 'description' => 'min:3|max:100',
                'address' => 'required|max:100',
                'description' => 'min:3|max:100',
              
                'rent'=>'required'
            ]; 
        }
    }
}
