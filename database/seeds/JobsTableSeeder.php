<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            'company' => 'Entreprise 1',
            'region_id' => 1,
            'title' => 'Titre n°1',
            'content' => 'premier contenu',
            'author_id' => 1,
            'outdated_at' => 20190101,
            'refreshed_at' => 20190101,
        ]);
        DB::table('jobs')->insert([
            'company' => 'Entreprise 2',
            'region_id' => 2,
            'title' => 'Titre n°2',
            'content' => 'Deuxieme contenu',
            'author_id' => 2,
            'outdated_at' => 20190101,
            'refreshed_at' => 20190101,
        ]);
        DB::table('jobs')->insert([
            'company' => 'Entreprise 3',
            'region_id' => 3,
            'title' => 'Titre n°3',
            'content' => 'Troisieme contenu',
            'author_id' => 3,
            'outdated_at' => 20190101,
            'refreshed_at' => 20190101,
        ]);
    }
}
