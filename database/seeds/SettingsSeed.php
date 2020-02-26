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
            ['title' => 'SMTP', 'content' => '{"driver":"sendmail","host":"smtp.sendgrid.net","port":"25","from":"hello@leaguemanager.cc","from_name":"League Manager","username":"VXNlcm5hbWU6","password":"bnRlNzBXdHVSZ2FBR0FTNW5RNVZHQQ==","encryption":"tls"}'],
        ];

        foreach($texts as $text){
            \App\Models\Settings::create($text);
        }
    }
}
