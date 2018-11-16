<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('events')->insert([
        'title' => "je suis le titre n°1 des events",
        'content' => "je suis le contenu du premier event",
        'location' => "toulouse",
        'date' => "2018-11-15",
        'author_id' => 1,
       ]);
       DB::table('events')->insert([
        'title' => "je suis le titre n°2 des events",
        'content' => "je suis le contenu du deuxieme event",
        'location' => "Paris",
        'date' => "2018-11-16",
        'author_id' => 1,
       ]);
       DB::table('events')->insert([
        'title' => "je suis le titre n°3 des events",
        'content' => "je suis le contenu du Troisieme event",
        'location' => "Bordeaux",
        'date' => "2018-11-17",
        'author_id' => 1,
       ]);
       DB::table('events')->insert([
        'title' => "je suis le titre n°4 des events",
        'content' => "je suis le contenu du Quatrieme event",
        'location' => "Montpellier",
        'date' => "2018-11-18",
        'author_id' => 1,
       ]);
    }
}
