<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Validasi extends FormRequest
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
            'title' => ['required','unique:posts']
        ];
    }

    public function message()
    {
        return [
                'required' => 'kolom : title harus di isi',
                'title' => 'data title sudah ada'
        ];
        # code...
    }
}
