<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipesRequest extends FormRequest
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
			'name'     	  => 'required|string|max:255',
			'recipes_img' => 'required|mimes:jpg,jpeg,png,gif',
			'time'        => 'required|integer',
			'liqueur'     => 'required|integer',
            'invention'   => 'nullable|string|max:255',
            'name'     	  => 'required|string|max:255',
            'quantity'    => 'required|string|max:255',

            
        ];
    }
}
