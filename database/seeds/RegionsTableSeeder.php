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
            'nom' => "ad",
            'prenom' => "min",
            'region' => 1,
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => "LeDocteur",
            'nom' => "Le",
            'prenom' => "Docteur",
            'region' => 1,
            'email' => 'LeDocteur@LeDocteur.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => "Gyozmo",
            'nom' => "Gyo",
            'prenom' => "zmo",
            'region' => 1,
            'email' => 'Gyozmo@Gyozmo.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => "Thingz",
            'nom' => "Stranger",
            'prenom' => "Thingz",
            'region' => 1,
            'email' => 'Thingz@Thingz.com',
            'password' => bcrypt('password'),
        ]);
    }
}
