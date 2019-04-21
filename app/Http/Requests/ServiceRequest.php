<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
                        'small_description' => 'required|string|max:15000',
                        'category_id'       => 'required|numeric|exists:categories,id',
                        'description'       => 'nullable|string|max:30000',
                        'img'               => 'nullable|image|mimes:png,jpg,jpeg,gif',
                        'slug'              => 'nullable|string|unique:sub_categories,slug',
                        'show_in_homePage'  => 'required|string|in:yes,no'
                    ];


                break;


            //  editing data 
            case 'PUT':
                        
                        return [
                            'name'              => 'required|string|max:190',
                            'description'       => 'required|string|max:30000',
                            'small_description' => 'required|string|max:15000',
                            'category_id'       => 'required|numeric|exists:categories,id',
                            'description'       => 'nullable|string|max:30000',
                            'img'               => 'nullable|image|mimes:png,jpg,jpeg,gif',
                            'show_in_homePage'  => 'required|string|in:yes,no',
                            'slug'              => 'nullable|string|unique:services,slug,' . Request('id'),
                    ];


                break;
        }



    }
}
