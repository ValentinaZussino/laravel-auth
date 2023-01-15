<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDevlangRequest extends FormRequest
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
            'name' => ['required',Rule::unique('devlangs')->ignore($this->devlang),'max:50']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'il nome del linguaggio è obbligatorio',
            'name.unique' => 'il nome del linguaggio esiste già',
            'name.max' => 'il nome del linguaggio non può superare i :max caratteri',
        ];
    }
}
