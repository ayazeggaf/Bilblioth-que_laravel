<?php

namespace Database\Seeders;

use App\Models\Emprunt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpruntTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Emprunt::factory(10)->create();
    }
}
