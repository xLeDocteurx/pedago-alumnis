<?php

use Illuminate\Database\Seeder;

class TagUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_tag')->insert([
            'tag_id' => 5,
            'user_id' => 1,
        ]);
        DB::table('user_tag')->insert([
            'tag_id' => 5,
            'user_id' => 2,
        ]);
    }
}
