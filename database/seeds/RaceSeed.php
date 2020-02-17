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
                'date' => strtotime('0'. $c . '.05.2020'),
                'name' => 'Race '. $c,
                'location' => 'Location '. $c,
                'location_link' => 'https://www.google.ru/maps/place/%D0%9B%D0%BE%D0%BD%D0%B4%D0%BE%D0%BD,+%D0%92%D0%B5%D0%BB%D0%B8%D0%BA%D0%BE%D0%B1%D1%80%D0%B8%D1%82%D0%B0%D0%BD%D0%B8%D1%8F/@51.5285582,-0.2416792,11z/data=!3m1!4b1!4m5!3m4!1s0x47d8a00baf21de75:0x52963a5addd52a99!8m2!3d51.5073509!4d-0.1277583',
                'start_time' => '1'. $c . '.00',
                'club_id' => $c,
                'max_marshals' => '1'.$c,
                'min_marshals' => '6',
            ]);
        }
    }
}
