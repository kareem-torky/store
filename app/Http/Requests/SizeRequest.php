<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SizeRequest extends FormRequest
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
                        'title'              => 'required|string|max:190',
                        'desc'              => 'required|string|max:1000',
                    ];


                break;


            //  editing data 
            case 'PUT':
                        
                        return [
                            'title'              => 'required|string|max:190',
                            'desc'              => 'required|string|max:1000',
                        ];


                break;
        }
    }
}
