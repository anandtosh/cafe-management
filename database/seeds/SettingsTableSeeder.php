<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'created_at' => '2020-03-24 18:17:03',
                'updated_at' => '2020-03-24 18:17:03',
                'key' => 'site_name',
                'value' => 'Crud App',
                'active' => 1,
            ),
            1 => 
            array (
                'created_at' => '2020-03-24 20:16:52',
                'updated_at' => '2020-03-24 20:18:14',
                'key' => 'developer_name',
                'value' => 'Anand Bhatnagar',
                'active' => 0,
            ),
        ));
        
        
    }
}