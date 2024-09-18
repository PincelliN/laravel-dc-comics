<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
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
            'title'=>'required|min:5|max:100',
            'thumb'=>'required|extensions:jpg,png,gif|starts_with:https://www.',
            'price'=>'required|min:3|max:10',
            'series'=>'required|min:2|max:100',
            'sale_date'=>'required',
            'type'=>'required|min:3|max:50'
        ];
    }

    public function messages()
    {
        return[
                'title.required' => 'Il campo titolo è obbligatorio.',
            'title.min' => 'Il titolo deve avere almeno 5 caratteri.',
            'title.max' => 'Il titolo non può superare i 255 caratteri.',

            'thumb.required' => 'Il campo immagine è obbligatorio.',
            'thumb.extensions' => 'L\'immagine deve avere un\'estensione valida (jpg, png, gif).',
            'thumb.starts_with' => 'L\'URL deve iniziare con https://www.',

            'price.required' => 'Il campo prezzo è obbligatorio.',
            'price.min' => 'Il prezzo deve essere di almeno 3 caratteri.',
            'price.max' => 'Il prezzo non può superare i 10 caratteri.',

            'series.required' => 'Il campo serie è obbligatorio.',
            'series.min' => 'La serie deve avere almeno 2 caratteri.',
            'series.max' => 'La serie non può superare i 100 caratteri.',

            'sale_date.required' => 'La data di uscita è obbligatoria.',

            'type.required' => 'Il campo tipo è obbligatorio.',
            'type.min' => 'Il tipo deve avere almeno 3 caratteri.',
            'type.max' => 'Il tipo non può superare i 50 caratteri.'
        ];
    }
}
