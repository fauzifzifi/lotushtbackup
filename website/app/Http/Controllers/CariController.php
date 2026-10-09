<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CariController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $halaman = [
            ['judul' => 'Beranda', 'url' => route('beranda'),
             'isi' => 'Halaman utama SMP Negeri 1 Loceret.',
             'kunci' => 'beranda utama selamat datang akreditasi npsn home'],

            ['judul' => 'Profil Sekolah', 'url' => route('profil'),
             'isi' => 'Profil, sejarah, visi misi, dan identitas SMP Negeri 1 Loceret.',
             'kunci' => 'profil tentang sekolah'],
            ['judul' => 'Visi & Misi', 'url' => route('profil') . '#visi-misi',
             'isi' => 'Visi dan misi sekolah.',
             'kunci' => 'visi misi tujuan'],
            ['judul' => 'Identitas & Lambang', 'url' => route('profil') . '#identitas',
             'isi' => 'Identitas sekolah, NPSN, dan lambang sekolah.',
             'kunci' => 'identitas lambang logo npsn akreditasi'],
            ['judul' => 'Sejarah Sekolah', 'url' => route('profil') . '#sejarah',
             'isi' => 'Sejarah berdirinya SMP Negeri 1 Loceret.',
             'kunci' => 'sejarah berdiri history'],

            ['judul' => 'Akademik', 'url' => route('akademik'),
             'isi' => 'Kurikulum, guru, data siswa, dan prestasi.',
             'kunci' => 'akademik kurikulum merdeka ekskul ekstrakurikuler pramuka voli'],
            ['judul' => 'Data Guru & Tenaga Pendidik', 'url' => route('akademik') . '#guru',
             'isi' => 'Daftar guru dan tenaga kependidikan.',
             'kunci' => 'guru dosen pengajar tenaga pendidik staf tata usaha'],
            ['judul' => 'Statistik Data Siswa', 'url' => route('akademik') . '#statistik',
             'isi' => 'Jumlah siswa dan rombongan belajar.',
             'kunci' => 'statistik siswa murid jumlah rombel kelas'],
            ['judul' => 'Direktori Prestasi', 'url' => route('akademik') . '#prestasi',
             'isi' => 'Prestasi akademik dan non-akademik siswa.',
             'kunci' => 'prestasi juara olimpiade lomba osn o2sn fls2n piala'],

            ['judul' => 'Galeri', 'url' => route('galeri'),
             'isi' => 'Foto dan video kegiatan sekolah.',
             'kunci' => 'galeri dokumentasi album'],
            ['judul' => 'Foto Kegiatan', 'url' => route('galeri') . '#foto',
             'isi' => 'Foto kegiatan sekolah.',
             'kunci' => 'foto gambar kegiatan'],
            ['judul' => 'Video Terkini', 'url' => route('galeri') . '#video',
             'isi' => 'Video kegiatan sekolah.',
             'kunci' => 'video youtube'],

            ['judul' => 'Kontak', 'url' => route('kontak'),
             'isi' => 'Hubungi sekolah, jam pelayanan, media sosial, dan lokasi.',
             'kunci' => 'kontak hubungi telepon whatsapp wa email alamat lokasi peta jam pelayanan instagram youtube facebook tiktok pengaduan'],
        ];

        $hasil = [];

        if (mb_strlen($q) >= 2) {
            $kata = Str::lower($q);

            foreach ($halaman as $h) {
                $judul = Str::lower($h['judul']);

                if ($judul === $kata) {
                    $skor = 3;                                   // judul sama persis
                } elseif (Str::contains($judul, $kata)) {
                    $skor = 2;                                   // judul mengandung kata kunci
                } elseif (Str::contains(Str::lower($h['isi'] . ' ' . $h['kunci']), $kata)) {
                    $skor = 1;                                   // hanya cocok di isi / kata kunci
                } else {
                    continue;
                }

                $h['skor'] = $skor;
                $hasil[] = $h;
            }

            usort($hasil, fn ($a, $b) => $b['skor'] <=> $a['skor']);

            if (count($hasil) > 0) {
                $teratas = array_filter($hasil, fn ($h) => $h['skor'] === $hasil[0]['skor']);

                // Langsung pindah halaman jika hanya ada satu hasil terbaik
                if (count($teratas) === 1) {
                    return redirect()->to($hasil[0]['url']);
                }
            }
        }

        return view('cari', compact('q', 'hasil'));
    }
}