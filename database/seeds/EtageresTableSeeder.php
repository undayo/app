<?php

use Illuminate\Database\Seeder;

class EtageresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i < 11; $i++) { 
    		DB::table('etageres')->insert([
            'nom' => 'Etagere'.$i,
        ]);
    	}
        
    }
}
