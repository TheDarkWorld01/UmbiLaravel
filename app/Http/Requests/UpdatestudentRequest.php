<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatestudentRequest extends FormRequest
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
            'nama' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
        ];
    }
    public function messages(): array
    {
        return[
            'nama.required' => 'Nama mahasiswa tidak boleh kosong',
            'alamat.required' => 'Alamat mahasiswa tidak boleh kosong',
            'angkatan.required' => 'Angkatan mahasiswa tidak boleh kosong',
        ];
    }
}
