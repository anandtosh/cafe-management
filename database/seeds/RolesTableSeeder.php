<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'name' => 'Admin',
                'guard_name' => 'web',
                'created_at' => '2020-02-21 13:57:05',
                'updated_at' => '2020-02-21 13:57:05',
            ),
            1 => 
            array (
                'name' => 'Developer',
                'guard_name' => 'web',
                'created_at' => '2020-02-22 10:23:52',
                'updated_at' => '2020-02-22 10:23:52',
            ),
            2 => 
            array (
                'name' => 'Operator',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 13:04:40',
                'updated_at' => '2020-06-21 13:04:40',
            ),
        ));
        
        
    }
}