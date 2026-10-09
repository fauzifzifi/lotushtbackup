<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        // slug => label tab filter
        $kategori = [
            'kegiatan-sekolah' => 'Kegiatan Sekolah',
            'pembelajaran' => 'Pembelajaran Kelas & Praktikum',
            'ekstrakurikuler' => 'Ekstrakurikuler',
            'prestasi' => 'Perlombaan & Prestasi',
            'upacara' => 'Upacara Bendera & Peringatan Hari Besar',
        ];

        // ---------- Foto (dummy) ----------
        $semuaFoto = collect([
            [
                'kategori' => 'upacara',
                'badge' => 'Upacara',
                'warna' => 'navy',
                'judul' => 'Upacara Peringatan Hari Pendidikan Nasional di Lapangan SMPN 1 Loceret',
                'ket' => 'Seluruh civitas akademika berkumpul menanamkan rasa nasionalisme dan dedikasi terhadap pemajuan mutu pendidikan di Kabupaten Nganjuk.'
            ],
            [
                'kategori' => 'pembelajaran',
                'badge' => 'Pembelajaran',
                'warna' => 'pucat',
                'judul' => 'Praktikum Siswa di Lab IPA Terpadu',
                'ket' => 'Eksplorasi biologi dan mikrosains aplikatif.'
            ],
            [
                'kategori' => 'ekstrakurikuler',
                'badge' => 'Ekstrakurikuler',
                'warna' => 'hijau',
                'judul' => 'Latihan Rutin Pramuka',
                'ket' => 'Membangun disiplin, kepemimpinan, dan solidaritas…'
            ],
            [
                'kategori' => 'prestasi',
                'badge' => 'Perlombaan',
                'warna' => 'pucat',
                'judul' => 'Penyerahan Piala Apel Pagi Juara…',
                'ket' => 'Apresiasi kontingen peraih medali tingkat Jawa…'
            ],
            [
                'kategori' => 'kegiatan-sekolah',
                'badge' => 'Kegiatan Sekolah',
                'warna' => 'pucat',
                'judul' => 'Kegiatan Literasi Pagi di Perpustakaan',
                'ket' => 'Gerakan pembiasaan membaca 15 menit sebelum…'
            ],
            [
                'kategori' => 'ekstrakurikuler',
                'badge' => 'Ekstrakurikuler',
                'warna' => 'hijau',
                'judul' => 'Pagelaran Seni Tari Tradisional &…',
                'ket' => 'Melestarikan warisan budaya Jawa Timur dengan…'
            ],
            [
                'kategori' => 'pembelajaran',
                'badge' => 'Pembelajaran',
                'warna' => 'pucat',
                'judul' => 'Pembelajaran Berbasis Digital di Lab…',
                'ket' => 'Kesiapan kompetensi komputasi dan teknologi abad'
            ],
            [
                'kategori' => 'kegiatan-sekolah',
                'badge' => 'Kegiatan Sekolah',
                'warna' => 'pucat',
                'judul' => 'Aksi Peduli Lingkungan Adiwiyata',
                'ket' => 'Menanam pohon untuk konservasi ekosistem…'
            ],
        ]);

        $totalFoto = $semuaFoto->count();

        $aktif = (string) $request->query('kategori', '');
        $foto = array_key_exists($aktif, $kategori)
            ? $semuaFoto->where('kategori', $aktif)->values()
            : $semuaFoto;

        // ---------- Video (dummy) ----------
        $semuaVideo = collect([
            [
                'badge' => 'Profil Unggulan',
                'warna' => 'navy',
                'durasi' => '07:45',
                'url' => '#',
                'judul' => 'Profil Resmi SMP Negeri 1 Loceret [TAHUN]',
                'ket' => 'Mengenal lebih dekat sarana prasarana modern, kurikulum berkarakter Pancasila, keunggulan tenaga pendidik, serta lingkungan belajar inklusif dan asri di jantung Loceret, Nganjuk.'
            ],
            [
                'badge' => 'Festival & P5',
                'warna' => 'pucat',
                'durasi' => '05:20',
                'url' => '#',
                'judul' => 'Kemeriahan Peringatan HUT Sekolah & Gelar Karya P5',
                'ket' => 'Sorotan karya inovatif dan kewirausahaan siswa kelas 7 hingga 9.'
            ],
            [
                'badge' => 'Kepramukaan & LDKS',
                'warna' => 'hijau',
                'durasi' => '04:15',
                'url' => '#',
                'judul' => 'Dokumentasi LDKS & Perkemahan Pramuka Penggalang',
                'ket' => 'Kegiatan luar ruangan mengasah kemandirian, ketahanan fisik, dan solidaritas.'
            ],
        ]);

        $videoUtama = $semuaVideo->first();
        $videoLain = $semuaVideo->slice(1)->values();

        return view('public.galeri', compact(
            'kategori',
            'aktif',
            'foto',
            'totalFoto',
            'videoUtama',
            'videoLain'
        ));
    }
}