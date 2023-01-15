<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' =>'required|unique:projects|max:100|min:3',
	        'description' => 'nullable',
            'framework' => 'nullable',
            'difficulty' => 'nullable',
            'team' => 'nullable',
            'git_link' => 'nullable',
            'cover_image' => 'nullable|image|max:1000',
            'type_id' => 'required|exists:types,id'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Il titolo del progetto è obbligatorio',
            'title.max'=>'Il titolo del progetto non può superare i :max caratteri',
            'title.min'=>'Il titolo del progetto non può essere inferiore a :min caratteri',
            'title.unique:projects'=>'Questo titolo esiste già!',
        ];
    }
}
