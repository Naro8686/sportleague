<?php

use Illuminate\Database\Seeder;
use App\Models\League;

class LeagueSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        League::create([
            'start_date' => '28.01.2020',
            'end_date' => '28.05.2020',
            'price' => '99',
            'min_users' => '2',
            'max_users' => '6'
        ]);
    }
}
