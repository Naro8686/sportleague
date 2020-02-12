<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(LeagueSeed::class);
        $this->call(ClubSeed::class);
        $this->call(RaceSeed::class);
        $this->call(PrivacySeed::class);
        $this->call(RaceCategorySeed::class);
        $this->call(TextsSeed::class);
    }
}
