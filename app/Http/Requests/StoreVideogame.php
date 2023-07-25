<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideogame extends FormRequest
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
            'name'=>'required|min:3|max:20',

        ];
    }
    public function attributes(): array
    {
        return [
            'name'=>'Videogame name',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'El nombre del videojuego no puede estar vacio',
            'name.min'=>'El nombre del videojuego no puede contener menos de 3 caracteres',
            'name.max'=>'El nombre del videojuego no puede contener mas de 20 caracteres',
        ];
    }
}
