<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        if(CategoryRequest::isMethod('post')){
            return [
                'categories_name' => 'required|max:100|unique:categories',
                'description' => 'min:3|max:100',
            ];
        }
        else{
            return [
                'categories_name' => 'required|max:100|unique:categories,categories_name,'.$this->route('category')->id,
                'description' => 'min:3|max:100',
            ]; 
        }
      
    }
}
