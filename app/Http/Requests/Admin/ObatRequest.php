<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ObatRequest extends FormRequest
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
            'image' => 'nullable|mimes:png,jpg|max:2048',
            'nama' => 'required|min:2|string',
            'harga' => 'required|integer|min:999',
            'satuan' => 'required|string',
            'keterangan' => 'required|string'
        ];
    }
}
