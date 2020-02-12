<?php

use Illuminate\Database\Seeder;

class TextsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $texts = [
            ['key' => 'Copyright', 'value' => 'Copyright 2019. All rights reserved'],
            ['key' => 'Actions', 'value' => 'Actions'],
            ['key' => 'Add', 'value' => 'Add'],
            ['key' => 'View', 'value' => 'View'],
            ['key' => 'Edit', 'value' => 'Edit'],
            ['key' => 'Delete', 'value' => 'Delete'],
            ['key' => 'Go to web', 'value' => 'Go to web'],
            ['key' => 'Main', 'value' => 'Main'],
            ['key' => 'Dashboard', 'value' => 'Dashboard'],
            ['key' => 'Texts', 'value' => 'Texts'],
            ['key' => 'Privacy policy', 'value' => 'Privacy policy'],
            ['key' => 'Profile', 'value' => 'Profile'],
            ['key' => 'My Races', 'value' => 'My Races'],
            ['key' => 'Users', 'value' => 'Users'],
            ['key' => 'Race categories', 'value' => 'Race categories'],
            ['key' => 'Races', 'value' => 'Races'],
            ['key' => 'Clubs', 'value' => 'Clubs'],
            ['key' => 'League', 'value' => 'League'],
            ['key' => 'Permissions', 'value' => 'Permissions'],
            ['key' => 'Roles', 'value' => 'Roles'],
            ['key' => 'Payments', 'value' => 'Payments'],
            ['key' => 'Edit profile', 'value' => 'Edit profile'],
            ['key' => 'Change password', 'value' => 'Change password'],
            ['key' => 'Logout', 'value' => 'Logout'],
            ['key' => 'Add Clubs', 'value' => 'Add Clubs'],
            ['key' => 'Clubs list', 'value' => 'Clubs list'],
            ['key' => 'Name', 'value' => 'Name'],
            ['key' => 'Website', 'value' => 'Website'],
            ['key' => 'Contact person', 'value' => 'Contact person'],
            ['key' => 'Email', 'value' => 'Email'],
            ['key' => 'Phone', 'value' => 'Phone'],
            ['key' => 'Show Club', 'value' => 'Show Club'],
            ['key' => 'Back to list', 'value' => 'Back to list'],
            ['key' => 'Edit club', 'value' => 'Edit club'],
            ['key' => 'Save', 'value' => 'Save'],
            ['key' => 'Create club', 'value' => 'Create club'],
        ];

        foreach($texts as $text){
            \App\Models\Texts::create($text);
        }
    }
}
