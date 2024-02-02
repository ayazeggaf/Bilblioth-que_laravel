<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuteurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('auteurs')->insert([
        [

            'nom'=>'zeggaf',
            'prenom'=>'aya',
        ],
        [

            'nom'=>'el_azzabi',
            'prenom'=>'chaimae',
        ],
        [

            'nom'=>'aghbaleu',
            'prenom'=>'ayoub',
        ],
        [

            'nom'=>'samadi',
            'prenom'=>'nada',
        ],
        [

            'nom'=>'metoute',
            'prenom'=>'ayman',
        ],
        [

            'nom'=>'driouch',
            'prenom'=>'douha',
        ],
        [

            'nom'=>'khniq',
            'prenom'=>'fati',
        ],
        [

            'nom'=>'mrini',
            'prenom'=>'mohammed',
        ],
        [

            'nom'=>'srati',
            'prenom'=>'saad',
        ],
        [

            'nom'=>'rubio',
            'prenom'=>'az_edin',
        ]
        ]);
    }
}
