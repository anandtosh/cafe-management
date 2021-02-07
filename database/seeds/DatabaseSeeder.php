<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(FranchisesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(ConfigsTableSeeder::class);
        $this->call(MenusesTableSeeder::class);
        $this->call(AppfilesTableSeeder::class);
        $this->call(AppcommandsTableSeeder::class);
    }
}
