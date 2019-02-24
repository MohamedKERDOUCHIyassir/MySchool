<?php

use Illuminate\Database\Seeder;
use App\Classe;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classe::create([
            'name' => '3 AS',
            'level' => 'Secondaire',
            'year' => '3',
            'speciality' => 'Sciences Expérimentales'
        ]);
        Classe::create([
            'name' => '3 AM',
            'level' => 'Secondaire',
            'year' => '3',
            'speciality' => 'Mathematiques'
        ]);
    }
}
