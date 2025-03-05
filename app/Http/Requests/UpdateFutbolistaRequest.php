<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFutbolistaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check(); // Asegura que el usuario esté autenticado
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'fecha_nac' => 'required|date',
            'edad' => 'required|integer|min:15|max:50',
            'nacionalidad' => 'required|string|max:100',
            'imagen' => 'nullable|image|max:2048', // La imagen es opcional en edición
        ];
    }

    /**
     * Personalizar mensajes de error
     */
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del futbolista es obligatorio.',
            'fecha_nac.required' => 'La fecha de nacimiento es obligatoria.',
            'edad.required' => 'La edad es obligatoria.',
            'edad.integer' => 'La edad debe ser un número entero.',
            'edad.min' => 'La edad mínima permitida es 15 años.',
            'edad.max' => 'La edad máxima permitida es 50 años.',
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.max' => 'La imagen no debe pesar más de 2MB.',
        ];
    }
}
