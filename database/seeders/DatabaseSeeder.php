<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DetailTravail;
use App\Models\Travail;
use App\Models\TypeFinition;
use App\Models\TypeMaison;
use App\Models\Unite;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'isadmin' => true,
            'password' => 'admin'
        ]);

        \App\Models\Client::create([
            'tel' => '0345055050'
        ]);

        Unite::create([
            'nom' => 'm3'
        ]);
        Unite::create([
            'nom' => 'm2'
        ]);
        Unite::create([
            'nom' => 'fft'
        ]);

        TypeFinition::create([
            'name' => 'Standard',
            'pourcentage' => 0
        ]);
        TypeFinition::create([
            'name' => 'Gold',
            'pourcentage' => 1.5
        ]);
        TypeFinition::create([
            'name' => 'Premium',
            'pourcentage' => 2.3
        ]);
        TypeFinition::create([
            'name' => 'VIP',
            'pourcentage' => 4.5
        ]);

        TypeMaison::create([
            'name' => 'Immeuble',
            'description' => '10 chambres, 5 living, 10 salle de bain, 1 piscine interieur, 1 spa',
            'dure' => 26
        ]);
        TypeMaison::create([
            'name' => 'Batiment simple',
            'description' => '2 chambres, 1 living, 1 salle de bain',
            'dure' => 11
        ]);
        //
        Travail::create([
            'designation' => 'Décapage des terrains meubles',
            'code' => '101',
            'prix_unitaire' => 3072.87,
            'idunite' => 1
        ]);
        Travail::create([
            'designation' => 'Dressage du plateforme',
            'code' => '102',
            'prix_unitaire' => 3736.26,
            'idunite' => 2
        ]);
        Travail::create([
            'designation' => 'Fouille d\'ouvrage terrain ferme',
            'code' => '103',
            'prix_unitaire' => 9390.93,
            'idunite' => 1
        ]);
        Travail::create([
            'designation' => 'Remblai d\'ouvrage',
            'code' => '104',
            'prix_unitaire' => 37563.26,
            'idunite' => 2
        ]);

        //

        DetailTravail::create([
            'id_type_maison' => 1,
            'id_travails' => 1,
            'qte' => 101.36
        ]);
        DetailTravail::create([
            'id_type_maison' => 1,
            'id_travails' => 2,
            'qte' => 101.36
        ]);
        DetailTravail::create([
            'id_type_maison' => 1,
            'id_travails' => 3,
            'qte' => 24.44
        ]);
        DetailTravail::create([
            'id_type_maison' => 1,
            'id_travails' => 4,
            'qte' => 15.59
        ]);

        // -----------
        DetailTravail::create([
            'id_type_maison' => 2,
            'id_travails' => 1,
            'qte' => 99.36
        ]);
        DetailTravail::create([
            'id_type_maison' => 2,
            'id_travails' => 2,
            'qte' => 105.36
        ]);
        DetailTravail::create([
            'id_type_maison' => 2,
            'id_travails' => 3,
            'qte' => 34.44
        ]);
        DetailTravail::create([
            'id_type_maison' => 2,
            'id_travails' => 4,
            'qte' => 12.59
        ]);



    }
}
