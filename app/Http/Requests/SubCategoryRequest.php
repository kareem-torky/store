<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
        switch ($this->method()) 
        {
            case 'POST':

                    return [
                        'name'              => 'required|string|max:190',
                        'category_id'       => 'required|numeric|exists:categories,id',
                        'description'       => 'nullable|string|max:30000',
                        'img'               => 'nullable|image|mimes:png,jpg,jpeg,gif',
                        'pdf'               => 'nullable|mimes:pdf',
                        'slug'              => 'nullable|string|unique:sub_categories,slug',
                        // 'price'             => 'required|numeric|digits_between:1,6',
                        'show_in_homePage'  => 'required|string|in:yes,no'


                    ];


                break;
            
            case 'PUT':
                        
                        return [
                        'name'              => 'required|string|max:190',
                        'category_id'       => 'required|numeric|exists:categories,id',
                        'description'       => 'nullable|string|max:30000',
                        'img'               => 'nullable|image|mimes:png,jpg,jpeg,gif',
                        'pdf'               => 'nullable|mimes:pdf',
                        'slug'              => 'nullable|string|unique:sub_categories,slug,' . Request('id'),
                        // 'price'             => 'required|numeric|digits_between:1,6',
                        'show_in_homePage'  => 'required|string|in:yes,no'
                    ];


                break;
        }
        
    }
}
