<?php

use Illuminate\Database\Seeder;
use App\Models\PrivacyPolicy;

class PrivacySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PrivacyPolicy::create([
            'title' => 'Privacy policy',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);

        PrivacyPolicy::create([
            'title' => 'FAQ',
            'text' => 'FAQ Description',
        ]);

        PrivacyPolicy::create([
            'title' => 'Terms and conditions',
            'text' => 'Terms and conditions Description',
        ]);

        PrivacyPolicy::create([
            'title' => 'Wexford Cycling',
            'text' => 'As Wexford cycling met over the winter, it became apparent that concerns grew over the need of help to run open and league races within the county.<br>The charge is a flat fee of €15. For those who have paid they will be allowed free entry into the county championships, entry to the Counties will be at least €15 per person, so in affect your registration is free if you support the counties. We have changed also the profile to include your club and Race Category.<br>We have over 20 events this year within the county alone for those who want to race, asking each rider to give up two of them really isn’t a big ask considering the trojan work that is done by all behind the scenes all we ask if some help.',
        ]);

        PrivacyPolicy::create([
            'title' => 'Contact',
            'text' => 'Contact description',
        ]);
    }
}
