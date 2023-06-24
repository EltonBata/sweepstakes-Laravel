<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SweepstakesStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'end_date' => 'required',
            'number_winners' => 'required|numeric',
        ];

    }

    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatorio',
            'date_format' => 'Formato de data invalido',
            'numeric' => 'Introduza apenas numeros'
        ];
    }
}