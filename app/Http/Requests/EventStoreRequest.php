<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'judul'         => 'required|unique:events|max:255',
            'keterangan'    => 'required',
            'mulai'         => 'required',
            'selesai'       => 'required',
            'link'          => 'required',
            'photo'         => 'mimes:jpg,jpeg,png|max:5024', //max 5 MB
        ];
    }
}
