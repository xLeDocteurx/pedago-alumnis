<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => "admin",
        ]);
        DB::table('roles')->insert([
            'name' => "moderateur",
        ]);
        DB::table('roles')->insert([
            'name' => "formateur",
        ]);
        DB::table('roles')->insert([
            'name' => "professionnel",
        ]);
        DB::table('roles')->insert([
            'name' => "alumni",
        ]);
        DB::table('roles')->insert([
            'name' => "apprenant",
        ]);
    }
}
