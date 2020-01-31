<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'phone' => '123123123',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('administrator');

        $la = User::create([
            'first_name' => 'League',
            'last_name' => 'Admin',
            'phone' => '123123123',
            'email' => 'league@admin.com',
            'password' => bcrypt('password')
        ]);
        $la->assignRole('league_admin');

    }
}
