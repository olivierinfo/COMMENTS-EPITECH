<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Place;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       User::factory(100)->create();
    
       DB::table("categories")->insert([
        ['name' => 'Ecole'],
        ['name' => 'Entreprises'],
        ['name' => 'Coworking'],
        ['name' => 'Bar connecté'],
        ['name' => 'Magasin'],
    ]);
       Place::factory(100)->create();
       Review::factory(500)->create();
       Event::factory(100)->create();
    }
}