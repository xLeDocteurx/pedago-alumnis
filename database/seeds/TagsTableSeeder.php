<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'tagfamily_id' => 1,
            'name' => 'laravel',
        ]);
        DB::table('tags')->insert([
            'tagfamily_id' => 1,
            'name' => 'PHP',
        ]);
        DB::table('tags')->insert([
            'tagfamily_id' => 1,
            'name' => 'nodeJS',
        ]);
        DB::table('tags')->insert([
            'tagfamily_id' => 1,
            'name' => 'Jquery',
        ]);
        DB::table('tags')->insert([
            'tagfamily_id' => 2,
            'name' => 'usertag n°1',
        ]);
        DB::table('tags')->insert([
            'tagfamily_id' => 2,
            'name' => 'usertag n°2',
        ]);
    }
}
