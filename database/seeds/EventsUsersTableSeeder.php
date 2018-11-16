<?php

use Illuminate\Database\Seeder;

class EventsUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_user')->insert([
            'event_id' => 1,
            'user_id' => 2,
            ]);
        DB::table('event_user')->insert([
        'event_id' => 1,
        'user_id' => 3,
            ]);
        DB::table('event_user')->insert([
        'event_id' => 1,
        'user_id' => 4,
            ]);
        DB::table('event_user')->insert([
        'event_id' => 2,
        'user_id' => 2,
            ]);
    }
}
