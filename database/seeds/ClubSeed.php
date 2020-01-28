<?php

use App\Models\Clubs;
use Illuminate\Database\Seeder;

class ClubSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($c = 1; $c < 6; $c++){
            Clubs::create([
                'name' => 'Club '. $c,
                'website' => 'https://club-'. $c . '.com',
                'email' => 'club-'. $c . '@gmail.com',
                'phone' => '12345678'. $c
            ]);
        }
    }
}
