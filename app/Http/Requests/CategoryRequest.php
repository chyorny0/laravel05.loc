<?php

namespace App\Http\Requests;

use App\Rules\SeriaRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        return [
            'name' => 'required|min:4|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Поле :attribute не должно быть короче :min-x символов!',
            'name.max' => 'Имя категории не должно быть длиннее 20 символов!',
            'name.required' => 'Это поле обязательно!'
        ];
    }

    public function attributes()
    {
        return [
            'name'=>'название категории'
        ];
    }

//    public function prepareForValidation()
//    {
//
//    }


}
