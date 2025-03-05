<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Futbolista;

class FutbolistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 10 futbolistas usando el factory
        Futbolista::factory()->count(10)->create();
    }
}
