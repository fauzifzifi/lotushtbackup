<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@smpn1loceret.sch.id'],
            [
                'name' => 'Administrator',
                'password' => 'admin12345',
            ]
        );
        $this->call(GuruSeeder::class);
    }
}