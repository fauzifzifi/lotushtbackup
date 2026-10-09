<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = ['nama', 'mapel', 'foto'];

    public const DAFTAR_MAPEL = [
        'Pendidikan Agama Islam',
        'Pendidikan Pancasila (PPKn)',
        'Bahasa Indonesia',
        'Bahasa Inggris',
        'Bahasa Jawa',
        'Matematika',
        'Ilmu Pengetahuan Alam',
        'Ilmu Pengetahuan Sosial',
        'Informatika',
        'Seni Budaya',
        'Penjaskes',
        'Prakarya',
        'Bimbingan Konseling',
    ];

    // URL foto, atau null kalau belum ada (view menampilkan inisial sebagai gantinya)
    public function getFotoUrlAttribute(): ?string
    {
        return $this->foto ? asset('storage/' . $this->foto) : null;
    }
}