<?php

use Illuminate\Database\Seeder;

class AppcommandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('appcommands')->delete();
        
        \DB::table('appcommands')->insert(array (
            0 => 
            array (
                'created_at' => '2020-03-24 05:44:03',
                'updated_at' => '2020-03-24 05:44:03',
                'command' => 'cache:clear',
                'description' => 'Clear The Laravel Cache',
                'parameters' => NULL,
            ),
            1 => 
            array (
                'created_at' => '2020-03-24 06:24:04',
                'updated_at' => '2020-03-24 07:08:27',
                'command' => 'permission:cache-reset',
                'description' => 'Clear laravel Permissions cache',
                'parameters' => NULL,
            ),
            2 => 
            array (
                'created_at' => '2020-03-24 06:27:58',
                'updated_at' => '2020-03-24 06:27:58',
                'command' => 'inspire',
                'description' => 'Show Inspirational Quote',
                'parameters' => NULL,
            ),
            3 => 
            array (
                'created_at' => '2020-03-25 04:57:41',
                'updated_at' => '2020-03-25 04:57:41',
                'command' => 'storage:link',
                'description' => 'Link the laravel storage to public folder',
                'parameters' => NULL,
            ),
        ));
        
        
    }
}