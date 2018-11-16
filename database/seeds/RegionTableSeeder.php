<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'name' => 'Occitanie',
        ]);
        DB::table('regions')->insert([
            'name' => 'Bourgogne-Franchecomté',
        ]);
        DB::table('regions')->insert([
            'name' => 'Ile-de-france',
        ]);
    }
}
