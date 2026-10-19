<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DokumentasiRequest;
use App\Models\Dokumentasi;

class DokumentasiController extends Controller
{
    public function index()
    {
        // Sementara: daftar sederhana. Diganti grid kartu di Langkah 22.
        $dokumentasi = Dokumentasi::orderByDesc('tanggal')->orderByDesc('id')->get();

        return view('admin.dokumentasi.index', compact('dokumentasi'));
    }

    public function create()
    {
        return view('admin.dokumentasi.create', [
            'kategori' => Dokumentasi::KATEGORI,
        ]);
    }

    public function store(DokumentasiRequest $request)
    {
        $data = $request->safe()->only(['judul', 'tanggal', 'kategori', 'deskripsi']);
        $data['foto'] = $request->file('foto')->store('dokumentasi', 'public');

        Dokumentasi::create($data);

        return redirect()
            ->route('admin.dokumentasi.index')
            ->with('sukses', 'Dokumentasi kegiatan berhasil disimpan.');
    }
}