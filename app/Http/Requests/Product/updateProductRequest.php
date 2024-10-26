<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class updateProductRequest extends FormRequest
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

                'name.en' => 'string|max:255',
                'name.gr' => 'string|max:255',
                'description.en' => 'string',
                'description.gr' => 'string',
                'type.en' => 'string',
                'type.gr' => 'string',
                'modelNumber' => 'string|max:255',
                'newPrice' => 'integer',
                'oldPrice' => 'integer',
        ];
    }
}
