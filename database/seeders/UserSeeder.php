<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\User::create([
        'name' => 'David',
        'email' => 'davidguilarte7@gmail.com',
        'password' => bcrypt(123456),
      ]);

      \App\Models\User::create([
        'name' => 'Rosa',
        'email' => 'rosaalvarado@gmail.com',
        'password' => bcrypt(123456),
      ]);
    }
}
