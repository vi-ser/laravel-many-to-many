<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'nullable|max:5000',
            'src' => 'file|max:2048|nullable|mimes:jpg,bmp,png',
            'technology' => 'nullable|max:100',
            'github_link' => 'required|max:5000',
            'date' => 'required',
            'type_id' => 'nullable|exists:types,id'
        ];

    }
    public function messages(): array
    {
        return [
            'name.required' => 'Il nome deve essere inserito',
            'name.max' => "Il titolo deve avere massimo :max caratteri",
            'description.max' => 'La descrizione deve avere massimo :max caratteri',
            'src.max' => "Le dimensioni del file non devono superare i 2048 KB",
            'src.mimes' => "Il file deve essere in formato jpg, bmp o png",
            'technology.max' => 'Il campo deve avere massimo :max caratteri',
            'github_link.required' => 'Il link deve essere inserito',
            'github_link.max' => "Il link deve avere massimo :max caratteri",
            'date.required' => 'Deve essere inserita una data',
            'type_id.exists' => 'Ehhhhhhh, volllllevi!'
        ];
    }

}