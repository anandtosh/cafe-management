<?php

use Illuminate\Database\Seeder;

class AppfilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('appfiles')->delete();
        
        \DB::table('appfiles')->insert(array (
            0 => 
            array (
                'created_at' => '2020-03-23 07:29:39',
                'updated_at' => '2020-03-23 07:29:39',
                'name' => 'Routes File',
                'path' => 'routes',
                'filename' => 'web',
                'extension' => 'php',
                'type' => NULL,
            ),
            1 => 
            array (
                'created_at' => '2020-03-23 07:45:23',
                'updated_at' => '2020-03-23 07:45:23',
                'name' => 'Adminlte Config File',
                'path' => 'config',
                'filename' => 'adminlte',
                'extension' => 'php',
                'type' => NULL,
            ),
            2 => 
            array (
                'created_at' => '2020-03-23 07:52:02',
                'updated_at' => '2020-03-23 07:52:02',
                'name' => 'User Model',
                'path' => 'app',
                'filename' => 'User',
                'extension' => 'php',
                'type' => NULL,
            ),
            3 => 
            array (
                'created_at' => '2020-03-23 07:58:47',
                'updated_at' => '2020-03-23 07:58:47',
                'name' => 'App Environment',
                'path' => '/',
                'filename' => NULL,
                'extension' => 'env',
                'type' => NULL,
            ),
            4 => 
            array (
                'created_at' => '2020-03-23 08:02:03',
                'updated_at' => '2020-03-23 08:02:03',
                'name' => 'Crud Generator',
                'path' => 'config',
                'filename' => 'crudgenerator',
                'extension' => 'php',
                'type' => NULL,
            ),
            5 => 
            array (
                'created_at' => '2020-03-28 18:39:56',
                'updated_at' => '2020-03-28 18:39:56',
                'name' => 'Select2 Javascript file',
                'path' => 'resources/views/vendor/adminlte',
                'filename' => 'select2',
                'extension' => 'blade.php',
                'type' => NULL,
            ),
            6 => 
            array (
                'created_at' => '2020-03-28 18:41:40',
                'updated_at' => '2020-03-28 18:41:40',
                'name' => 'AjaxController',
                'path' => 'app/http/controllers',
                'filename' => 'AjaxController',
                'extension' => 'php',
                'type' => NULL,
            ),
            7 => 
            array (
                'created_at' => '2020-03-28 18:43:29',
                'updated_at' => '2020-03-28 18:44:04',
                'name' => 'Dashboard Template',
                'path' => 'resources/views/',
                'filename' => 'dashboard',
                'extension' => 'blade.php',
                'type' => NULL,
            ),
        ));
        
        
    }
}