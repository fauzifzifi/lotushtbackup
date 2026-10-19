<?php

namespace App\Http\Requests\Admin;

use App\Models\Dokumentasi;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DokumentasiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    // Samakan baris baru (\r\n -> \n) supaya hitungan karakter server = hitungan di browser
    protected function prepareForValidation(): void
    {
        if ($this->filled('deskripsi')) {
            $this->merge([
                'deskripsi' => str_replace("\r\n", "\n", $this->input('deskripsi')),
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'judul' => ['required', 'string', 'max:150'],
            'tanggal' => ['required', 'date', 'before_or_equal:today'],
            'kategori' => ['required', Rule::in(array_keys(Dokumentasi::KATEGORI))],
            // Saat tambah (POST) foto wajib; saat edit (PUT) foto boleh dikosongkan
            'foto' => [$this->isMethod('post') ? 'required' : 'nullable', 'image', 'mimes:jpg,jpeg,png', 'max:5120'],
            'deskripsi' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul kegiatan belum diisi.',
            'judul.max' => 'Judul maksimal 150 karakter.',

            'tanggal.required' => 'Tanggal pelaksanaan belum diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
            'tanggal.before_or_equal' => 'Tanggal pelaksanaan tidak boleh di masa depan.',

            'kategori.required' => 'Kategori kegiatan belum dipilih.',
            'kategori.in' => 'Kategori yang dipilih tidak valid.',

            'foto.required' => 'Foto dokumentasi belum dipilih.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format foto harus JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 5 MB.',
            'foto.uploaded' => 'Foto gagal diunggah. Pastikan ukurannya tidak melebihi 5 MB.',

            'deskripsi.max' => 'Deskripsi maksimal 1.000 karakter.',
        ];
    }
}