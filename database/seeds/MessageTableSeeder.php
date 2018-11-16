<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'sender_id' => 1,
            'receiver_id' => 2,
            'content' => "Salut !",
        ]);
        DB::table('messages')->insert([
            'sender_id' => 2,
            'receiver_id' => 1,
            'content' => "Salut a toi !",
        ]);
        DB::table('messages')->insert([
            'sender_id' => 1,
            'receiver_id' => 2,
            'content' => "ça va ?",
        ]);
        DB::table('messages')->insert([
            'sender_id' => 2,
            'receiver_id' => 1,
            'content' => "ça va merci",
        ]);
        DB::table('messages')->insert([
            'sender_id' => 1,
            'receiver_id' => 3,
            'content' => "message 1 vers 3",
        ]);
        DB::table('messages')->insert([
            'sender_id' => 2,
            'receiver_id' => 3,
            'content' => "message 2 vers 3",
        ]);
    }
}
