<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'preview' => ['required', 'string', 'min:2', 'max:255'],
            'text' => ['required', 'string', 'min:2', 'max:5000'],
            'priority' => ['nullable', 'boolean'],
            'file' => ['required', 'image', 'max:10240'],
        ];
    }

    public function messages()
    {
        return [
            // 'атрибут.правило' => 'текст с ошибкой'
            'name.required' => 'Название задачи обязательно к заполнению'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Название задачи',
            'preview' => 'Краткое описание задачи'
        ];
    }
}
