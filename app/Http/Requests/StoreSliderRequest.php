<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            // 'title' => 'required|string|max:255',
            // 'description' => 'required|string',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'is_active' => 'boolean',
            // 'order' => 'required|number',

        ];
    }
}
