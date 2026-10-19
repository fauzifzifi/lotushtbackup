<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GuruRequest;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index(Request $request)
    {
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
            ->paginate(8)
            ->appends($request->query());

        $daftarMapel = Guru::DAFTAR_MAPEL;

        return view('admin.guru.index', compact('guru', 'q', 'mapel', 'daftarMapel'));
    }

    public function create()
    {
        return view('admin.guru.create', [
            'daftarMapel' => Guru::DAFTAR_MAPEL,
        ]);
    }

    public function store(GuruRequest $request)
    {
        // Hanya ambil nama & mapel; foto diproses terpisah
        $data = $request->safe()->only(['nama', 'mapel']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        Guru::create($data);

        return redirect()
            ->route('admin.guru.index')
            ->with('sukses', 'Data guru berhasil disimpan.');
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', [
            'guru' => $guru,
            'daftarMapel' => Guru::DAFTAR_MAPEL,
        ]);
    }

    public function update(GuruRequest $request, Guru $guru)
    {
        $data = $request->safe()->only(['nama', 'mapel']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama supaya tidak menumpuk di storage
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($data);

        return redirect()
            ->route('admin.guru.index')
            ->with('sukses', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()
            ->route('admin.guru.index')
            ->with('sukses', 'Data guru berhasil dihapus.');
    }
}