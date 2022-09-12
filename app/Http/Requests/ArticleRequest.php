<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'name'=> 'required|filled|min:5|max:100|',
            'image'=> 'file|size:256|mimes:jpg,tmp,png,jpeg',
            'content'=> 'required|filled|min:10|max:5000',
            'active'=> 'accepted',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле :attribute обязательно для заполнения!',
            'name.filled' => 'Поле :attribute не должно быть пустым!',
            'name.max' => 'Поле :attribute не должно быть длиннее :max символов!',
            'name.min' => 'Поле :attribute не должно быть менее :min символов!',
            'content.required' => 'Поле :attribute обязательно для заполнения!',
            'content.filled' => 'Поле :attribute не должно быть пустым!',
            'content.max' => 'Поле :attribute не должно быть длиннее :max символов!',
            'content.min' => 'Поле :attribute не должно быть менее :min символов!',
            'image.mimes' => 'Файл имеет неверный формат данных!',
            'image.size' => 'Вы отправляете файл больше, чем :size килобайт!',
            'image.file' => 'Ваш файл не отправлен!',
            'active.accepted' => 'Поле не выбрано!',
        ];
    }
}
