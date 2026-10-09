<?php

namespace App\Http\Requests\Admin;

use App\Models\Guru;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GuruRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Route-nya sudah dikunci middleware 'auth', jadi di sini cukup true
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:150'],
            'mapel' => ['required', Rule::in(Guru::DAFTAR_MAPEL)],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama lengkap dan gelar belum diisi.',
            'nama.max' => 'Nama maksimal 150 karakter.',
            'mapel.required' => 'Mata pelajaran belum dipilih.',
            'mapel.in' => 'Mata pelajaran yang dipilih tidak valid.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format foto harus JPG atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
            'foto.uploaded' => 'Foto gagal diunggah. Pastikan ukurannya tidak melebihi 2 MB.',
        ];
    }
}