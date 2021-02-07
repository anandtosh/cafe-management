<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'name' => 'create_menus',
                'guard_name' => 'web',
                'created_at' => '2020-02-20 12:19:27',
                'updated_at' => '2020-02-20 12:19:27',
            ),
            1 => 
            array (
                'name' => 'view_menus',
                'guard_name' => 'web',
                'created_at' => '2020-02-20 12:19:27',
                'updated_at' => '2020-02-20 12:19:27',
            ),
            2 => 
            array (
                'name' => 'edit_menus',
                'guard_name' => 'web',
                'created_at' => '2020-02-20 12:19:27',
                'updated_at' => '2020-02-20 12:19:27',
            ),
            3 => 
            array (
                'name' => 'show_menus',
                'guard_name' => 'web',
                'created_at' => '2020-02-20 12:19:27',
                'updated_at' => '2020-02-20 12:19:27',
            ),
            4 => 
            array (
                'name' => 'delete_menus',
                'guard_name' => 'web',
                'created_at' => '2020-02-20 12:19:27',
                'updated_at' => '2020-02-20 12:19:27',
            ),
            5 => 
            array (
                'name' => 'create_modules',
                'guard_name' => 'web',
                'created_at' => '2020-02-22 10:21:56',
                'updated_at' => '2020-02-22 10:21:56',
            ),
            6 => 
            array (
                'name' => 'view_modules',
                'guard_name' => 'web',
                'created_at' => '2020-02-22 10:21:56',
                'updated_at' => '2020-02-22 10:21:56',
            ),
            7 => 
            array (
                'name' => 'edit_modules',
                'guard_name' => 'web',
                'created_at' => '2020-02-22 10:21:57',
                'updated_at' => '2020-02-22 10:21:57',
            ),
            8 => 
            array (
                'name' => 'show_modules',
                'guard_name' => 'web',
                'created_at' => '2020-02-22 10:21:57',
                'updated_at' => '2020-02-22 10:21:57',
            ),
            9 => 
            array (
                'name' => 'delete_modules',
                'guard_name' => 'web',
                'created_at' => '2020-02-22 10:21:57',
                'updated_at' => '2020-02-22 10:21:57',
            ),
            10 => 
            array (
                'name' => 'view_users',
                'guard_name' => 'web',
                'created_at' => '2020-03-01 01:12:30',
                'updated_at' => '2020-03-01 01:12:31',
            ),
            11 => 
            array (
                'name' => 'edit_users',
                'guard_name' => 'web',
                'created_at' => '2020-03-01 01:12:58',
                'updated_at' => '2020-03-01 01:12:58',
            ),
            12 => 
            array (
                'name' => 'show_users',
                'guard_name' => 'web',
                'created_at' => '2020-03-01 01:13:17',
                'updated_at' => '2020-03-01 01:13:17',
            ),
            13 => 
            array (
                'name' => 'create_users',
                'guard_name' => 'web',
                'created_at' => '2020-03-01 01:13:29',
                'updated_at' => '2020-03-01 01:13:30',
            ),
            14 => 
            array (
                'name' => 'delete_users',
                'guard_name' => 'web',
                'created_at' => '2020-03-01 01:13:49',
                'updated_at' => '2020-03-01 01:13:50',
            ),
            15 => 
            array (
                'name' => 'view_appfiles',
                'guard_name' => 'web',
                'created_at' => '2020-03-23 07:25:44',
                'updated_at' => '2020-03-23 07:25:44',
            ),
            16 => 
            array (
                'name' => 'create_appfiles',
                'guard_name' => 'web',
                'created_at' => '2020-03-23 07:25:44',
                'updated_at' => '2020-03-23 07:25:44',
            ),
            17 => 
            array (
                'name' => 'edit_appfiles',
                'guard_name' => 'web',
                'created_at' => '2020-03-23 07:25:44',
                'updated_at' => '2020-03-23 07:25:44',
            ),
            18 => 
            array (
                'name' => 'show_appfiles',
                'guard_name' => 'web',
                'created_at' => '2020-03-23 07:25:44',
                'updated_at' => '2020-03-23 07:25:44',
            ),
            19 => 
            array (
                'name' => 'delete_appfiles',
                'guard_name' => 'web',
                'created_at' => '2020-03-23 07:25:44',
                'updated_at' => '2020-03-23 07:25:44',
            ),
            20 => 
            array (
                'name' => 'view_appcommands',
                'guard_name' => 'web',
                'created_at' => '2020-03-24 05:41:01',
                'updated_at' => '2020-03-24 05:41:01',
            ),
            21 => 
            array (
                'name' => 'create_appcommands',
                'guard_name' => 'web',
                'created_at' => '2020-03-24 05:41:01',
                'updated_at' => '2020-03-24 05:41:01',
            ),
            22 => 
            array (
                'name' => 'edit_appcommands',
                'guard_name' => 'web',
                'created_at' => '2020-03-24 05:41:01',
                'updated_at' => '2020-03-24 05:41:01',
            ),
            23 => 
            array (
                'name' => 'show_appcommands',
                'guard_name' => 'web',
                'created_at' => '2020-03-24 05:41:01',
                'updated_at' => '2020-03-24 05:41:01',
            ),
            24 => 
            array (
                'name' => 'delete_appcommands',
                'guard_name' => 'web',
                'created_at' => '2020-03-24 05:41:02',
                'updated_at' => '2020-03-24 05:41:02',
            ),
            25 => 
            array (
                'name' => 'view_settings',
                'guard_name' => 'web',
                'created_at' => '2020-03-24 18:15:57',
                'updated_at' => '2020-03-24 18:15:57',
            ),
            26 => 
            array (
                'name' => 'create_settings',
                'guard_name' => 'web',
                'created_at' => '2020-03-24 18:15:57',
                'updated_at' => '2020-03-24 18:15:57',
            ),
            27 => 
            array (
                'name' => 'edit_settings',
                'guard_name' => 'web',
                'created_at' => '2020-03-24 18:15:57',
                'updated_at' => '2020-03-24 18:15:57',
            ),
            28 => 
            array (
                'name' => 'show_settings',
                'guard_name' => 'web',
                'created_at' => '2020-03-24 18:15:57',
                'updated_at' => '2020-03-24 18:15:57',
            ),
            29 => 
            array (
                'name' => 'delete_settings',
                'guard_name' => 'web',
                'created_at' => '2020-03-24 18:15:57',
                'updated_at' => '2020-03-24 18:15:57',
            ),
            30 => 
            array (
                'name' => 'view_franchises',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 10:29:22',
                'updated_at' => '2020-06-21 10:29:22',
            ),
            31 => 
            array (
                'name' => 'create_franchises',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 10:29:22',
                'updated_at' => '2020-06-21 10:29:22',
            ),
            32 => 
            array (
                'name' => 'edit_franchises',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 10:29:22',
                'updated_at' => '2020-06-21 10:29:22',
            ),
            33 => 
            array (
                'name' => 'show_franchises',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 10:29:22',
                'updated_at' => '2020-06-21 10:29:22',
            ),
            34 => 
            array (
                'name' => 'delete_franchises',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 10:29:22',
                'updated_at' => '2020-06-21 10:29:22',
            ),
            35 => 
            array (
                'name' => 'view_works',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 18:48:15',
                'updated_at' => '2020-06-21 18:48:15',
            ),
            36 => 
            array (
                'name' => 'create_works',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 18:48:15',
                'updated_at' => '2020-06-21 18:48:15',
            ),
            37 => 
            array (
                'name' => 'edit_works',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 18:48:15',
                'updated_at' => '2020-06-21 18:48:15',
            ),
            38 => 
            array (
                'name' => 'show_works',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 18:48:15',
                'updated_at' => '2020-06-21 18:48:15',
            ),
            39 => 
            array (
                'name' => 'delete_works',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 18:48:15',
                'updated_at' => '2020-06-21 18:48:15',
            ),
            40 => 
            array (
                'name' => 'view_configs',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 19:24:04',
                'updated_at' => '2020-06-21 19:24:04',
            ),
            41 => 
            array (
                'name' => 'create_configs',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 19:24:04',
                'updated_at' => '2020-06-21 19:24:04',
            ),
            42 => 
            array (
                'name' => 'edit_configs',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 19:24:04',
                'updated_at' => '2020-06-21 19:24:04',
            ),
            43 => 
            array (
                'name' => 'show_configs',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 19:24:04',
                'updated_at' => '2020-06-21 19:24:04',
            ),
            44 => 
            array (
                'name' => 'delete_configs',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 19:24:04',
                'updated_at' => '2020-06-21 19:24:04',
            ),
            45 => 
            array (
                'name' => 'view_ledgers',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 20:06:04',
                'updated_at' => '2020-06-21 20:06:04',
            ),
            46 => 
            array (
                'name' => 'create_ledgers',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 20:06:04',
                'updated_at' => '2020-06-21 20:06:04',
            ),
            47 => 
            array (
                'name' => 'edit_ledgers',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 20:06:04',
                'updated_at' => '2020-06-21 20:06:04',
            ),
            48 => 
            array (
                'name' => 'show_ledgers',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 20:06:04',
                'updated_at' => '2020-06-21 20:06:04',
            ),
            49 => 
            array (
                'name' => 'delete_ledgers',
                'guard_name' => 'web',
                'created_at' => '2020-06-21 20:06:04',
                'updated_at' => '2020-06-21 20:06:04',
            ),
            50 => 
            array (
                'name' => 'view_sales',
                'guard_name' => 'web',
                'created_at' => '2020-06-24 12:05:41',
                'updated_at' => '2020-06-24 12:05:41',
            ),
            51 => 
            array (
                'name' => 'create_sales',
                'guard_name' => 'web',
                'created_at' => '2020-06-24 12:05:41',
                'updated_at' => '2020-06-24 12:05:41',
            ),
            52 => 
            array (
                'name' => 'edit_sales',
                'guard_name' => 'web',
                'created_at' => '2020-06-24 12:05:41',
                'updated_at' => '2020-06-24 12:05:41',
            ),
            53 => 
            array (
                'name' => 'show_sales',
                'guard_name' => 'web',
                'created_at' => '2020-06-24 12:05:41',
                'updated_at' => '2020-06-24 12:05:41',
            ),
            54 => 
            array (
                'name' => 'delete_sales',
                'guard_name' => 'web',
                'created_at' => '2020-06-24 12:05:41',
                'updated_at' => '2020-06-24 12:05:41',
            ),
            55 => 
            array (
                'name' => 'view_tickets',
                'guard_name' => 'web',
                'created_at' => '2020-06-28 13:49:32',
                'updated_at' => '2020-06-28 13:49:32',
            ),
            56 => 
            array (
                'name' => 'create_tickets',
                'guard_name' => 'web',
                'created_at' => '2020-06-28 13:49:32',
                'updated_at' => '2020-06-28 13:49:32',
            ),
            57 => 
            array (
                'name' => 'edit_tickets',
                'guard_name' => 'web',
                'created_at' => '2020-06-28 13:49:32',
                'updated_at' => '2020-06-28 13:49:32',
            ),
            58 => 
            array (
                'name' => 'show_tickets',
                'guard_name' => 'web',
                'created_at' => '2020-06-28 13:49:32',
                'updated_at' => '2020-06-28 13:49:32',
            ),
            59 => 
            array (
                'name' => 'delete_tickets',
                'guard_name' => 'web',
                'created_at' => '2020-06-28 13:49:33',
                'updated_at' => '2020-06-28 13:49:33',
            ),
        ));
        
        
    }
}