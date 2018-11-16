<?php

use Illuminate\Database\Seeder;

class TagsFamilyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tagfamilies')->insert([
            'name' => 'Techno',
        ]);
        DB::table('tagfamilies')->insert([
            'name' => 'Méthodes de management',
        ]);
    }
}
