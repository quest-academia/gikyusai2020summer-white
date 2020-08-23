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
			'name'     	  => 'required|string|max:30',
			'recipes_img' => 'required|mimes:jpg,jpeg,png,gif',
			'time'        => 'required|integer',
			'liqueur'     => 'required|integer',
            'invention'   => 'nullable|string|max:30',
            'ingredients.0' => 'required|string|max:30',
            'ingredients.1' => 'required_with:quantities.1|max:30',
            'ingredients.2' => 'required_with:quantities.2|max:30',
            'ingredients.3' => 'required_with:quantities.3|max:30',
            'ingredients.4' => 'required_with:quantities.4|max:30',
            'ingredients.5' => 'required_with:quantities.5|max:30',
            'ingredients.6' => 'required_with:quantities.6|max:30',
            'ingredients.7' => 'required_with:quantities.7|max:30',
            'ingredients.8' => 'required_with:quantities.8|max:30',
            'ingredients.9' => 'required_with:quantities.9|max:30',
            'quantities.0' => 'required_with:ingredients.0|max:10',
            'quantities.1' => 'required_with:ingredients.1|max:10',
            'quantities.2' => 'required_with:ingredients.2|max:10',
            'quantities.3' => 'required_with:ingredients.3|max:10',
            'quantities.4' => 'required_with:ingredients.4|max:10',
            'quantities.5' => 'required_with:ingredients.5|max:10',
            'quantities.6' => 'required_with:ingredients.6|max:10',
            'quantities.7' => 'required_with:ingredients.7|max:10',
            'quantities.8' => 'required_with:ingredients.8|max:10',
            'quantities.9' => 'required_with:ingredients.9|max:10',
            'processes.0' => 'required|string|max:30',
            'processes.1' => 'required_with:processes_img.1|max:30',
            'processes.2' => 'required_with:processes_img.2|max:30',
            'processes.3' => 'required_with:processes_img.3|max:30',
            'processes.4' => 'required_with:processes_img.4|max:30',
            'processes.5' => 'required_with:processes_img.5|max:30',
            'processes.6' => 'required_with:processes_img.6|max:30',
            'processes.7' => 'required_with:processes_img.7|max:30',
            'processes.8' => 'required_with:processes_img.8|max:30',
            'processes.9' => 'required_with:processes_img.9|max:30',
            'processes_img.0' => 'required_with:processes.0|mimes:jpg,jpeg,png,gif',
            'processes_img.1' => 'required_with:processes.1|mimes:jpg,jpeg,png,gif',
            'processes_img.2' => 'required_with:processes.2|mimes:jpg,jpeg,png,gif',
            'processes_img.3' => 'required_with:processes.3|mimes:jpg,jpeg,png,gif',
            'processes_img.4' => 'required_with:processes.4|mimes:jpg,jpeg,png,gif',
            'processes_img.5' => 'required_with:processes.5|mimes:jpg,jpeg,png,gif',
            'processes_img.6' => 'required_with:processes.6|mimes:jpg,jpeg,png,gif',
            'processes_img.7' => 'required_with:processes.7|mimes:jpg,jpeg,png,gif',
            'processes_img.8' => 'required_with:processes.8|mimes:jpg,jpeg,png,gif',
            'processes_img.9' => 'required_with:processes.9|mimes:jpg,jpeg,png,gif',
        ];
    }

    public function attributes()
    {
        return [
            'name'  => '料理の名前',
            'recipes_img'    => '料理の完成写真',
			'time'        => '調理時間',
			'liqueur'     => '合うお酒',
            'invention'   => '新発見おつまみ名',
            'ingredients.0' => '材料1',
            'ingredients.1' => '材料2',
            'ingredients.2' => '材料3',
            'ingredients.3' => '材料4',
            'ingredients.4' => '材料5',
            'ingredients.5' => '材料6',
            'ingredients.6' => '材料7',
            'ingredients.7' => '材料8',
            'ingredients.8' => '材料9',
            'ingredients.9' => '材料10',
            'quantities.0' => '分量1',
            'quantities.1' => '分量2',
            'quantities.2' => '分量3',
            'quantities.3' => '分量4',
            'quantities.4' => '分量5',
            'quantities.5' => '分量6',
            'quantities.6' => '分量7',
            'quantities.7' => '分量8',
            'quantities.8' => '分量9',
            'quantities.9' => '分量10',
            'processes.0' => '料理の作り方1',
            'processes.1' => '料理の作り方2',
            'processes.2' => '料理の作り方3',
            'processes.3' => '料理の作り方4',
            'processes.4' => '料理の作り方5',
            'processes.5' => '料理の作り方6',
            'processes.6' => '料理の作り方7',
            'processes.7' => '料理の作り方8',
            'processes.8' => '料理の作り方9',
            'processes.9' => '料理の作り方10',
            'processes_img.0' => '料理の作り方の画像1',
            'processes_img.1' => '料理の作り方の画像2',
            'processes_img.2' => '料理の作り方の画像3',
            'processes_img.3' => '料理の作り方の画像4',
            'processes_img.4' => '料理の作り方の画像5',
            'processes_img.5' => '料理の作り方の画像6',
            'processes_img.6' => '料理の作り方の画像7',
            'processes_img.7' => '料理の作り方の画像8',
            'processes_img.8' => '料理の作り方の画像9',
            'processes_img.9' => '料理の作り方の画像10',
        ];
    }
}
