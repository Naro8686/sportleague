<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'administrator']);
        $admin->givePermissionTo(['users_manage', 'league_manage', 'clubs_manage', 'races_manage', 'privacy_manage', 'race_categories_manage', 'texts_manage', 'settings_manage']);
        $la = Role::create(['name' => 'league_admin']);
        $la->givePermissionTo('view_users', 'view_races');
        Role::create(['name' => 'participants']);
    }
}
