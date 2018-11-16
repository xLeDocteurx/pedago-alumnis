<?php

use Illuminate\Database\Seeder;

class FormationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formations')->insert([
            'name' => 'Webdev',
        ]);
        DB::table('formations')->insert([
            'name' => 'Referent web',
        ]);
        DB::table('formations')->insert([
            'name' => 'Prog java',
        ]);
        DB::table('formations')->insert([
            'name' => 'Formateur',
        ]);
    }
}
