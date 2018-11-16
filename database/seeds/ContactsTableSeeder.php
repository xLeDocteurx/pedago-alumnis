<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'relating_id' => 1,
            'related_id' => 2,
        ]);
        DB::table('contacts')->insert([
            'relating_id' => 2,
            'related_id' => 1,
        ]);
        DB::table('contacts')->insert([
            'relating_id' => 1,
            'related_id' => 3,
        ]);
        DB::table('contacts')->insert([
            'relating_id' => 3,
            'related_id' => 1,
        ]);
        DB::table('contacts')->insert([
            'relating_id' => 1,
            'related_id' => 4,
        ]);
        DB::table('contacts')->insert([
            'relating_id' => 4,
            'related_id' => 1,
        ]);
    }
}
