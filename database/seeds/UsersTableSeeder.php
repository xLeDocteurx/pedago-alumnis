<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "admin",
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => "LeDocteur",
            'email' => 'LeDocteur@LeDocteur.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => "Gyozmo",
            'email' => 'Gyozmo@Gyozmo.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => "Thingz",
            'email' => 'Thingz@Thingz.com',
            'password' => bcrypt('password'),
        ]);
    }
}
