<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KontakController extends Controller
{
    public function index()
    {
        $jam = [
            ['hari' => 'Senin – Kamis', 'jam' => '07.00 – 15.00', 'libur' => false],
            ['hari' => 'Jumat', 'jam' => '07.00 – 11.30', 'libur' => false],
            ['hari' => 'Sabtu & Minggu', 'jam' => 'LIBUR PELAYANAN', 'libur' => true],
        ];

        $medsos = [
            ['kode' => 'ig', 'nama' => 'Instagram', 'akun' => '@smpn1loceret', 'url' => 'https://www.instagram.com/smpn1loceret?stkn=Mjl0aGN5eWY1eHM0'],
            ['kode' => 'yt', 'nama' => 'YouTube Official', 'akun' => 'SMP NEGERI1 Loceret', 'url' => 'https://youtube.com/@smpnegeri1loceret515?si=Eq_scAcqKn7ybEv_'],
            ['kode' => 'fb', 'nama' => 'Facebook', 'akun' => 'SMP Negeri 1 Loceret', 'url' => 'https://www.facebook.com/profile.php?id=100064035042701'],
            ['kode' => 'tt', 'nama' => 'TikTok', 'akun' => '@smpnegeri1.loceret', 'url' => 'https://www.tiktok.com/@smpnegeri1.loceret?_r=1&_t=ZS-9ANSqflgrW0'],
        ];

        // Ganti dengan tautan lokasi sekolah yang tepat bila hasil peta kurang pas
        $peta = [
            'embed' => 'https://www.google.com/maps?q=SMP+Negeri+1+Loceret+Nganjuk&output=embed',
            'arah' => 'https://www.google.com/maps/dir/?api=1&destination=SMP+Negeri+1+Loceret+Nganjuk',
        ];

        return view('kontak', compact('jam', 'medsos', 'peta'));
    }

    public function kirim(Request $request)
    {
        $data = $request->validate(
            [
                'nama' => ['required', 'string', 'max:100'],
                'email' => ['required', 'email', 'max:150'],
                'telepon' => ['required', 'regex:/^[0-9+\-\s]{8,20}$/'],
                'subjek' => ['required', 'string', 'max:150'],
                'pesan' => ['required', 'string', 'min:10', 'max:2000'],
            ],
            [
                'required' => ':attribute wajib diisi.',
                'email' => 'Format :attribute tidak valid.',
                'regex' => 'Format :attribute tidak valid.',
                'min.string' => ':attribute minimal :min karakter.',
                'max.string' => ':attribute maksimal :max karakter.',
            ],
            [
                'nama' => 'Nama lengkap',
                'email' => 'Alamat email',
                'telepon' => 'Nomor WhatsApp/HP',
                'subjek' => 'Subjek pesan',
                'pesan' => 'Isi pesan',
            ]
        );

        // Sementara pesan dicatat ke storage/logs/laravel.log.
        // Nanti diganti: simpan ke database dan/atau kirim ke email sekolah.
        Log::info('Pesan kontak masuk', $data);

        return redirect(route('kontak') . '#formulir')
            ->with('sukses', 'Terima kasih! Pesan Anda sudah kami terima dan akan segera kami tindak lanjuti.');
    }
}