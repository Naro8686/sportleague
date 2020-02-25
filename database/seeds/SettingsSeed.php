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
            ['title' => 'Coming Soon', 'content' => '{"show":"true","countdown":"true","date":"Feb 26, 2020 13:00:00","title":"WE\'RE COMING SOON","description":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet semper augue. Maecenas gravida tortor sit amet enim venenatis tristique."}'],
            ['title' => 'Paypal Client ID', 'content' => 'AXiFCJAVKRr8CkyUdX_exLrxJ9u_EWVGMSsX4YvdIMP_5hIJoObK7mJoH0pKEfBYA3i__KCW6XXCsX5J'],
            ['title' => 'SMTP Driver', 'content' => 'smtp'],
            ['title' => 'SMTP Host', 'content' => 'smtp.mailtrap.io'],
            ['title' => 'SMTP Port', 'content' => 2525],
            ['title' => 'SMTP From', 'content' => 'from@example.com'],
            ['title' => 'SMTP From name', 'content' => 'Example'],
            ['title' => 'SMTP Username', 'content' => '4d64cf4403b221123123'],
            ['title' => 'SMTP Password', 'content' => 'bdb2cf9c8c6cd2123123'],
            ['title' => 'SMTP Encryption', 'content' => 'tls'],
        ];

        foreach($texts as $text){
            \App\Models\Settings::create($text);
        }
    }
}
