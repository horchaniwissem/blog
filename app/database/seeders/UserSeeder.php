<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Wissem Horchani',
            'email' => 'horchani.wissem@icloud.com',
            'role' => 'ROLE_ADMIN',
            'password' => Hash::make('1234'),
        ]);

        UserFactory::times(5)->hasPosts(5)->create();


    }
}
