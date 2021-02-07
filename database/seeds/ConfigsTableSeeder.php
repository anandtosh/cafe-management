<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('configs')->delete();
        
        \DB::table('configs')->insert(array (
            0 => 
            array (
                'created_at' => '2020-06-21 19:33:16',
                'updated_at' => '2020-06-22 06:21:52',
                'name' => 'CASH',
                'type' => 'LEDGER GROUP',
                'description' => 'In this ledger group we add groups that related to cash e.g. petty cash, cash in hand',
                'active' => 1,
            ),
            1 => 
            array (
                'created_at' => '2020-06-21 19:33:34',
                'updated_at' => '2020-06-21 19:33:43',
                'name' => '2020-2021',
                'type' => 'FISCAL YEAR',
                'description' => NULL,
                'active' => 1,
            ),
            2 => 
            array (
                'created_at' => '2020-06-22 13:03:16',
                'updated_at' => '2020-06-22 13:03:16',
                'name' => '2021-2022',
                'type' => 'FISCAL YEAR',
                'description' => NULL,
                'active' => 1,
            ),
            3 => 
            array (
                'created_at' => '2020-06-23 06:32:37',
                'updated_at' => '2020-06-23 06:32:37',
                'name' => 'BANK ACCOUNT',
                'type' => 'LEDGER GROUP',
                'description' => 'This group is only for cafe\'s bank account.',
                'active' => 1,
            ),
            4 => 
            array (
                'created_at' => '2020-06-24 15:38:44',
                'updated_at' => '2020-06-24 15:38:44',
                'name' => 'CUSTOMER',
                'type' => 'LEDGER GROUP',
                'description' => 'Credit customers',
                'active' => 1,
            ),
        ));
        
        
    }
}