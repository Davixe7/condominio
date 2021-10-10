<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      for ($piso=0; $piso < 5; $piso++) { 
        for ($apto=1; $apto < 7; $apto++) { 
          \App\Models\Apartment::create([
            'name'  => '0' . $piso . '0' . $apto,
            'floor' => $piso
          ]);
        }
      }
        // \App\Models\User::factory(10)->create();
    }
}
