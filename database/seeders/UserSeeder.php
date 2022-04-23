<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name' => 'UnknownRori',
            'email' => 'UnknownRori@mail.com',
            'password' => 'UnknownRori',
            'roles' => 'admin',
        ]);
        User::create([
            'name' => 'Receptionist',
            'email' => 'Receptionist@mail.com',
            'password' => 'Receptionist',
            'roles' => 'receptionist',
        ]);
        User::create([
            'name' => 'Guest',
            'email' => 'Guest@mail.com',
            'password' => 'Guest',
            'roles' => 'guest'
        ]);
        User::factory(2)->create();
    }
}
