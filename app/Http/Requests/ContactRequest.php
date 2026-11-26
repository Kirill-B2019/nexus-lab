<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'min:2', 'max:120'],
            'email'   => ['required', 'email:rfc', 'max:180'],
            'project' => ['required', 'string', 'max:120'],
            'message' => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'Имя обязательно для заполнения.',
            'email.required' => 'E-mail обязателен для заполнения.',
            'email.email'    => 'Некорректный e-mail.',
        ];
    }
}
