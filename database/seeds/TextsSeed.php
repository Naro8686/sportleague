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
            ['key' => 'You are registered to marshal the following races', 'value' => 'You are registered to marshal the following races'],
            ['key' => 'Receipt', 'value' => 'Receipt'],
            ['key' => 'Welcome to dashboard', 'value' => 'Welcome to dashboard'],
            ['key' => 'to fully use the site', 'value' => 'to fully use the site'],
            ['key' => 'Pay', 'value' => 'Pay'],
            ['key' => 'Race date', 'value' => 'Race date'],
            ['key' => 'Race name', 'value' => 'Race name'],
            ['key' => 'Location', 'value' => 'Location'],
            ['key' => 'Start time', 'value' => 'Start time'],
            ['key' => 'Register date', 'value' => 'Register date'],
            ['key' => 'League settings', 'value' => 'League settings'],
            ['key' => 'Full name', 'value' => 'Full name'],
            ['key' => 'Amount', 'value' => 'Amount'],
            ['key' => 'Invoice URL', 'value' => 'Invoice URL'],
            ['key' => 'Date', 'value' => 'Date'],
            ['key' => 'URL', 'value' => 'URL'],
            ['key' => 'Privacy Policy page', 'value' => 'Privacy Policy page'],
            ['key' => 'Content', 'value' => 'Content'],
            ['key' => 'Title', 'value' => 'Title'],
            ['key' => 'Text', 'value' => 'Text'],
            ['key' => 'Update', 'value' => 'Update'],
            ['key' => 'Show privacy policy texts', 'value' => 'Show privacy policy texts'],
            ['key' => 'Create category', 'value' => 'Create category'],
            ['key' => 'Edit category', 'value' => 'Edit category'],
            ['key' => 'Add Category', 'value' => 'Add Category'],
            ['key' => 'Race categories', 'value' => 'Race categories'],
            ['key' => 'Show Category', 'value' => 'Show Category'],
            ['key' => 'Create race', 'value' => 'Create race'],
            ['key' => 'Location link', 'value' => 'Location link'],
            ['key' => 'Start date', 'value' => 'Start date'],
            ['key' => 'Club', 'value' => 'Club'],
            ['key' => 'Max participants', 'value' => 'Max participants'],
            ['key' => 'Min marshals', 'value' => 'Min marshals'],
            ['key' => 'Edit race', 'value' => 'Edit race'],
            ['key' => 'Add Race', 'value' => 'Add Race'],
            ['key' => 'Date', 'value' => 'Date'],
            ['key' => 'Race marshals', 'value' => 'Race marshals'],
            ['key' => 'Present', 'value' => 'Present'],
            ['key' => 'Category', 'value' => 'Category'],
            ['key' => 'Registration details', 'value' => 'Registration details'],
            ['key' => 'Time', 'value' => 'Time'],
            ['key' => 'Show Race', 'value' => 'Show Race'],
            ['key' => 'No. of marshals', 'value' => 'No. of marshals'],
            ['key' => 'Total Registrations:', 'value' => 'Total Registrations:'],
            ['key' => 'Registrations by Club', 'value' => 'Registrations by Club'],
            ['key' => 'Registrations by Category', 'value' => 'Registrations by Category'],
            ['key' => 'Breakdown by Club', 'value' => 'Breakdown by Club'],
            ['key' => 'Unpaid Registrations', 'value' => 'Unpaid Registrations'],
            ['key' => 'Paid', 'value' => 'Paid'],
            ['key' => 'Key', 'value' => 'Key'],
            ['key' => 'Create text', 'value' => 'Create text'],
            ['key' => 'Value', 'value' => 'Value'],
            ['key' => 'Edit text', 'value' => 'Edit text'],
            ['key' => 'Add text', 'value' => 'Add text'],
            ['key' => 'Create user', 'value' => 'Create user'],
            ['key' => 'First name', 'value' => 'First name'],
            ['key' => 'Last name', 'value' => 'Last name'],
            ['key' => 'Event to marshal', 'value' => 'Event to marshal'],
            ['key' => 'Select 2 events to marshal', 'value' => 'Select 2 events to marshal'],
            ['key' => 'Password', 'value' => 'Password'],
            ['key' => 'Confirm password', 'value' => 'Confirm password'],
            ['key' => 'Connected roles', 'value' => 'Connected roles'],
            ['key' => 'Add user', 'value' => 'Add user'],
            ['key' => 'Users list', 'value' => 'Users list'],
            ['key' => 'Type', 'value' => 'Type'],
            ['key' => 'Show user', 'value' => 'Show user'],
            ['key' => 'User races', 'value' => 'User races'],
            ['key' => 'Your payment was successfully.', 'value' => 'Your payment was successfully.'],
            ['key' => 'Select 2 events to finish registration', 'value' => 'Select 2 events to finish registration'],
            ['key' => 'Events to marshal', 'value' => 'Events to marshal'],
            ['key' => 'Finish', 'value' => 'Finish'],
            ['key' => 'Race category', 'value' => 'Race category'],
            ['key' => 'Texts list', 'value' => 'Texts list'],
            ['key' => 'FAQ', 'value' => 'FAQ'],
            ['key' => 'Pages', 'value' => 'Pages'],
            ['key' => 'Cash', 'value' => 'Cash'],
        ];

        foreach($texts as $text){
            \App\Models\Texts::create($text);
        }
    }
}
