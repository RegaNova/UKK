<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakePetugasRequest extends FormRequest
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
            "name"=> "required|string|max:255",
            "email"=> "required|email|unique:users,email,except,id",
            "password"=> "required|string",
        ];
    }

    public function messages(): array
    {
        return [
            "name.required"=> "Nama petugas wajib diisi",
            "name.string"=> "Nama petugas harus berupa string",
            "name.max"=> "Nama petugas maksimal 255 karakter",
            "email.required"=> "Email petugas wajib diisi",
            "email.email"=> "Email petugas harus berupa email yang valid",
            "email.unique"=> "Email petugas sudah terdaftar",
            "password.required"=> "Password petugas wajib diisi",
            "password.string"=> "Password petugas harus berupa string",
        ];
    }
}
