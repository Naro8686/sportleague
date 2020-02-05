<?php

use Illuminate\Database\Seeder;
use App\Models\RaceCategory;

class RaceCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($c = 1; $c < 5; $c++){
            RaceCategory::create([
                'name' => 'A'. $c,
            ]);
        }
    }
}
