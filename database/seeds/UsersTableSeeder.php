<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'name' => 'admin',
                'email' => 'admin@docentlab.com',
                'address' => NULL,
                'alternate_contact' => NULL,
                'primary_contact' => NULL,
                'email_verified_at' => '2020-02-29 17:23:33',
                'password' => '$2y$10$r.UDkjMDu1VmChdv7/pgy.1i7ocerypKts4IG9BkJrdekEPMhkA/a',
                'remember_token' => NULL,
                'created_at' => '2020-02-18 17:33:23',
                'updated_at' => '2020-06-20 21:03:57',
                'franchise_id' => NULL,
            ),
            1 => 
            array (
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'address' => NULL,
                'alternate_contact' => NULL,
                'primary_contact' => NULL,
                'email_verified_at' => '2020-06-21 17:56:05',
                'password' => '$2y$10$WhU13EcdMUWapqbrWKc.L.XxYb6d5e8Bym.mPhCKvIfshBxNNTr2.',
                'remember_token' => NULL,
                'created_at' => '2020-04-01 16:28:48',
                'updated_at' => '2020-04-01 16:28:48',
                'franchise_id' => NULL,
            ),
            2 => 
            array (
                'name' => 'Rahul',
                'email' => 'anand@dctsoftware.com',
                'address' => 'moradabaD',
                'alternate_contact' => NULL,
                'primary_contact' => '9528014859',
                'email_verified_at' => NULL,
                'password' => '$2y$10$6Vz.ly9LhmVEANiNMlak.OLBWKLkfu3aErtxiiSBAh7otUa/vtm0y',
                'remember_token' => NULL,
                'created_at' => '2020-06-21 13:34:43',
                'updated_at' => '2020-06-21 17:32:52',
                'franchise_id' => 2,
            ),
        ));
        
        
    }
}