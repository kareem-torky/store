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
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) 
        {

            // adding data 
            case 'POST':

                    return [
                        'name'              => 'required|string|max:190',
                        'description'       => 'required|string|max:30000',
                        'small_description' => 'required|string|max:30000',
                        'img'               => 'required|image|mimes:png,jpg,jpeg,gif',
                        'show_in_homePage'  => 'required|string|in:yes,no',
                        'slug'              => 'nullable|string|unique:categories,slug',
                    ];


                break;


            //  editing data 
            case 'PUT':
                        
                        return [
                        'name'              => 'required|string|max:190',
                        'description'       => 'required|string|max:30000',
                        'small_description' => 'required|string|max:30000',
                        'img'               => 'nullable|image|mimes:png,jpg,jpeg,gif',
                        'show_in_homePage'  => 'required|string|in:yes,no',
                        'slug'              => 'nullable|string|unique:categories,slug,' . Request('id'),
                    ];


                break;
        }



    }
}
