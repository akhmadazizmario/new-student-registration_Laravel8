<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        User::create(
            [
                'name' => 'Aziz',
                'email' => 'aziz@gmail.com',
                'password' => bcrypt('12345')
            ]
        );

        Pengaturan::create(
            [
                'kepala_sekolah' => 'bapaku',
                'sambutan' => 'assalam',
                'user_id' => 1,
            ]
        );
    }
}
