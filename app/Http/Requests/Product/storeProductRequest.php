<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class storeProductRequest extends FormRequest
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

                'name.en' => 'required|string|max:255',
                'name.gr' => 'required|string|max:255',
                'description.en' => 'required|string',
                'description.gr' => 'required|string',
                'type.en' => 'required|string',
                'type.gr' => 'required|string',
//                'modelNumber' => 'required|string|max:255',
                'newPrice' => 'required|integer',
                'oldPrice' => 'nullable|integer',
                'photos'=> 'required|array',
                'photos.*.image' => 'required|image',
                'photos.*.color' => 'required|string|max:50',


        ];
    }
}
