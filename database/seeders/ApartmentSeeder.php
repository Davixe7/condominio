<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
    }
}
