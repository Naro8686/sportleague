<?php

use Illuminate\Database\Seeder;

class SettingsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $texts = [
            ['title' => 'Coming Soon', 'content' => '{"show":"true","date":"Feb 26, 2020 13:00:00","title":"WE\'RE COMING SOON","description":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet semper augue. Maecenas gravida tortor sit amet enim venenatis tristique."}'],
        ];

        foreach($texts as $text){
            \App\Models\Settings::create($text);
        }
    }
}
