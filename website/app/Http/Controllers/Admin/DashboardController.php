<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Data contoh. Akan diganti query database saat modulnya dibuat.
        $statistik = [
            ['label' => 'Total Guru & GTK', 'angka' => 54, 'satuan' => 'Orang', 'teks' => 'Lihat Data', 'route' => 'admin.guru.index'],
            ['label' => 'Ekstrakurikuler Aktif', 'angka' => 16, 'satuan' => 'Cabang', 'teks' => 'Kelola Ekskul', 'route' => 'admin.ekskul.index'],
            ['label' => 'Dokumentasi Terarsip', 'angka' => 148, 'satuan' => 'Foto', 'teks' => 'Tambah Arsip', 'route' => 'admin.dokumentasi.create'],
            ['label' => 'Galeri / Album Aktif', 'angka' => 18, 'satuan' => 'Album', 'badge' => 'Tayang'],
        ];

        $kegiatan = [
            ['kategori' => 'Kedisiplinan', 'judul' => 'Upacara Bendera Hari Senin & Penyerahan Piala Juara FLS2N', 'penulis' => 'Drs. Agus Hariyanto (Waka Kesiswaan)', 'terbit' => true],
            ['kategori' => 'Akademik', 'judul' => 'Praktikum Mandiri Lab IPA: Pengujian Larutan Asam & Basa Kelas VIII', 'penulis' => 'Siti Nurjanah, S.Pd (Guru IPA)', 'terbit' => true],
            ['kategori' => 'Ekstrakurikuler', 'judul' => 'Latihan Rutin Satuan Paskibra Persiapan LKBB Tingkat Kabupaten Nganjuk', 'penulis' => 'Bambang S., S.Pd (Pembina Paskibra)', 'terbit' => false],
        ];

        $ekskul = [
            ['nama' => 'Pramuka Penggalang Putri', 'jumlah' => 82],
            ['nama' => 'Paskibra (Bhirawa Muda)', 'jumlah' => 53],
            ['nama' => 'Palang Merah Remaja (PMR)', 'jumlah' => 38],
            ['nama' => 'Seni Hadrah & Rebana', 'jumlah' => 38],
            ['nama' => 'Sepak Bola & Futsal', 'jumlah' => 35],
        ];

        return view('admin.dashboard', compact('statistik', 'kegiatan', 'ekskul'));
    }
}