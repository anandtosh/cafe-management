<?php

use Illuminate\Database\Seeder;

class MenusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menuses')->delete();
        
        \DB::table('menuses')->insert(array (
            0 => 
            array (
                'created_at' => '2020-02-20 13:14:15',
                'updated_at' => '2020-02-21 17:20:07',
                'header' => NULL,
                'title' => 'Menus',
                'url' => 'admin/menus',
                'can' => NULL,
                'icon' => 'fas fa-list',
                'label' => '',
                'label_color' => NULL,
                'submenu' => NULL,
                'is_active' => 0,
            ),
            1 => 
            array (
                'created_at' => '2020-06-21 11:59:17',
                'updated_at' => '2020-06-21 11:59:17',
                'header' => NULL,
                'title' => 'Franchises',
                'url' => 'admin/franchises',
                'can' => NULL,
                'icon' => NULL,
                'label' => NULL,
                'label_color' => NULL,
                'submenu' => NULL,
                'is_active' => 0,
            ),
            2 => 
            array (
                'created_at' => '2020-06-21 18:48:37',
                'updated_at' => '2020-06-21 18:48:37',
                'header' => NULL,
                'title' => 'Works',
                'url' => 'admin/works',
                'can' => NULL,
                'icon' => NULL,
                'label' => NULL,
                'label_color' => NULL,
                'submenu' => NULL,
                'is_active' => 0,
            ),
            3 => 
            array (
                'created_at' => '2020-06-21 19:24:41',
                'updated_at' => '2020-06-21 19:24:41',
                'header' => NULL,
                'title' => 'Configurations',
                'url' => 'admin/configs',
                'can' => NULL,
                'icon' => NULL,
                'label' => NULL,
                'label_color' => NULL,
                'submenu' => NULL,
                'is_active' => 0,
            ),
            4 => 
            array (
                'created_at' => '2020-06-21 20:06:21',
                'updated_at' => '2020-06-21 20:06:21',
                'header' => NULL,
                'title' => 'Ledgers',
                'url' => 'admin/ledgers',
                'can' => NULL,
                'icon' => NULL,
                'label' => NULL,
                'label_color' => NULL,
                'submenu' => NULL,
                'is_active' => 0,
            ),
            5 => 
            array (
                'created_at' => '2020-06-24 10:53:57',
                'updated_at' => '2020-06-24 10:53:57',
                'header' => NULL,
                'title' => 'Sales',
                'url' => 'admin/sales',
                'can' => NULL,
                'icon' => NULL,
                'label' => NULL,
                'label_color' => NULL,
                'submenu' => NULL,
                'is_active' => 0,
            ),
            6 => 
            array (
                'created_at' => '2020-06-28 13:49:52',
                'updated_at' => '2020-06-28 13:49:52',
                'header' => NULL,
                'title' => 'Tickets',
                'url' => 'admin/tickets',
                'can' => NULL,
                'icon' => NULL,
                'label' => NULL,
                'label_color' => NULL,
                'submenu' => NULL,
                'is_active' => 0,
            ),
        ));
        
        
    }
}