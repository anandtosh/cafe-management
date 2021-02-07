<?php

use Illuminate\Database\Seeder;

class FranchisesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('franchises')->delete();
        
        \DB::table('franchises')->insert(array (
            0 => 
            array (
                'created_at' => '2020-06-21 10:33:24',
                'updated_at' => '2020-06-21 17:17:50',
                'name' => 'CAFE 1',
                'address' => 'Mansarovar Colony, Buddhi Vihar Moradabad',
                'contact_person' => 'Rahul',
                'contact_number' => '95284645',
                'email' => NULL,
                'docs_pdf' => 'uploads/GDYxojXhPHMP8AUKx5SWXtzSeWVmIyFoOqXlJ2IH.pdf',
            ),
            1 => 
            array (
                'created_at' => '2020-06-21 17:23:30',
                'updated_at' => '2020-06-21 17:23:30',
                'name' => 'CAFE 2',
                'address' => 'dharm kanta, buddhi vihar Moradabad',
                'contact_person' => 'Amit',
                'contact_number' => '9045000819',
                'email' => NULL,
                'docs_pdf' => NULL,
            ),
        ));
        
        
    }
}