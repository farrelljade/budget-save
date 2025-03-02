<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomeStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'description' => ['nullable', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'recurring' => ['required', 'boolean']
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'The category field is required.',
            'amount.required' => 'Please enter an amount.',
            'date.required' => 'Please select a date.',
        ];
    }
}
