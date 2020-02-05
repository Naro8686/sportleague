<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        Permission::create(['name' => 'users_manage']);
        Permission::create(['name' => 'league_manage']);
        Permission::create(['name' => 'clubs_manage']);
        Permission::create(['name' => 'races_manage']);
        Permission::create(['name' => 'privacy_manage']);
        Permission::create(['name' => 'race_categories_manage']);
        Permission::create(['name' => 'view_users']);
        Permission::create(['name' => 'view_races']);
    }
}
