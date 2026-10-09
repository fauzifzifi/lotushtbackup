<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Sukorini, S.Pd', 'mapel' => 'Ilmu Pengetahuan Alam'],
            ['nama' => 'Anam, S.Ag.,M.Pd.I', 'mapel' => 'Pendidikan Agama Islam'],
            ['nama' => 'Luluk Dewi M, S.Pd.', 'mapel' => 'Matematika'],
            ['nama' => 'Hardi Handoko, S.Pd', 'mapel' => 'Informatika'],
            ['nama' => 'Nio Zaharani, S.Pd', 'mapel' => 'Seni Budaya'],
            ['nama' => 'Sri Kuswandari, S.Pd', 'mapel' => 'Bahasa Indonesia'],
            ['nama' => 'Dra. Sri Purwaningsih', 'mapel' => 'Ilmu Pengetahuan Sosial'],
            ['nama' => 'Syafrudin Y S.Pd', 'mapel' => 'Penjaskes'],
        ];

        foreach ($data as $g) {
            Guru::updateOrCreate(['nama' => $g['nama']], ['mapel' => $g['mapel']]);
        }
    }
}