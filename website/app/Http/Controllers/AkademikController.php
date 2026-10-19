<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class AkademikController extends Controller
{
    public function index(Request $request)
    {
        // ---------- Data guru (dari database) ----------
        $q = trim((string) $request->query('q', ''));
        $mapel = (string) $request->query('mapel', '');

        $guru = Guru::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($w) use ($q) {
                    $w->where('nama', 'like', "%{$q}%")
                        ->orWhere('mapel', 'like', "%{$q}%");
                });
            })
            ->when($mapel !== '', fn($query) => $query->where('mapel', $mapel))
            ->orderBy('id')
            ->paginate(6)
            ->appends($request->query())
            ->fragment('guru');

        // Filter hanya menampilkan mapel yang benar-benar ada gurunya
        $daftarMapel = Guru::query()->distinct()->orderBy('mapel')->pluck('mapel');

        // ---------- Ringkasan di header ----------
        // 'juara' masih dummy sampai modul prestasi dibuat
        $ringkasan = ['guru' => Guru::count(), 'juara' => 124];

        // ---------- Rekapitulasi ekstrakurikuler (dummy) ----------
        $ekskul = [
            ['nama' => 'Pramuka – Penggalang Putra', 'jumlah' => 54],
            ['nama' => 'Pramuka – Penggalang Putri', 'jumlah' => 82],
            ['nama' => 'Bola Voli', 'jumlah' => 34],
            ['nama' => 'Sepak Bola', 'jumlah' => 35],
            ['nama' => 'Hadrah', 'jumlah' => 38],
            ['nama' => 'Paduan Suara', 'jumlah' => 22],
            ['nama' => 'Tari', 'jumlah' => 28],
            ['nama' => 'Rupa', 'jumlah' => 19],
            ['nama' => 'English One', 'jumlah' => 31],
            ['nama' => 'PMR', 'jumlah' => 38],
            ['nama' => 'KIR', 'jumlah' => 27],
            ['nama' => 'Paskibra', 'jumlah' => 53],
            ['nama' => 'Literasi', 'jumlah' => 29],
            ['nama' => 'Pencak Silat “IPSI”', 'jumlah' => 25],
            ['nama' => 'SSC Prapanca', 'jumlah' => 17],
            ['nama' => 'Lotus Media Crew (Jurnalistik)', 'jumlah' => 22],
        ];

        // Total siswa = 586 (sesuai keputusan).
        // Kalau ingin total dihitung dari jumlah baris, ganti menjadi:
        // $totalPartisipan = array_sum(array_column($ekskul, 'jumlah'));
        $totalPartisipan = 586;

        // ---------- Direktori prestasi (dummy) ----------
        $daftarBidang = [
            'Akademik & Sains',
            'Olahraga & Atletik',
            'Seni & Budaya',
            'Teknologi & Robotik',
            'Kepramukaan & PMR',
        ];

        $semuaPrestasi = collect([
            [
                'bidang' => 'Akademik & Sains',
                'badge' => 'Akademik',
                'warna' => 'akademik',
                'tanggal' => '28 Agustus 2026',
                'judul' => 'Juara I Olimpiade Sains Nasional (OSN) Bidang…'
            ],
            [
                'bidang' => 'Olahraga & Atletik',
                'badge' => 'Olahraga',
                'warna' => 'olahraga',
                'tanggal' => '28 Agustus 2026',
                'judul' => 'Juara II Kejuaraan Bola Voli Pelajar Tingkat SMP'
            ],
            [
                'bidang' => 'Seni & Budaya',
                'badge' => 'Seni & Budaya',
                'warna' => 'seni',
                'tanggal' => '28 Agustus 2026',
                'judul' => 'Juara I FLS2N Festival Seni Tari Kreasi…'
            ],
            [
                'bidang' => 'Teknologi & Robotik',
                'badge' => 'Teknologi',
                'warna' => 'teknologi',
                'tanggal' => '28 Agustus 2026',
                'judul' => 'Juara Harapan I Inovasi Media Digital & IoT…'
            ],
        ]);

        $bidangAktif = (string) $request->query('bidang', '');
        $prestasi = $bidangAktif !== ''
            ? $semuaPrestasi->where('bidang', $bidangAktif)->values()
            : $semuaPrestasi;

        return view('public.akademik', compact(
            'ringkasan',
            'guru',
            'daftarMapel',
            'q',
            'mapel',
            'ekskul',
            'totalPartisipan',
            'daftarBidang',
            'prestasi',
            'bidangAktif'
        ));
    }
}