<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'holderName' => 'string',
            'value' => 'required',
            'billingType' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser uma string.',
            'numeric' => 'O campo :attribute deve ser um número.',
            'in' => 'O valor selecionado para o campo :attribute é inválido.',
            'boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',
            'array' => 'O campo :attribute deve ser um array.',

            // Mensagens específicas para cada campo...
            'customer.required' => 'O campo Cliente é obrigatório.',
            'billingType.required' => 'O campo Tipo de Cobrança é obrigatório.',

        ];
    }
}
