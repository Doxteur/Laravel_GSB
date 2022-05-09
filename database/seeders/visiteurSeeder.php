<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class visiteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add token 
        $visiteurs = \App\Models\Visiteur::all();
        foreach ($visiteurs as $visiteur) {
            $visiteur->api_token = Str::random(60);
            $visiteur->save();
        }
    }
}
