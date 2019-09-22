<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::insert([
            ['name' => 'Prominente'],
            ['name' => 'Fahrzeuge'],
            ['name' => 'Tiere und Natur'],
            ['name' => 'Computer und Programmieren'],
            ['name' => 'Schule'],
        ]);
    }
}
