<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDevlangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:devlangs|max:50'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il nome del linguaggio è obbligatorio',
            'name.unique' => 'Il nome del linguaggio esiste già',
            'name.max' => 'Il nome del linguaggio non può superare i :max caratteri',
        ];
    }
}
