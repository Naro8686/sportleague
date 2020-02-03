<?php

use App\Models\Races;
use Illuminate\Database\Seeder;

class RaceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($c = 1; $c < 6; $c++){
            Races::create([
                'date' => '0'. $c . '.05.2020',
                'name' => 'Race '. $c,
                'location' => 'Location '. $c,
                'start_time' => '1'. $c . '.00',
                'max_marshals' => $c
            ]);
        }
    }
}
