<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    protected $table = 'dokumentasi';

    protected $fillable = ['judul', 'tanggal', 'kategori', 'foto', 'deskripsi'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // slug => label di form, teks badge di kartu, dan warna badge (navy / pucat / hijau)
    public const KATEGORI = [
        'upacara' => ['label' => 'Upacara & Apel', 'badge' => 'Upacara', 'warna' => 'navy'],
        'akademik' => ['label' => 'Akademik & Pembelajaran', 'badge' => 'Akademik', 'warna' => 'pucat'],
        'ekstrakurikuler' => ['label' => 'Ekstrakurikuler', 'badge' => 'Ekstrakurikuler', 'warna' => 'hijau'],
        'kegiatan-siswa' => ['label' => 'Kegiatan Siswa', 'badge' => 'Kegiatan Siswa', 'warna' => 'pucat'],
        'prestasi' => ['label' => 'Prestasi & Perlombaan', 'badge' => 'Prestasi', 'warna' => 'hijau'],
        'kegiatan-sekolah' => ['label' => 'Kegiatan Sekolah', 'badge' => 'Kegiatan Sekolah', 'warna' => 'pucat'],
    ];

    public function getFotoUrlAttribute(): string
    {
        return asset('storage/' . $this->foto);
    }

    public function getBadgeAttribute(): string
    {
        return self::KATEGORI[$this->kategori]['badge'] ?? ucfirst($this->kategori);
    }

    public function getWarnaAttribute(): string
    {
        return self::KATEGORI[$this->kategori]['warna'] ?? 'pucat';
    }

    // Contoh: "15 September 2026"
    public function getTanggalIndoAttribute(): string
    {
        return $this->tanggal->locale('id')->translatedFormat('d F Y');
    }
}